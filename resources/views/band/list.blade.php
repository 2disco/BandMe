@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Available Band</div>

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
                                    <th scope="col">Nome</th>
                                    <th scope="col">Born</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($bands as $band)
                                    @if($band->add_member === 1)
                                <tr>
                                    <td>{{$band->name }}</td>
                                    <td>{{$band->born }}</td>
                                    <td>{{$band->bio }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action=" {{ action('BandController@addBandMember',['id' => $band->id])}} "
                                                  method="POST">
                                                @csrf

                                                <input type="submit" class="btn btn-outline-primary" value="{{ __('Add') }}"/>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div align="center">
                                <a href="{{ route('band.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection