<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

function chkStaffTask($task_id){
    if($task_id){
        $hasTask = DB::table('user_tasks')->where('task_id', $task_id)->first();
        if($hasTask){
            if($hasTask->user_id == Auth::user()->id){
                return 1;
            }else{
                return 2;
            }
        }else{
            return false;
        }
    }
}

function chkTaskHasPhoto($task_id){
    if($task_id){
        $hasTask = DB::table('searched_photos')->where('task_id', $task_id)->count();
        if($hasTask){
            return true;
        }else{
            return false;
        }
    }
}

function chkStaffTaskStatus(){
    $hasPendingTask = DB::table('user_tasks')
        ->where('user_tasks.user_id', Auth::user()->id)
        ->join('tasks', function ($join) {
            $join->on('user_tasks.task_id', '=', 'tasks.id')
                 ->where('tasks.task_status', '!=', 1);
        })
        ->count();
    if($hasPendingTask){
        return true;
    }
    return false;
}