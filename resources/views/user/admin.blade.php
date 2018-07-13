@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Role Band</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name }}</td>
                                        <td>{{$user->username }}</td>
                                        <td>{{$user->email }}</td>
                                        <td>{{$user->type }}</td>
                                        <td>{{$user->roleband }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ action('AdminController@editUser',['id' => $user->id]) }}">
                                                    <button type="button"
                                                            class="btn btn-warning">{{ __('Edit') }}</button>
                                                </a>&nbsp;
                                                <form onsubmit="return confirm('Do you really want to delete?');"
                                                      action="{{  action('AdminController@removeUser',['id' => $user->id])}}"
                                                      method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="submit" class="btn btn-danger"
                                                           value="{{ __('Delete') }}"/>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('admin') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
