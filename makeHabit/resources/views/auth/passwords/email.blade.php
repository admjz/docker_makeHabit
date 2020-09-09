@extends('layouts.app')

@section('content')
<div class="habit-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body margin-top30">
                    @if (session('status'))
                        <div class="success-message" role="alert">
                            {{ session('status') }}
                        </div>
                    @else
                        <div class="card-header error-message">{{ __('パスワードをリセットします。') }}</div>
                        <form method="POST" action="{{ route('password.email') }}" class="margin-top30">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6 margin-top10">
                                    <input id="email" type="email" class="form-control input-area @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="error-message" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 margin-top50">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-forget">
                                        {{ __('パスワードをリセット') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
