<?php

namespace App\Models;

use App\Models\Admin\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    
    public function projects(){
        return $this->belongsToMany(Project::class)
    }
}
