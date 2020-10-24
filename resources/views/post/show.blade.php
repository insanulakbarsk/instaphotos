@extends('layouts.home')

@section('content')
<section class="content-header mt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-light">
        <h1>Post Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/post" class="text-light">Post</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <!-- Box Comment -->
  <div class="card card-widget">
    <div class="card-header" style="background: #97caef;">
      <div class="user-block">
        <img class="img-circle" src="{{ url('https://randomuser.me/api/portraits/thumb/men/14.jpg') }}" alt="User Image">
        <span class="username"><a href="#" class="text-dark">{{ $post -> user -> username }}</a></span>
        <span class="description text-dark">{{ $post -> created_at }}</span>
      </div>
      <div class="card-tools">
        <div class="btn-group">
          <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
            <i class="fas fa-wrench"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="dropdown-item">Edit</a>
            <form action="{{ route('post.show', ['post' => $post->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
            </form>
          </div>
        </div>
      </div>
      <!-- /.user-block -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <img class="img-fluid pad mb-3" src="{{ asset('uploads/post/' . $post -> img_url) }}" alt="">
      <?php $caption = explode("\n", $post->caption);?>
      <ul>
        <?php
          for ( $i = 0; $i < count( $caption ); $i++ ) {
          ?><li>{{ $caption[$i] }}</li><?php
          }
        ?>
      </ul>
      <div>
        <p class="text-dark mt-2">Hashtag:</p>
        @forelse ($post->tags as $tag)
        <button class="btn btn-light btn-sm">{{ $tag->tag_name }}</button>
        @empty
        No Hashtag
        @endforelse
      </div>

      <div class="mt-3">
        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
        <span class="float-right text-muted">{{$post->comments->count()}} comments</span>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer card-comments">
      @foreach($post -> comments as $comment)
      <div class="card-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="{{ asset('images/profile-image.jpg') }}" alt="User Image">
        <div class="comment-text text-dark">
          <span class="username">
            {{ $comment -> user -> name }}
            <span class="text-muted float-right">{{ $comment -> created_at }}</span>
          </span><!-- /.username -->
          {{ $comment -> content }}
        </div>
        <!-- /.comment-text -->
      </div>
      <!-- /.card-comment -->
      @endforeach
    </div>
    <!-- /.card-footer -->

    <div class="card-footer">
      <form action="/comment/{{ $post->id }}" method="post">
        @csrf
        <img class="img-fluid img-circle img-sm" src="{{ url('https://randomuser.me/api/portraits/thumb/men/14.jpg') }}" alt="Alt Text">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push d-flex">
          <input type="text" class="form-control form-control-sm" name="content"
            placeholder="Press enter to post comment">
          <input type="submit" value="Comment" class="btn btn-outline-dark btn-sm btn-light">
        </div>

      </form>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</section>

@endsection
