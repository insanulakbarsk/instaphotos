@extends('layouts.home')

@section('content')
    <section class="card" style="background: #e8519e;">
        <div class="card-header">
            <h3 class="card-title">What is on your mind?</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <textarea rows = "7" class="form-control" id="content" name="content" placeholder="What's happening?"></textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Hashtag</label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Use comma to seperate each word">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <span class=" float-right">Add image to your post
                    <input type="file" class="btn btn-light" name="image"></input>
                    <button type="submit" class="btn btn-light">Tweet</button>
                </span>
            </div>
        </form>
    </section>
@endsection