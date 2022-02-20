<?php

namespace App\Http\Controllers;

use App\Mail\groupInviteMail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project)
    {
        $this->authorize('manage', $project);

        request()->validate([
            'email' => ['required', 'exists:users,email']],
            ['email.exists' => 'The user must have a registered account']);

        $user = User::whereEmail(request('email'))->first();
       // dd($user->email);
       $data = $user;

        $project->invite($user);

        Mail::to($user->email)->send(new groupInviteMail($data));
        
    
        return redirect($project->path());

    }
}
