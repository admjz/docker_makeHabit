<?php

namespace App\Http\Controllers;

use App\Models\Execution;
use App\Http\Requests\CreateExecutionRequest;

class ExecutionController extends Controller
{
    private $execution;

    public function __construct(Execution $execution)
    {
        $this->middleware('verified');
        $this->execution = $execution;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExecutionRequest $request)
    {
        $inputs = $request->all();
        $this->execution->saveExecution($inputs);
        session()->flash('flash_success', '記録しました');
        return redirect()->route('habit.show', $inputs['habit_id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($executionId)
    {
        $execution = $this->execution->findExecution($executionId);
        $habit = $execution->habit;
        $this->authorize('update', [$execution, $habit]);
        return view('/execution/edit', compact('execution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateExecutionRequest $request, $executionId)
    {
        $inputs = $request->all();
        $this->execution->updateExecution($executionId, $inputs);
        $habit = $this->execution->findHabit($executionId);
        $executions = $this->execution->findExecution($executionId);
        session()->flash('flash_success', '記録の内容を変更しました');
        return redirect()->route('habit.show', compact('habit', 'executions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($executionId)
    {
        $this->execution->deleteExecution($executionId);
        return back();
    }
}
