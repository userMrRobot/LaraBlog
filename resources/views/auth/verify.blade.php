@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите ваш email адрес') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Вы не можете продолжить,пока не подтвердите свой email адресс. Письмо будет отправленно на ' . auth()->user()->email ) }}
                        </div>
                    @endif

                    {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
                    {{ __('') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Отправить ссылку повторно') }}</button>.
                    </form>
                        <a class="nav-link" href="{{route('home')}}">На главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
