@extends('main')

@section('title', '| All Recipes')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1 class="niceText">All Recipes</h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!--end of row-->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Preparation</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Created At</th>
                </thead>

                <tbody>
                
                    @foreach ($posts as $post)

                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->ingridients !!}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                            <td><img src="{{ asset('images/' . $post->image) }}" height="200" width="200" /></td>
                            <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
                            <td><a href="{{ route('admin_posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a> 
                            <a href="{{ route('admin_posts.edit', $post->id) }}" class="btn btn-danger btn-sm">Edit</a></td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection