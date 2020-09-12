@extends('layouts/app')
@section('content')

<div class="habit-container">
  <h2 class="container_title">習慣にしたいことは何ですか？</h2>
  <div class="margin-top50">
    {!! Form::open(['route' => 'habit.store']) !!}
      <div>
        {!! Form::text('title', '', ['placeholder' => '例)筋トレ', 'class' => 'input-area']) !!}
        @if ($errors->has('title'))
          <span class="error-message">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="margin-top50">
        {!! Form::button('登録する！', ['type' => 'submit', 'class' => 'btn btn-add']) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
