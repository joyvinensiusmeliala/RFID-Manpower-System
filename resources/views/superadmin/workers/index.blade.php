@extends('template.header')
@section('content')
    <div class="right_col" role="main">
        <div class="">
        <div class="clearfix"></div>
            <div class="row">
                 <div class="col-xs-12 col-xl-12 col-lg-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".tambahworkers" style="margin-top: 2px;" id="tambahworkers"><i class="fa fa-plus"></i> Tambah Workers</button>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{-- Session for notification --}}
                                @if(session()->get('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>SUKSES !</strong> {{ session()->get('success') }}
                                    </div>

                                @elseif(session()->get('failed'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>GAGAL !</strong> {{ session()->get('failed') }}
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-sm-12">
                                <div class="card-box table-responsive" style="overflow-x: unset!important;">
                            <table id="table-worker" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Project</th>
                                <th>Divisi</th>
                                <th>Posisi</th>
                                <th>Gate</th>
                                <th>Foto</th>
                                <th>ID RFID</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($workers as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->project_workers->nama}}</td>
                                        <td>{{$item->divisi_workers->nama}}</td>
                                        <td>{{$item->jabatan_workers->nama}}</td>
                                        <td>{{$item->gate_workers->gate}}</td>
                                        <td><img src="{{ asset('uploads/workers/')."/".$item->foto}}" style="height: 50px;width: 50px;"></td>
                                        <td>{{$item->id_rfid}}</td>
                                        <td>
                                            <center>
                                                <a href="{{route('editworkers',$item->id)}}" class="btn btn-round btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <button class="btn btn-round btn-danger delete" data-id="{{$item->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade bs-example-modal-sm" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel2" style="font-size: 16px;">Konfirmasi Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body" id="konfirmasi-body"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" data-id="" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..." id="confirm-delete">Delete</button>
            </div>
          </div>
        </div>
    </div>

    @include('superadmin.workers.create')

    
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>    

    <script type="text/javascript">
    
    $(function(){
        var workers = $('#table-worker').DataTable();  
        var selectedWorkers;

        $('#table-worker').on('click', '.delete', function (e) {
            e.preventDefault();
            selectedWorkers = workers.row( $(this).parents('tr') );

            $("#modal-konfirmasi").modal('show');

            $("#modal-konfirmasi").find("#confirm-delete").data("id", $(this).data('id'));
            $("#konfirmasi-body").text("Apakah yakin ingin menghapus data?");
        });

    $('#confirm-delete').click(function(){
        var deleteButton = $(this);
        var id_workers   = deleteButton.data("id");

        deleteButton.button('loading');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "workers/"+id_workers,
            type: 'POST',
            dataType: "JSON",
            data: {
            },
            success: function (response)
            {
            // deleteButton.button('reset');
            // selectedWorkers.remove().draw();
    
            $("#modal-konfirmasi").modal('hide');

            Swal.fire({
                title: response.success,
                type: 'success',
                confirmButtonText: 'Close',
                confirmButtonColor: '#AAA',
                onClose: function(){
                }
            })
            $('#table-workers').DataTable().destroy();
            location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
    
@endpush

