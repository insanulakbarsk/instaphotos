@extends('layouts.home')

@section('content')
<!-- Box Comment -->
<div class="card card-widget" >
      <div class="card-header" style="background: #e8519e;">
        <div class="user-block">
          <img class="img-circle" src="{{ asset('images/profile-image.jpg') }}" alt="User Image">
          <span class="username"><a href="#" class="text-dark">{{ $post -> user -> name }}</a></span>
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
        <img class="img-fluid pad mb-3" src="{{ asset('uploads/post/' . $post -> image) }}" alt="">
        <?php $content = explode("\n", $post->content);?>    
        <ul>
        <?php
          for ( $i = 0; $i < count( $content ); $i++ ) {
          ?><li>{{ $content[$i] }}</li><?php
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
          <span class="float-right text-muted">3 comments</span>
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
          <img class="img-fluid img-circle img-sm" src="{{ asset('images/profile-image.jpg') }}" alt="Alt Text">
          <!-- .img-push is used to add margin to elements next to floating images -->
          <div class="img-push d-flex">
            <input type="text" class="form-control form-control-sm" name="content" placeholder="Press enter to post comment">
            <input type="submit" value="Comment" class="btn btn-outline-dark btn-sm btn-light">
          </div>
          
        </form>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->   
            
@endsection