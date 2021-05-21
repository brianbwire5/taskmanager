<?php

namespace App\Models;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use RecordActivity;
    protected $guarded = [];
    protected $touches =['project'];
    protected static $recordableEvents = ['created','deleted'];

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function path()
    {
        return "/projects/{$this->project->id}/tasks/$this->id";
    }

    public function complete()
    {
       $this->update(['completed'=>true]);

        $this->recordActivity('task_completed');
    }

    public function incomplete()
    {
        $this->update(['completed'=>false]);

        $this->recordActivity('task_uncompleted');
    }
}
