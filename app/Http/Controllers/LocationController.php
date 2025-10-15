<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDivisions()
    {
        $path = base_path('data/divisions.json');
        $divisions = json_decode(file_get_contents($path), true);
        return response()->json($divisions);
    }

    public function getDistricts($division_id)
    {
        $path = base_path('data/districts.json');
        $districts = json_decode(file_get_contents($path), true);

        $filtered = array_filter($districts, function ($district) use ($division_id) {
            return $district['division_id'] == $division_id;
        });

        return response()->json(array_values($filtered));
    }

    public function getUpazilas($district_id)
    {
        $path = base_path('data/upazilas.json');
        $upazilas = json_decode(file_get_contents($path), true);

        $filtered = array_filter($upazilas, function ($upazila) use ($district_id) {
            return $upazila['district_id'] == $district_id;
        });

        return response()->json(array_values($filtered));
    }
}
