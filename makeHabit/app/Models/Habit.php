<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Habit extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'title',
    ];

    protected $perPage = 6;

    public function executions()
    {
        return $this->hasMany('App\Models\Execution');
    }

    public function getMyHabits()
    {
        return $this->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate();
    }

    public function saveHabit($inputs)
    {
        return $this->fill($inputs)->save();
    }

    public function findHabit($habitId)
    {
        return $this->find($habitId);
    }

    public function updateHabit($habitId, $inputs)
    {
        return $this->find($habitId)->fill($inputs)->save();
    }

    public function deleteHabit($habitId)
    {
        return $this->find($habitId)->delete();
    }
}
