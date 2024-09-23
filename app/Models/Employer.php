<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    public function jobs()
    {
        return $this->hasMany(Job::class);  // Assuming job_listing table has employer_id column for foreign key relationship with Employer table.  Replace Job::class with your actual Job model.  Also, make sure the column name in both tables match.
    }
}
