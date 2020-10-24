@extends('layouts.home')

@section('content')
<section class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 text-light">
                <h1>Edit Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/post" class="text-light">Post</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-widget" style="background: #97caef; margin-top: 10px;">
        <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <img class="img-fluid pad mb-3" src="{{ asset('uploads/post/' . $post -> img_url) }}" alt="">
                <div class="form-group">
                    <label for="capton">Image Caption</label>
                    <textarea rows="10" class="form-control" id="caption"
                        name="caption">{{ old('caption', $post->caption) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Hashtag</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{old('tag_name', $tag_name)}}"
                        placeholder="Use comma to seperate each word">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer float-right">
                <button type="submit" class="btn btn-light">Edit</button>
            </div>
        </form>
    </div>
</section>
@endsection