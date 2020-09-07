@extends('layouts/app')
@section('content')

<div class="habit-container">
  <h2 class="container_title">新しいタイトルを入力してください</h2>
  <div class="margin-top50">
    {!! Form::open(['route' => ['habit.update', $habit->id], 'method' => 'PUT']) !!}
      <div>
        {!! Form::text('title', $habit->title, ['class' => 'input-area']) !!}
        @if ($errors->has('title'))
          <span class="error-message">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="margin-top50">
        {!! Form::button('更新', ['type' => 'submit', 'class' => 'btn btn-add']) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection