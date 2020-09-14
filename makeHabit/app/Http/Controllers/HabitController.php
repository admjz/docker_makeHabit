<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHabitRequest;
use App\Models\Execution;
use App\Models\Habit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    private $habit;

    private $execution;

    public function __construct(Habit $habit, Execution $execution)
    {
        $this->middleware('auth');
        $this->habit = $habit;
        $this->execution = $execution;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habits = $this->habit->getMyHabits();
        return view('habit.index', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateHabitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHabitRequest $request)
    {
        $inputs = $request->input();
        $inputs['user_id'] = Auth::id();
        $this->habit->saveHabit($inputs);
        session()->flash('flash_success', '新しい習慣を登録しました');
        return redirect()->route('habit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $habit_id
     * @return \Illuminate\Http\Response
     */
    public function show($habitId)
    {
        $habit = $this->habit->findHabit($habitId);
        $this->authorize('view', $habit);
        $executions = $habit->executions()->orderBy('created_at', 'desc')->paginate();
        $today = Carbon::today();
        $execDate = $this->execution->findExecutions($habitId);
        $compareDate = $today->isSameday(Carbon::parse($execDate));
        if (is_null($execDate)) {
            $execDate = '';
            return view('/habit/show', compact('habit', 'executions', 'execDate'));
        } elseif ($compareDate) {
            return view('/habit/show', compact('habit', 'executions'));
        } else {
            return view('/habit/show', compact('habit', 'executions', 'execDate'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($habitId)
    {
        $habit = $this->habit->findHabit($habitId);
        $this->authorize('update', $habit);
        return view('/habit/edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CreateHabitRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateHabitRequest $request, $habitId)
    {
        $inputs = $request->input();
        $this->habit->updateHabit($habitId, $inputs);
        session()->flash('flash_success', '習慣のタイトルを変更しました');
        return redirect()->route('habit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($habitId)
    {
        $this->habit->deleteHabit($habitId);
        return redirect()->route('habit.index');
    }
}
