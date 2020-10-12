<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    public function users(){
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'name',
    ];

}
