
@extends('base')

@section('content')

<div class="row m-5">
    <h1 style="color: black">ALBUMS</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Artist Name</th>
                <th>Title</th>
                <th>Release Date</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($albums as $album): ?>

                <tr>
                    <td>{{$album->id}}</td>
                    <td>{{$album->artist->artist_name}}</td>
                    <td>{{$album->title}}</td>
                    <td>{{$album->release_date}}</td>
                    <td>{{$album->genre}}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

@endsection
