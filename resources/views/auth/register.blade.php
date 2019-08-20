@extends('layouts.app')

@section('content')
    <registration-component
        action="{{ route('register') }}"
        login_route="{{ route('login') }}"
        csrf_token="{{ csrf_token() }}"

        {{-- localization titles --}}
        login_title="{{ __('constant.login') }}"
        successful_registration="{{ __('constant.successful_registration') }}">
    </registration-component>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('constant.register') }}</div>

                    <div id="register-div" class="card-body">
                        <form id="register-form">

                            <div id="login-div" class="form-group row">
                                <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('constant.username') }}</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" name="login">
                                </div>
                            </div>

                            <div id="first_name-div" class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('constant.first_name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name">
                                </div>
                            </div>

                            <div id="last_name-div" class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('constant.last_name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name">
                                </div>
                            </div>

                            <div id="email-div" class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('constant.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div id="password-div" class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('constant.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div id="password_confirmation-div" class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('constant.password_confirmation') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register-btn" type="submit" class="btn btn-primary">
                                        {{ __('constant.register') }}
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
