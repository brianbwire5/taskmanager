<?php

namespace App\Traits;

use App\Models\Activity;

trait RecordActivity
{
    public $old = [];


    public static function bootRecordActivity(){

        foreach (self::recordableEvents() as $event){
            static::$event(function($model) use ($event){
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated') {

                static::updating(function($model){
                    $model->old = $model->getOriginal();
                });
            }
        }
    }
    protected  function activityDescription($description): string
    {
        if(class_basename($this) !== 'Project'){
            return $description = strtolower(class_basename($this)) . "_{$description}";
        }
        return $description;
    }

    public static function recordableEvents(): array
    {
        if (isset(static::$recordableEvents)) {
           return static::$recordableEvents;
        }
           return ['created', 'updated', 'deleted'];
    }


    public function recordActivity($description)
    {
        $this->activity()->create([
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id,
        ]);

    }

    public function activity(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    public function activityChanges(): ?array
    {
        if ($this->wasChanged()) {
            return [
                'before' => array_diff($this->old, $this->getAttributes()),
                'after' => $this->getChanges(),
            ];
        } else {
            return null;
        }
    }
}
