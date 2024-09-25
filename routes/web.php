<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {

    return view('home');
});
//index ie displays all jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(10);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create jobs
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//show  job
Route::get('/jobs/{id}', function ($id) {


    // Find the job by ID

    $job = Job::find($id);
    // Debug the result
    //dd($job);

    // Optionally return a view here if needed (replace 'contact' with your intended view)
    return view('jobs.show', ['job' => $job]);
});

//add job to db
Route::post('/jobs', function () {
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
});

Route::get('/contact', function () {
    return view('contact');
});


//edit  job
Route::get('/jobs/{id}/edit', function ($id) {


    // Find the job by ID

    $job = Job::find($id);
    // Debug the result
    //dd($job);

    // Optionally return a view here if needed (replace 'contact' with your intended view)
    return view('jobs.edit', ['job' => $job]);
});

//update  job
Route::patch('/jobs/{id}', function ($id) {
    //validate job
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        //'employer_id' => '',
    ]);
    //authorize
    //update
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();
    //redirect
    return redirect('/jobs/' . $job->id);
});

//delete a job
Route::delete('/jobs/{id}', function ($id) {
    //authorize
    //delete
    $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
});
