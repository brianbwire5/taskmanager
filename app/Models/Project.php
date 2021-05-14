<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\RecordActivity;

class
Project extends Model
{
    protected $guarded = [];

    use HasFactory;
    use RecordActivity;

    public function path(): string
    {
        return "/projects/{$this->id}";
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Task::class);
    }

    public function activity(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function addTask($body)
    {
        $task = $this->tasks()->create(['body' => $body]);
        return $task;

    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');
    }

}

