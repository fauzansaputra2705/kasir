
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form-masakan" method="post" class="" data-toggle="validator" enctype="multipart/form-data">

          {{ csrf_field() }} {{ method_field('POST') }}

          <input type="hidden" id="id_masakan" name="id_masakan">

          <div class="form-group">
            <label for="" class="">Nama Masakan</label>
            <div class="">
              <input type="text" id="nama_masakan" name="nama_masakan" class="form-control" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="">Harga</label>
            <div class="">
              <input type="number" id="harga" name="harga" class="form-control" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>


          <div class="form-group">
            <label for="photo" class="">Status Masakan</label>
            <div class="">
              <select name="status_masakan" class="form-control">
                <option value="">@php $status = "<div id='status_masakan'></div>"; echo $status; @endphp</option>
                <option value="ada">Ada</option>
                <option value="kosong">Kosong</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>