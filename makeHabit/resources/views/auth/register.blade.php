@extends('layouts.app')

@section('content')
<div class="habit-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header container_title">新規登録</div>

                <div class="card-body margin-top50">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">アカウント名</label>

                            <div class="col-md-6 margin-top10">
                                <input id="name" type="text" class="form-control input-area  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="error-message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row margin-top30">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Eメール</label>

                            <div class="col-md-6 margin-top10">
                                <input id="email" type="email" class="form-control input-area  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="error-message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row margin-top30">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6 margin-top10">
                                <input id="password" type="password" class="form-control input-area  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="error-message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row margin-top30">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認用)</label>

                            <div class="col-md-6 margin-top10">
                                <input id="password-confirm" type="password" class="form-control input-area " name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 margin-top30">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-add btn-primary">
                                    新規登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
