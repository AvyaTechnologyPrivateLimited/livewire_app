<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'no_of_images'
    ];

    public function taskUsers()
    {
        return $this->hasMany('App\Models\UserTask');
    }

    public function scopeWithStatus($query)
    {
        if (Auth::user()->user_type == 'staff') {
            return $query->where('task_status', '!=', '1');
        }else{
            return;
        }
    }
}
