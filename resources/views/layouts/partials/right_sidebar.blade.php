<div class="col-md-4  mt-5 pt-4 pr-0">

  <div class="card rounded" style="background: #97caef;  position: -webkit-sticky; position: sticky; top: 60px;">
    <div class="card-header">
      <h3 class="card-title">Trends for you</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="products-list product-list-in-card pr-2">

        @forelse($tags as $tag)
        <li class="item pl-4 py-1" style="background: #97caef;">
          <a href="#" class="product-title text-dark"> {{ $tag->tag_name }}</a>
          <p>{{$tag->tagged_post_count()}} Posts</p>
        </li>
        @empty
        <p style="text-align:center">No Hashtag</p>
        @endforelse

      </ul>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card" style="background: #97caef;  position: -webkit-sticky; position: sticky; top: 290px;">
    <div class="card-header">
      <h3 class="card-title">Who to follow</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="products-list product-list-in-card pl-3 pr-2">

        @forelse($users as $key => $user)
        <li class="item" style="background: #97caef;">
          <div class="product-img">
            <img class="img-circle img-size-50"
              src="{{ url('https://randomuser.me/api/portraits/thumb/men/'.$key.'.jpg') }}" alt="User Image">
          </div>
          <div class="product-info">
            <a href="#" class="product-title text-dark">{{ $user->profile->full_name }}</a>
            <span>
              @if ($user->isFollowed())
              <form class="d-inline" action="{{ route('follow.destroy', ['follow' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light btn-sm float-right mt-2 mr-3 py-2"
                  style="border-radius:50px"> Unfollow</button>
              </form>
              @else
              <form class="d-inline" action="{{ route('follow.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id" class="dropdown-item btn btn-light btn-sm">
                <button type="submit" class="btn btn-light btn-sm float-right mt-2 mr-3 py-2"
                  style="border-radius:50px">Follow</button>
              </form>
              @endif
            </span>
            <p>{{ $user->username }}</p>
          </div>
        </li>
        @empty
        No Recommendations
        @endforelse

      </ul>
    </div>
  </div>

  <div class="description mb-3" style="position: -webkit-sticky; position: sticky; top: 565px;">
    <p class="text-dark">Copyright &copy; 2020 Twitter All rights reserved.</p>
  </div>
</div>