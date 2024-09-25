<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobControler extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(10);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }
    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            //'employer_id' => '',
        ]);
        // return request()->all();

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
    }
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
        //validate job
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            //'employer_id' => '',
        ]);

        //update
        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        //authorize
        //delete
        $job->delete();

        return redirect('/jobs');
    }
}
