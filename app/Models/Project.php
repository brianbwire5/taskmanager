<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    /**
     * @var mixed
     */
    private $owner;
    /**
     * @var mixed
     */
    private $tasks;

    use HasFactory;

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

    public function addTask($body)
    {
        $this->tasks()->create(['body'=>$body]);
    }

}
