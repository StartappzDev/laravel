<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
  
    return view('jobs', [
        'jobs' => Job ::all()
    ]);
});

Route::get('/jobs/{id}', function ($id)  {
 

    // Find the job by ID
    
    $job = Job::find($id);
    // Debug the result
    //dd($job);

    // Optionally return a view here if needed (replace 'contact' with your intended view)
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
