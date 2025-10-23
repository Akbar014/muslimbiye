<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Models\BiodataFamilyInfo;
use App\Models\BiodataContactInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class BiodataStatusController extends Controller
{
    public function __construct()
    {
        // Admin guard ensure
        $this->middleware('auth:admin');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        Gate::authorize('biodata-index');       

        $biodata = Biodata::where('id', $id)->first();

        if(!$biodata){
            return back()->with('error', 'Biodata not found.');
        }

        $contact_info = BiodataContactInfo::where('biodata_id', $biodata->id)->first();

        $family_info = BiodataFamilyInfo::where('biodata_id', $biodata->id)->first();

        return view('backend.admin.biodata.pending_bio_edit', compact('contact_info', 'family_info', 'biodata'));
    }



    /**
     * update biodata
     */
    public function update(Request $request)
    {
        Gate::authorize('biodata-index');

        // Validate inputs
        $data = $request->validate([
            'biodata_id'       => ['required','integer'],
            'groom_name'       => ['nullable','string','max:255'],
            'bride_name'       => ['nullable','string','max:255'],
            'biodata_email'    => ['nullable','email','max:255'],
            'gurdian_whatsapp' => ['nullable','string','max:50'],
            'gurdian_phone'    => ['nullable','string','max:50'],
        ]);

        $biodata = Biodata::find($data['biodata_id']);

        if (!$biodata) {
            return back()->with('error', 'Biodata not found.');
        }      

        // Best: updateOrCreate
        BiodataContactInfo::updateOrCreate(
            ['biodata_id' => $biodata->id],
            [
                'user_id'          => $biodata->user_id ?? null,
                'groom_name'       => $data['groom_name'] ?? null,
                'bride_name'       => $data['bride_name'] ?? null,
                'biodata_email'    => $data['biodata_email'] ?? null,
                'gurdian_whatsapp' => $data['gurdian_whatsapp'] ?? null,
                'gurdian_phone'    => $data['gurdian_phone'] ?? null,
            ]
        );

       return redirect('admin/dashboard')->with('success', 'Updated.');
        
    }
    

    /**
     * Approve biodata
     */
    public function approve(Biodata $biodata): RedirectResponse
    {
        Gate::authorize('biodata-index');

        $biodata->status = 2; // approved
        $biodata->postponed_note = null;
        $biodata->postponed_at   = null;
        $biodata->postponed_by   = null;
        $biodata->save();

        return back()->with('success', 'Biodata approved.');
    }

    /**
     * Postpone with note (+ optional datetime)
     */
    public function postpone(Request $request, Biodata $biodata): RedirectResponse
    {        
       
        $data = $request->validate([
            'postponed_note' => ['required', 'string'],
            'postponed_at'   => ['nullable', 'date'],
        ]);

        $biodata->status         = 5; // postponed
        $biodata->postponed_note = $data['postponed_note'];
        $biodata->postponed_at   = $data['postponed_at'] ?? now();
        $biodata->postponed_by   = Auth::id(); // admin id
        $biodata->save();

        return back()->with('success', 'Biodata postponed with note.');
    }

    /**
     * Soft delete (set deleted=1 + optional note)
     */
    public function destroy(Request $request, Biodata $biodata): RedirectResponse
    {
        Gate::authorize('biodata-index');

        $validated = $request->validate([
            'delete_note' => ['nullable', 'string'],
        ]);

        $biodata->deleted     = '1';
        $biodata->delete_note = $validated['delete_note'] ?? null;
        $biodata->save();

        return back()->with('success', 'Biodata deleted.');
    }
}