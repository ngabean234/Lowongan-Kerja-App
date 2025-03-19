<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:company');
    }

    public function index()
    {
        $jobs = Job::with(['jobType', 'city'])
            ->where('company_id', Auth::user()->company->id)
            ->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $jobTypes = JobType::all();
        return view('jobs.create', compact('jobTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'required|exists:tbl-job-types,id',
            'min_salary' => 'required|string',
            'max_salary' => 'required|string',
            'requirement' => 'required|string',
        ]);

        // Clean salary inputs
        $minSalary = (int) preg_replace('/[^0-9]/', '', $request->min_salary);
        $maxSalary = (int) preg_replace('/[^0-9]/', '', $request->max_salary);

        // Validate min_salary less than max_salary
        if ($minSalary >= $maxSalary) {
            return back()
                ->withInput()
                ->withErrors(['min_salary' => 'Gaji minimum harus lebih kecil dari gaji maksimum']);
        }

        $job = new Job();
        $job->name = $request->name;
        $job->description = $request->description;
        $job->type_id = $request->type_id;
        $job->requirement = $request->requirement;
        $job->min_salary = $minSalary;
        $job->max_salary = $maxSalary;
        $job->company_id = Auth::user()->company->id;
        $job->city_id = Auth::user()->company->city_id;
        $job->archived = 'N';
        $job->create_id = Auth::id();
        $job->update_id = Auth::id();
        $job->save();

        return redirect()->route('company.dashboard');
    }

    public function show(Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $job->load(['jobType', 'city']);
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }

        $job->load(['jobType', 'city']);
        $jobTypes = JobType::all();
        return view('jobs.edit', compact('job', 'jobTypes'));
    }

    public function update(Request $request, Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'required|exists:tbl-job-types,id',
            'min_salary' => 'required|numeric|min:0',
            'max_salary' => 'required|numeric|min:0|gt:min_salary',
            'requirement' => 'required|string',
        ], [
            'max_salary.gt' => 'Gaji maksimum harus lebih besar dari gaji minimum',
            'min_salary.min' => 'Gaji minimum tidak boleh negatif',
            'max_salary.min' => 'Gaji maksimum tidak boleh negatif'
        ]);

        $job->update([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'requirement' => $request->requirement,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'update_id' => Auth::id()
        ]);

        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan kerja berhasil diperbarui!');
    }

    public function destroy(Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
        $job->delete();
        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil dihapus!');
    }

    /**
     * Mengarsipkan lowongan kerja
     */
    public function archive(Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $job->update([
            'archived' => 'Y',
            'update_id' => Auth::id()
        ]);
        
        return redirect()->route('company.dashboard');
            
    }
    
    /**
     * Mengaktifkan kembali lowongan yang diarsipkan
     */
    public function unarchive(Job $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $job->update([
            'archived' => 'N',
            'update_id' => Auth::id()
        ]);
        
        return redirect()->route('company.dashboard');
            
    }

    public function search(Request $request)
    {
        $query = Job::with(['jobType', 'city', 'company'])
            ->where('archived', 'N');

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('location')) {
            $query->whereHas('city', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->location . '%');
            });
        }

        if ($request->filled('job_type')) {
            $query->whereIn('type_id', $request->job_type);
        }

        $jobs = $query->latest()->paginate(10);
        $jobTypes = JobType::all();

        return view('jobs.search', compact('jobs', 'jobTypes'));
    }

    public function publicShow(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Accessor untuk format gaji
    protected function getFormattedSalaryRangeAttribute()
    {
        return 'Rp ' . number_format($this->min_salary, 0, ',', '.') . 
               ' - Rp ' . number_format($this->max_salary, 0, ',', '.');
    }
}
