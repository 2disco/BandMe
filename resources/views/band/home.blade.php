@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">Band</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($bands) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-light">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($bands as $band)
                                        <tr>
                                            <td>{{$band->id }}</td>
                                            <td>{{$band->name }}</td>
                                            @if($band->isUserBandAdmin(Auth::user()->id))
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ action('BandController@edit', $band->id) }}">
                                                            <button type="button"
                                                                    class="btn btn-warning">{{ __('Edit') }}</button>
                                                        </a>&nbsp;
                                                        <form onsubmit="return confirm('Do you really want to delete?');"
                                                              action="{{ action('BandController@destroy', Auth::user()->id) }}"
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
                                            @else
                                                <td><a href="{{$band->url}}"
                                                       class="btn btn-primary">{{ __('Show page') }}</a><br/>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($band->isUserBandAdmin(Auth::user()->id) && !Auth::user()->isAdmin())
                                <div class="card-header text-center">{{ __('Members of ' . $band->name) }}</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-light">
                                            <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Band Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($band->users as $member)
                                                <tr>
                                                    <td>{{$member->name}}</td>
                                                    <td>{{$member->roleband}}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Do you really want to delete?');"
                                                              action=" {{ action('BandController@removeBandMember',['id' => $band->id, 'user_id' => $member->id]) }} "
                                                              method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <input type="submit" class="btn btn-outline-danger"
                                                                   value="{{ __('Remove') }}"/>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                    <a href="{{ ('/home') }}" class="btn btn-primary">{{ __('Back') }}</a>
                                    @else
                                        <a class="btn btn-primary" href="{{ action('BandController@create') }}">Create
                                            Band</a>
                                        <a class="btn btn-primary"
                                           href="{{ action('BandController@listBandAvailable') }} ">{{ __('Add to Band') }}</a>
                                        <div align="center">
                                            <a href="{{ ('/home') }}" class="btn btn-primary">{{ __('Back') }}</a>
                                        </div>
                                    @endif
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
