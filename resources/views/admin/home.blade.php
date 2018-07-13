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
                        <div>
                            <h1>Admin Home</h1>
                            <h3>Welcome, {{Auth::user()->name}}</h3>
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action" href="{{ route('user.index') }}">
                                    {{ __('List User') }}
                                </a>
                                <a class="list-group-item list-group-item-action" href="{{ route('band.index') }}">
                                    {{ __('List Band') }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection