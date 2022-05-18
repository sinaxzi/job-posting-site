<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function delete(User $user,Job $job){
            
        return $job->user_id === auth()->id();
    }

    public function manangeJobs(Job $job){
            
        return $job->user_id === auth()->id();
    }
}
