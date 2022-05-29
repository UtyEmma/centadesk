<div class="modal fade" id="suggest-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: auto !important;">
        <form action="/me/category/suggest" method="POST">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suggest a Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="single-form">
                    <label for="">Category Name</label>
                    <input type="text" name="title" >
                    <x-errors name="title" />
                </div>

                <div class="single-form">
                    <label for="" class="mb-0">Category Description</label>
                    <p class='mb-1 mt-0'>
                        <small style="font-size: 12px;" class="mb-1">Describe what this category is about. (Max 400 characters) </small>
                    </p>
                    <textarea maxlength="400" name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                    <x-errors name="description" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-hover-dark btn-custom" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-hover-dark btn-custom">Save changes</button>
              </div>
            </div>
        </form>
    </div>
  </div>
