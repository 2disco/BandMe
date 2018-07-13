@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Band') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ action('BandController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Band Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="born" class="col-md-4 col-form-label text-md-right">{{ __('Foundation Band') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="date" class="form-control{{ $errors->has('born') ? ' is-invalid' : '' }}" name="born" value="{{ old('born') }}" required>

                                @if ($errors->has('born'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('born') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label for="visibility">
                                        <input id="privacy" type="checkbox" name="visibility" value="1"> {{ __('Home Visibility') }}
                                    </label>
                                </div>
                                @if ($errors->has('visibility'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label for="add_member">
                                        <input type="hidden" name="add_member" value="0">
                                        <input type="checkbox" name="add_member" value="1" {{ old('add_member') ? 'checked' : null}}> {{ __('Add member') }}
                                    </label>
                                </div>
                                @if ($errors->has('add_member'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('add_member') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea id="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" rows="5" name="bio">
                                </textarea>

                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ '/band'  }}" class="btn btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
