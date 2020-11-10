<?php

namespace App\Models;

use App\Models\User;
use App\Models\DailyTimesheet;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'projects_user', 'projects_id', 'user_id');
    }

    protected $fillable = [

        'name',
    ];
}
