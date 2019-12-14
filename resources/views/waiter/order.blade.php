

<div class="main-content">

    <section class="section">
      <div class="section-header">
        <h1>Order</h1>
    </div>
</section>

<a onclick="tambah()" class="btn btn-primary text-white mb-3"><i class="fas fa-plus text-white"></i> Tambah </a>
<table id="order" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NO Meja</th>
            <th>Tanggal</th>
            <th>ID User</th>
            <th>Keterangan</th>
            <th>Status Order</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    </tbody>

    <tfoot>
    </tfoot>
</table>
</div>

@include('waiter.form2')

@section('addscript')
<script>    
    var table = $('#order').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('json_order') }}',
            columns: [
            { data: 'id_order', name: 'id_order' },
            { data: 'no_meja', name: 'no_meja' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'id_user', name: 'id_user' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'status_order', name: 'status_order' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

      function tambah() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('#modal-title').text('Tambah Order');
      }

      function edit(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('/waiter/order') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('#modal-title').text('Edit Order');

            $('#id_order').val(data.id_order);
            $('#no_meja').val(data.no_meja);
            $('#tanggal').val(data.tanggal);
            $('#id_user').html(data.id_user);
            $('#keterangan').html(data.keterangan);
            $('#status_order').html(data.status_order);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      function hapus(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('/waiter/order') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '3000'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '3000'
                      })
                  }
              });
          });
        }

      $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id_order').val();
                    if (save_method == 'add') url = "{{ url('/waiter/order') }}";
                    else url = "{{ url('/waiter/order') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        // data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '3000'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '3000'
                            })
                        }
                    });
                    return false;
                }
            });
        });
</script>
@endsection