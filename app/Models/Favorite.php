<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'biodata_id', 'status'];

    public function biodata()
    {
        // dd($this->biodata_id);
        // dd(Biodata::where(["id" => $this->biodata_id, "deleted" => '0', 'admin_created' => '0'])->first());
        return Biodata::where(["id" => $this->biodata_id, "deleted" => '0'])->first();
    }
}
