<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHabitRequest;
use App\Models\Habit;
use App\Models\Execution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    private $habit;

    public function __construct(Habit $HabitInstance)
    {
        $this->middleware('verified');
        $this->habit = $HabitInstance;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habits = $this->habit->getHabits(Auth::id());
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
        $executions = $habit->executions()->orderBy('created_at', 'desc')->paginate();
        $today = Carbon::today();
        $execDate = $this->habit->findExecutions($habitId);
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
