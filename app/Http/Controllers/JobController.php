<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\JobPostRequest;
use App\Job;
use App\Post;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'allJobs', 'searchJobs')]);
    }

    public function index()
    {
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::get()->random(12);
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status', 1)->orderBy('id', 'DESC')->get();
        $testimonial = Testimonial::orderBy('id', 'DESC')->first();
        return view('welcome', compact('jobs', 'companies', 'categories', 'posts', 'testimonial'));
    }

    public function show($id,Job $job){

        $data = [];

        $jobsBasedOnCategories = Job::latest()->where('category_id',$job->category_id)
            ->whereDate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(6)
            ->get();
        array_push($data,$jobsBasedOnCategories);

        $jobBasedOnCompany = Job::latest()->where('company_id',$job->company_id)
            ->whereDate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(6)
            ->get();
        array_push($data,$jobBasedOnCompany);

        $jobBasedOnPosition= Job::where('position','LIKE','%'.$job->position.'%')
            ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(6);
        array_push($data,$jobBasedOnPosition);

        $collection  = collect($data);
        $unique = $collection->unique("id");
        $jobRecommendations =  $unique->values()->first();
        return view('jobs.show',compact('job','jobRecommendations'));
    }

    public function create()
    {
        return view('jobs.create');
    }
    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => Carbon::createFromFormat('m/d/Y', $request->last_date)->format('Y-m-d'),
            'number_of_vacancy' => request('number_of_vacancy'),
            'experience' => request('experience'),
            'gender' => request('gender'),
            'salary' => request('salary')
        ]);
        return redirect()->back()->with('success', 'Job posted successfully!!');
    }

    public function myJob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('success', 'Job updated successfully!!');
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('success', 'Application sent successfully!!');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', Auth::user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function allJobs(Request $request)
    {
        //front search
        $search = $request->get('search');
        $address = $request->get('address');
        if ($search && $address){
            $jobs = Job::where('position', 'LIKE', '%' .$search. '%')
                ->orWhere('title', 'LIKE', '%' .$search. '%')
                ->orWhere('type', 'LIKE', '%' .$search. '%')
                ->orWhere('address', 'LIKE', '%' .$address. '%')
                ->paginate(10);
            return view('jobs.all-jobs', compact('jobs'));
        }

        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if ($keyword||$type||$category||$address){
            $jobs = Job::where('title', 'LIKE', '%' .$keyword. '%')
                   ->orWhere('type', $type)
                   ->orWhere('category_id', $category)
                   ->orWhere('address', $address)
                   ->paginate(10);
            return view('jobs.all-jobs', compact('jobs'));
        }else{
            $jobs = Job::latest()->paginate(10);
            return view('jobs.all-jobs', compact('jobs'));
        }

    }

    public function searchJobs(Request $request)
    {
        $keyword = $request->get('keyword');
        $users = Job::where('title', 'LIKE', '%' .$keyword. '%')
                ->orWhere('position', 'LIKE', '%' .$keyword. '%')
                ->limit(5)->get();
        return response()->json($users);
    }
}
