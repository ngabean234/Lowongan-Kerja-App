<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function search(Request $request)
    {
        // Tangkap kata kunci dan lokasi dari form pencarian
        $keyword = $request->input('keyword');
        $location = $request->input('location');
        $jobTypes = $request->input('job_type', []);

        // Lakukan pencarian di database (contoh: tabel 'jobs')
        $jobs = \App\Models\Job::where('title', 'like', "%$keyword%")
                ->where('location', 'like', "%$location%")
                ->when($jobTypes, function ($query) use ($jobTypes) {
                    return $query->whereIn('job_type', $jobTypes);
                })
                ->get();

        // Tampilkan hasil pencarian
        return view('jobs.index', compact('jobs'));
    }
}
