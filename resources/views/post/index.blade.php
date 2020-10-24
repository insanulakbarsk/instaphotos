@extends('layouts.home')

@section('content')

<section class="content">
  <div class="row mr-0 pl-3">
    <!-- Main content -->
    <div class="col-md-8 mt-5 pt-4">
      @include('layouts.partials.post_modal')
      <div class="container-fluid">
        <button type="button" class="btn btn-block btn-light mb-4" data-toggle="modal"
          data-target="#exampleModalCenter">
          <i class="fas fa-plus-circle"></i>
          New Post
        </button>
        <!-- <a class="btn btn-block btn-light mb-4" href="{{ route('post.create') }}">Tweet</a> -->
        @forelse($posts as $key => $post)
        <!-- Box Comment -->
        <div class="card card-widget">
          <div class="card-header" style="background: #97caef;">
            <div class="user-block">
              <img class="img-circle" src="{{ url('https://randomuser.me/api/portraits/thumb/men/'.$key.'.jpg') }}" alt="User Image">
              <span class="username"><a href="#" class="text-dark">{{ $post -> user -> username }}</a></span>
              <span class="description text-dark">{{ $post -> created_at }}</span>
            </div>
            <div class="card-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="{{ route('post.show', ['post' => $post->id]) }}" class="dropdown-item">See</a>
                  @if ($post->isCreatedBySelf())
                    <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="dropdown-item">Edit</a>
                    <form action="{{ route('post.show', ['post' => $post->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
                    </form>
                  @endif
                </div>
              </div>
            </div>
            <!-- /.user-block -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <img class="img-fluid pad mb-3" src="{{ asset('uploads/post/' . $post -> img_url) }}" alt="">
            <?php $content = explode("\n", $post->caption);?>
            <ul>
              <?php
                for ( $i = 0; $i < count( $content ); $i++ ) {
                ?><li>{{ $content[$i] }}</li><?php
                }
              ?>
            </ul>
            <div>
              <p class="text-dark mt-2">Hashtag:</p>
              @forelse($post->tags as $tag)
              <button class="btn btn-light btn-sm">{{ $tag->tag_name }}</button>
              @empty
              No Hashtag
              @endforelse
            </div>
            <div class="mt-3">
              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
              @if ($post->isLiked())
              <form class="d-inline" action="{{ route('post_like.destroy', ['post_like' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Liked</button>
              </form>
              @else
              <form class="d-inline" action="{{ route('post_like.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="post_id" class="dropdown-item btn btn-light btn-sm">
                <button type="submit" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
              </form>
              @endif
              <span class="ml-2 text-muted">{{$post->likes->count()}} likes</span>
              <span class="float-right text-muted">{{$post->comments->count()}} comments</span>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer card-comments">
            @foreach($post -> comments as $comment)
            <div class="card-comment">
              <!-- User image -->
              <img class="img-circle img-sm" src="{{ url('https://randomuser.me/api/portraits/thumb/men/14.jpg') }}" alt="User Image">
              <div class="comment-text text-dark">
                <span class="username">
                  {{ $comment -> user -> name }}
                  <div class="float-right d-flex flex-column align-items-end">
                      <span class="text-muted">{{ $comment -> created_at }}</span>
                      <div>
                        <span class="text-muted mr-2">{{ $comment->likes->count() }} likes</span>
                        @if ($comment->isLiked())
                        <form class="d-inline" action="{{ route('comment_like.destroy', ['comment_like' => $comment->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Liked</button>
                        </form>
                        @else
                        <form class="d-inline" action="{{ route('comment_like.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $comment->id }}" name="post_id" class="dropdown-item btn btn-light btn-sm">
                            <button type="submit" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                        </form>
                        @endif
                      </div>
                  </div>
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
            <form action="/comment/{{ $post->id }}" method="POST">
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
        @empty
        <div class="text-center">No Post</div>
        @endforelse
      </div>
    </div>

    <!-- /.content -->
    <!-- Right sidebar -->
    @include('layouts.partials.right_sidebar', ['tags' => $tags, 'users' => $users])
    <!--/. Right sidebar -->
  </div>


</section>
@endsection
