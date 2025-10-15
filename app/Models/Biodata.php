<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "admin_created",
        "general_id",
        "address_id",
        "education_id",
        "family_id",
        "personal_id",
        "professional_id",
        "marrage_id",
        "expected_id",
        "commitment_id",
        "contact_id",
        "note",
    ];

    public function user()
    {
        return User::find($this->user_id);
    }
    public function general()
    {
        return BiodataGeneralInfo::find($this->general_id);
    }
    public function address()
    {
        return BiodataAddressInfo::find($this->address_id);
    }
    public function education()
    {
        return BiodataEducationInfo::find($this->education_id);
    }
    public function family()
    {
        return BiodataFamilyInfo::find($this->family_id);
    }
    public function personal()
    {
        return BiodataPersonalInfo::find($this->personal_id);
    }
    public function professional()
    {
        return BiodataProfessionalInfo::find($this->professional_id);
    }
    public function marrage()
    {
        return BiodataMarrageInfo::find($this->marrage_id);
    }
    public function expected()
    {
        return BiodataExpectedInfo::find($this->expected_id);
    }
    public function commitment()
    {
        return BiodataCommitmentInfo::find($this->commitment_id);
    }
    public function contact()
    {
        return BiodataContactInfo::find($this->contact_id);
    }

    // check if this biodata is added to user favorite list or not.
    public function favorite()
    {
        $user = Auth::guard('user')->user();
        if(!$user) {
            return null;
        }
        return Favorite::where(['biodata_id'=>$this->id, 'user_id'=>$user->id])->first();
    }


    // check how many user has been added this biodata to favorite list
    public function favorite_count() {
        return count(Favorite::where('biodata_id', $this->id)->get());
    }
}
