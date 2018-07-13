@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h3>Welcome, {{Auth::user()->name}}</h3>
                        <div class="table-responsive">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ruolo Band</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    <td>{{Auth::user()->id }}</td>
                                    <td>{{Auth::user()->name }}</td>
                                    <td>{{Auth::user()->username }}</td>
                                    <td>{{Auth::user()->email }}</td>
                                    <td>{{Auth::user()->roleband }}</td>
                                    <td><div class="btn-group" role="group">
                                            <a href="{{ action('UserController@edit', Auth::user()->id) }}">
                                                <button type="button" class="btn btn-warning">{{ __('Edit') }}</button>
                                            </a>&nbsp;
                                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{  action('UserController@destroy', Auth::user()->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}"/>
                                            </form>
                                        </div></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ action('BandController@index')}}" class="btn btn-primary">{{ __('Band Manage') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
