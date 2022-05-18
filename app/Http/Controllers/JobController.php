<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index(){

        $jobs = Job::latest()->Filter(request(['tag','search']))->paginate(8);

        return view('Home.index',['jobs'=>$jobs]);

    }

    public function show(Job $job){

        return view('jobs.show',['job'=> $job]);
        
    }

    public function create(){

        return view('jobs.create');
        
    }

    public function store(Request $request){

        $fields = $request->validate([
            'title' => 'required|min:6',
            'company' => ['required','min:6',Rule::unique('jobs','company')],
            'location' => 'required',
            'description' => 'required|min:10',
            'tags' => 'required',
            'email' => 'required|email',
            'website' => 'required'
        ]);

        if($request->hasFile('logo')){
            $fields['logo'] = $request->file('logo')->store('logos','public');
        }

        $fields['user_id'] = auth()->id();

        Job::create($fields);



        return redirect(route('home'))->with('messageGreen','Job created successfully');

        
         
    }

    public function edit(Job $job){

        return view('jobs.edit',['job'=>$job]);
    }

    public function update(Job $job){

        $this->authorize('manageJobs',$job);

        $fields = request()->validate([
            'title' => 'required|min:6',
            'company' => ['required','min:6',Rule::unique('jobs','company')],
            'location' => 'required',
            'description' => 'required|min:10',
            'tags' => 'required',
            'email' => 'required|email',
            'website' => 'required'
        ]);

        if(request()->hasFile('logo')){
            $fields['logo'] = request()->file('logo')->store('logos','public');
        }

        $job->update($fields);


        return back()->with('messageGreen','Job updated successfully');

    }

    public function destroy(Job $job){
        
        $this->authorize('delete',$job);

        $job->delete();

        return redirect(route('job.manage'))->with('messageRed','Job deleted successfully');

    }

    public function manage(User $user){


        $jobs = $user->jobs()->with(['user'])->paginate(20);

        return view('jobs.manage',['jobs' => $jobs]);

    }
}