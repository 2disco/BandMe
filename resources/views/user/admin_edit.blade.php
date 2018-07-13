@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{action('AdminController@updateUser', ['id' => $user->id])}}">
                            @csrf
                            @method("PATCH")
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roleband" class="col-md-4 col-form-label text-md-right">{{ __('Ruolo Band') }}</label>

                                <div class="col-md-6">
                                    <select id="roleband" type="text" class="form-control" name="roleband" required>
                                        @php($rolebandOptions = [
                                            'Chitarrista' => 'Chitarrista',
                                            'Batterista' => 'Batterista',
                                            'Bassista' => 'Bassista',
                                            'Tastiera' => 'Tastiera'
                                        ])
                                        @foreach($rolebandOptions as $roleband)
                                            <option value="{{ $roleband }}" @if($roleband == $user->roleband) selected @endif> {{ strtoupper($roleband) }}</option>
                                        @endforeach

                                        @if ($errors->has('roleband'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('roleband') }}</strong>
                                            </span>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label for="privacy">
                                            <input id="privacy" type="checkbox" name="privacy" value="{{ $user->privacy }}" required checked> {{ __('Consenso privacy') }}
                                        </label>
                                    </div>
                                    @if ($errors->has('privacy'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('privacy') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
