<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #97caef;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="img_url">Add image</label>
            <input type="file" class="btn btn-light" name="img_url"></input>
          </div>
          <div class="form-group">
            <label for="capton">Image Caption</label>
            <textarea rows="7" class="form-control" id="caption" name="caption"
              placeholder="What's happening?"></textarea>
          </div>
          <div class="form-group">
            <label for="tags">Hashtag</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Use comma to seperate each word">
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-light float-right">Post</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>