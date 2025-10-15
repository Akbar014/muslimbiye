<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('backend.admin.contact_form.index');
    }
    public function getAll()
    {
        $Data = ContactForm::all();
        return DataTables::of($Data)
            ->addColumn('email', function ($Data) {
                return "<a href='mailto:$Data->email'>$Data->email</a>";
            })
            ->rawColumns(["email"])
            ->addIndexColumn()
            ->make(true);
    }
}
