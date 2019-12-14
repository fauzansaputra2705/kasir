

<div class="main-content">

    <section class="section">
      <div class="section-header">
        <h1>Masakan</h1>
    </div>
</section>

<a onclick="tambah()" class="btn btn-primary text-white mb-3"><i class="fas fa-plus text-white"></i> Tambah </a>
<table id="masakan" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Masakan</th>
            <th>Harga</th>
            <th>Status Makanan</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    </tbody>

    <tfoot>
    </tfoot>
</table>
</div>

@include('admin.form')

@section('addscript')
<script>    
    var table = $('#masakan').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('json_masakan') }}',
            columns: [
            { data: 'id_masakan', name: 'id_masakan' },
            { data: 'nama_masakan', name: 'nama_masakan' },
            { data: 'harga', name: 'harga' },
            { data: 'status_masakan', name: 'status_masakan' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

      function tambah() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('#modal-title').text('Tambah Masakan');
      }

      function edit(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('/admin/masakan') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('#modal-title').text('Edit Masakan');

            $('#id_masakan').val(data.id_masakan);
            $('#nama_masakan').val(data.nama_masakan);
            $('#harga').val(data.harga);
            $('#status_masakan').html(data.status_masakan);
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
                  url : "{{ url('/admin/masakan') }}" + '/' + id,
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
                    var id = $('#id_masakan').val();
                    if (save_method == 'add') url = "{{ url('/admin/masakan') }}";
                    else url = "{{ url('/admin/masakan') . '/' }}" + id;

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