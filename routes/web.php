<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {

    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(10);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});
Route::get('/jobs/{id}', function ($id) {


    // Find the job by ID

    $job = Job::find($id);
    // Debug the result
    //dd($job);

    // Optionally return a view here if needed (replace 'contact' with your intended view)
    return view('jobs.show', ['job' => $job]);
});
Route::post('/jobs', function () {
    // return request()->all();
    //validation
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
