<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\BioData;
use App\Models\DraftBiodata;
use Illuminate\Http\Request;

class DatabaseReform extends Controller
{
    public function index()
    {
        $all_biodata = DraftBiodata::all();

        foreach ($all_biodata as  $biodata) {
            if ($biodata->want_complexion != null) {
                $all_complexion = json_decode($biodata->want_complexion);
                if ($all_complexion == null) {
                    $biodata->want_complexion = explode(',', $biodata->want_complexion);
                }
            }

            if ($biodata->want_maritualStatus != null) {
                $all_maritalStatus = json_decode($biodata->want_maritualStatus);
                if ($all_maritalStatus == null) {
                    $biodata->want_maritualStatus = explode(',', $biodata->want_maritualStatus);
                }
            }

            if ($biodata->want_district != null) {
                $all_district = json_decode($biodata->want_district);
                if ($all_district == null) {
                    $biodata->want_district = explode(',', $biodata->want_district);
                }
            }
            $biodata->update();
        }
    }
}
