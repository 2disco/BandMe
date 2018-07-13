@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Show Band</div>
                    <img class="card-img-top" src="/storage/band_avatars/{{ $band->band_avatar }}" alt="">

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
                                        <th scope="col">Bio</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                            <tr>
                                                <td>{{$band->name }}</td>
                                                <td>{{$band->born }}</td>
                                                <td>{{$band->bio }}</td>
                                            </tr>
                                    </tbody>
                                </table>
                                <form action="{{action('BandController@updateBandAvatar', $band->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="band_avatar" id="avatarFile" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ ('/band') }}" class="btn btn-primary">{{ __('Back') }}</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection