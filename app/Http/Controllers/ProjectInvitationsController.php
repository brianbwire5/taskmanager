<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project)
    {
        $this->authorize('manage', $project);

        request()->validate([
            'email' => ['required', 'exists:users,email']],
            ['email.exists' => 'The user must have a registered account']);

        $user = User::whereEmail(request('email'))->first();

        $project->invite($user);

        return redirect($project->path());

    }
}
