<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
//use App\Http\Controllers\Auth;
use Auth;
use Str;
use Hash;




class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->accessibleProjects();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {

        return view('projects.create');
    }

    public function store()
    {

        $attributes = $this->validateRequest();

        auth()->user()->projects()->create($attributes);

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

//        if (auth()->user()->isNot($project->owner)) {
//            abort(403);
//        }

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $this->authorize('update', $project);

        $attributes = $this->validateRequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    public function validateRequest(): array
    {
        return $attributes = request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'min:3',
        ]);
    }

    public function destroy(Project $project)
    {
        $this->authorize('manage', $project);

        $project->delete();

        return redirect('/projects');
    }

    public function github()
    {

     return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()

    {
     $user = Socialite::driver('github')->user();
     
     $user = User::firstOrCreate([
         'email' => $user->email
     ], [
         'name' => $user->name,
         'password'=> Hash::make(Str::random(24))
     ]);

      Auth::login($user, true);

     return redirect('projects');

    }
}
