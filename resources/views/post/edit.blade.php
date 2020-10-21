@extends('layouts.home')

@section('content')
    <section class="card" style="background: #e8519e;">
        <div class="card-header">
            <h3 class="card-title">Edit your tweet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <textarea rows = "10" class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer float-right">
                <input type="file" class="btn btn-light" name="image"></input>
                <button type="submit" class="btn btn-light">Edit</button>
            </div>
        </form>
    </section>
@endsection