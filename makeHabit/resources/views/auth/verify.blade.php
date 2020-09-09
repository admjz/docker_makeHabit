@extends('layouts.app')

@section('content')
<div class="habit-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert success-message" role="alert">
                            {{ __('メールアドレス認証用のメールを再送信しました。') }}
                        </div>
                    @else
                        <div class="card-header success-message">{{ __('メールアドレス認証用のメールを送信しました。') }}</div>
                    @endif
                    <div class="margin-top10 success-message">
                        {{ __('メール内のリンクからアドレスの認証を行ってください。') }}
                    </div>
                    <div class="margin-top50">
                        {{ __('【メールが届いていない場合は下のリンクから再度メール送信を行ってください。】') }}
                    </div>
                    <form class="d-inline margin-top30" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-forget">{{ __('メールを再送信する') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
