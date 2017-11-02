@extends('layouts.master')

@section('content')
    <div class="col-md-8">

        <h1>Publish a Post</h1>

        <hr/>

        <form method="POST" action="/posts">

            {{ csrf_field() }}

            @include('layouts.errors')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Publish</button>
            </div>


        </form>


    </div>
@endsection