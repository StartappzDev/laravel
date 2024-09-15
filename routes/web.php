<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => '1',
                'title' => 'Director',
                'salary' => '$50000',
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '$80000',
            ],
            [
                'id' => '3',
                'title' => 'Teacher',
                'salary' => '$40000',
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        ['id' => '1', 'title' => 'Director', 'salary' => '$50000'],
        ['id' => '2', 'title' => 'Programmer', 'salary' => '$80000'],
        ['id' => '3', 'title' => 'Teacher', 'salary' => '$40000']
    ];

    // Find the job by ID
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    // Debug the result
    //dd($job);

    // Optionally return a view here if needed (replace 'contact' with your intended view)
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
