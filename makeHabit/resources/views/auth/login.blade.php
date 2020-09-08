@extends('layouts.app')

@section('content')
<div class="habit-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container_title">ログイン</div>
                {!! Form::open(['route' => 'login.guest']) !!}
                    {!! Form::button('ゲストとしてログインする', ['class' => 'btn btn-guest margin-top50', 'type' => 'submit']) !!}
                {!! Form::close() !!}
                <div class="card-body margin-top50">
                    <form method="POST" action="{{ route('login') }}">
                        @error('email')
                            <span class="error-message" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('password')
                            <span class="error-message" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @csrf
                        <div class="form-group row margin-top30">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Eメール</label>

                            <div class="col-md-6 margin-top10">
                                <input id="email" type="email" class="form-control input-area @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row margin-top30">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6 margin-top10">
                                <input id="password" type="password" class="form-control input-area @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0  margin-top30">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-add btn-primary">
                                    ログイン
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-forget btn-link margin-top10" href="{{ route('password.request') }}">
                                        パスワードをお忘れですか？
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
