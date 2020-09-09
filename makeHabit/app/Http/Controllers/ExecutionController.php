<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExecutionRequest;
use App\Models\Execution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExecutionController extends Controller
{
    private $execution;

    public function __construct(Execution $ExecutionInstance)
    {
        $this->middleware('verified');
        $this->execution = $ExecutionInstance;
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
