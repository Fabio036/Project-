<?php

namespace App\Http\Controllers;

use App\Models\cvs;
use Illuminate\Http\Request;
use PDF;

class cvsController extends Controller
{
    public function index()
    {
        $query = $_GET['query'] ?? null;
        $location = $_GET['location'] ?? null;
        $education = $_GET['education'] ?? null;
        $experience = $_GET['experience'] ?? null;
        $drivers_license = $_GET['drivers_license'] ?? null;

        $results = cvs::where('preferred_function', 'like', '%' . $query . '%')
            ->where('location', 'like', '%' . $location . '%')
            ->when($education, function ($query, $education) {
                return $query->where('education', 'like', '%' . $education . '%');
            })
            ->when($experience, function ($query, $experience) {
                return $query->where('years_experience', '>=', $experience);
            })
            ->when($drivers_license, function ($query, $drivers_license) {
                return $query->where('drivers_license', 'like', '%' . $drivers_license . '%');
            })->get();

        return view('cvs', compact(
            'query',
            'location',
            'results',
            'education',
            'experience',
            'drivers_license'
        ));
    }

    public function show($id)
    {
        $cv = cvs::find($id);

        if (!$cv) {
            return abort(404);
        }

        return view('cv', compact('cv'));
    }

    public function pdf($id)
    {
        $cv = cvs::find($id);

        if (!$cv) {
            return abort(404);
        }

        $pdf = PDF::loadView('pdf', compact('cv'));

        return $pdf->download('cv.pdf');
    }
}
