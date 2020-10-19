<?php

namespace App\Models;
use App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTimesheet extends Model
{
    use HasFactory;

     protected $fillable = [
        'projects_id',
        'user_id',
        'date',
        'hours',
        'notes',
    ];
}
