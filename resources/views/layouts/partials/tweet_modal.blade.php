    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background: #e8519e;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tweet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <textarea rows = "7" class="form-control" id="content" name="content" placeholder="What's happening?"></textarea>
              </div>
              <div class="form-group">
                <label for="tags">Hashtag</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Use comma to seperate each word">
              </div>
            </div>
            <div class="modal-footer">
              <span>Add image to your post
                <input type="file" class="btn btn-light" name="image"></input>
                <button type="submit" class="btn btn-light float-right">Tweet</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>