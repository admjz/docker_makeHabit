@extends('layouts/app')
@section('content')

<div class="habit-container">
  <h2 class="container_title">記録したい内容を入力してください</h2>
  <div class="margin-top50">
    {!! Form::open(['route' => ['execution.update', $execution->id], 'method' => 'PUT']) !!}
      <div>
        <div class="container-subtitle">【 {{ $execution->habit->title }} 】</div>
        <div class="container-subtitle margin-top10">{{ $execution->created_at->format('Y/m/d') }}の記録</div>
        <div class="margin-top30">
          {!! Form::textarea('contents', $execution->contents, ['class' => 'input-area', 'rows' => 5]) !!}
          @if ($errors->has('contents'))
            <span class="error-message">{{ $errors->first('contents') }}</span>
          @endif
        </div>
      </div>
      <div class="margin-top50">
        {!! Form::button('更新', ['type' => 'submit', 'class' => 'btn btn-add']) !!}
      </div>

    {!! Form::close() !!}
  </div>
</div>

@endsection