
@extends('base')

@section('content')

<div class="row m-5">
    <h1 style="color: black">TRACKS</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Album Genre</th>
                <th>Duration</th>
                <th>Composer</th>
                <th>track Number</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tracks as $track): ?>

                <tr>
                    <td>{{$track->id}}</td>
                    <td>{{$track->title}}</td>
                    <td>{{$track->album->genre}}</td>
                    <td>{{$track->duration}}</td>
                    <td>{{$track->composer}}</td>
                    <td>{{$track->track_number}}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

@endsection
