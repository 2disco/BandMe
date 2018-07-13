@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">Band</div>

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
                                    <th scope="col">Foundation Band</th>
                                    <th scope="col">Visibility</th>
                                    <th scope="col">Add Member</th>
                                    <th scope="col">Url Key</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($bands as $band)
                                    <tr>
                                        <td>{{$band->name }}</td>
                                        <td>{{$band->born }}</td>
                                        <td>{{$band->visibility }}</td>
                                        <td>{{$band->add_member }}</td>
                                        <td>{{$band->url_key }}</td>
                                        <td>{{$band->bio }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ action('AdminController@editBand',['id' => $band->id]) }}">
                                                    <button type="button"
                                                            class="btn btn-warning">{{ __('Edit') }}</button>
                                                </a>&nbsp;
                                                <form onsubmit="return confirm('Do you really want to delete?');"
                                                      action="{{ action('AdminController@removeBand', ['id' => $band->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="submit" class="btn btn-danger"
                                                           value="{{ __('Delete') }}"/>
                                                </form>&nbsp;
                                                <a href="{{$band->url}}">
                                                    <button type="button"
                                                            class="btn btn-primary">{{ __('Show page') }}</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('admin') }}" class="btn btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
