<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Execution extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'habit_id',
        'contents',
    ];

    protected $perPage = 5;

    public function habit()
    {
        return $this->belongsTo('App\Models\Habit');
    }

    public function getExecution()
    {
        return $this->get();
    }

    public function saveExecution($inputs)
    {
        return $this->fill($inputs)->save();
    }

    public function findExecution($executionId)
    {
        return $this->find($executionId);
    }

    public function findExecutions($habitId)
    {
        return $this->where('habit_id', $habitId)
                    ->orderBy('created_at', 'desc')
                    ->pluck('created_at')
                    ->first();
    }

    public function updateExecution($executionId, $inputs)
    {
        return $this->find($executionId)->fill($inputs)->save();
    }

    public function deleteExecution($executionId)
    {
        return $this->find($executionId)->delete();
    }
}
