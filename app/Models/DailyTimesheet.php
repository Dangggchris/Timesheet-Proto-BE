<?php

namespace App\Models;
use App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTimesheet extends Model
{
    use HasFactory;

    public function projects(){
        return $this->belongsToMany(Projects::class);
    }

     protected $fillable = [
        'project_id',
        'user_id',
        'date',
        'hours',
        'notes',
    ];
}
