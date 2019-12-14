
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

        <form id="form-masakan" method="post" action="{{ url('/waiter/order') }}" class="" data-toggle="validator" enctype="multipart/form-data">

          {{ csrf_field() }} {{ method_field('POST') }}

          <input type="hidden" id="id_order" name="id_order">

          <div class="form-group">
            <label for="" class="">No Meja</label>
            <div class="">
              <input type="number" name="no_meja" value="" id="no_meja" disabled class="form-control" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          

          {{-- <div class="form-group">
            <label for="" class="">Tanggal</label>
            <div class="">
              <input type="date" id="tanggal" value="" name="tanggal" class="form-control" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div> --}}

          <div class="form-group">
            <label for="" class="">ID User</label>
            <div class="">
              <input type="number" disabled value="" name="id_user"  id="id_user" class="form-control">
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="">Keterangan</label>
            <div class="">
              <input type="text" name="keterangan" id="keterangan" class="form-control" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="">Status Order</label>
            <div class="">
              <select name="status_order" class="form-control">
                <option value="">@php $status = "<div id='status_order'></div>"; echo $status; @endphp</option>
                <option value="proses">Di Proses</option>
                <option value="batal">Di Batalkan</option>
                <option value="tunda">Di Tunda</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>