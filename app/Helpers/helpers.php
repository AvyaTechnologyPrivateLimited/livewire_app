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