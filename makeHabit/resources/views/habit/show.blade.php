@extends('layouts/app')
@section('content')

<div class="habit-container">
  <div>
    <h2 class="container_title">{{ $habit->title }}</h2>
    <div class="margin-top50">
      {!! Form::open(['route' => 'execution.store']) !!}
        {!! Form::hidden('habit_id', $habit->id) !!}
        <div>
          {!! Form::textarea('contents',
                              '',
                              [
                                'class' => 'input-area',
                                'placeholder' => '例)腹筋50回、腕立て伏せ50回 (※何も記入しなくても記録できます)',
                                'rows' => 5
                              ]
                            )
            !!}
          @if ($errors->has('habit_id'))
            <span class="error-message">{{ $errors->first('habit_id') }}</span>
          @elseif ($errors->has('contents'))
            <span class="error-message">{{ $errors->first('contents') }}</span>
          @endif
        </div>
        <div class="margin-top30">
          @if (isset($execDate))
            {!! Form::button('記録する！', ['type' => 'submit', 'class' => 'btn btn-add']) !!}
          @else
            <div class="btn btn-add btn-disabled">今日の分は記録済みです</div>
          @endif
        </>
      {!! Form::close() !!}
    </div>
    @foreach($executions as $execution)
      <div class="execution-box">
        <div class="execution-box_inner">
          <div class="execution-date">{{ $execution->created_at->format('Y/m/d') }}</div>
          <div class="execution-contents margin-top30">
            @if (!empty($execution->contents))
              {!! nl2br(e($execution->contents)) !!}
            @else
              &nbsp;
            @endif
            </div>
        </div>
        <div class="btn edit-form margin-top30">
          <a href="{{ route('execution.edit', $execution->id) }}"><i class="fas fa-edit edit-execution"></i></a>
        </div>
        <div class="delete-form margin-top30">
          {!! Form::open(['route' => ['execution.destroy', $execution->id], 'method' => 'DELETE'])!!}
            {!! Form::button('<i class="fas fa-trash-alt fa-2.5x"></i>',
                              [
                                'type' => 'submit',
                                'class' => 'btn btn-delete',
                                'onclick' => "return confirm('この記録を削除します。よろしいですか？')"
                              ]
                            )
            !!}
          {!! Form::close()!!}
        </div>
      </div>
    @endforeach
  </div>
  <div class="pager margin-top50">
    {{ $executions->appends(request()->all())->links() }}
  </div>
</div>

@endsection
