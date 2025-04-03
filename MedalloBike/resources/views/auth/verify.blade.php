<!-- Made by: Camilo Monsalve Montes -->

@extends('layouts.app')

@section('title', __('auth.verify.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('auth.verify.title') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('auth.verify.messages.link_sent') }}
                            </div>
                        @endif

                        {{ __('auth.verify.messages.check_email_for_verification') }}
                        {{ __('auth.verify.messages.did_not_receive_email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{ __('auth.verify.messages.click_here_to_request_another') }}
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
