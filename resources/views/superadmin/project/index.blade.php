@extends('template.header')
@section('content')
    <div class="right_col" role="main">
        <div class="">
        <div class="clearfix"></div>
            <div class="row">
                 <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-top: 2px;" id="tambahproject"><i class="fa fa-plus"></i> Tambah Project</button>
                            
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            
                        <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
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
                            <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Project</th>
                                <th>Lokasi</th>
                                <th>Created at</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($project as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->lokasi}}</td>
                                        <td>{{ date('d M Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <center>
                                                {{-- <a href="{{route('editproject',$item->id)}}" class="btn btn-round btn-info"><span class="glyphicon glyphicon-pencil"></span></a> --}}
                                                <a href="" id="editProject" data-toggle="modal" class="btn btn-round btn-info" data-target='#project_modal' data-id="{{ $item->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <button class="btn btn-round btn-danger delete" data-id="{{$item->id}}"><span class="glyphicon glyphicon-trash"></span></button></td>
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
    <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel2" style="font-size: 16px;">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    {{-- <h4 class="modal-title" id="myModalLabel"></h4> --}}
                </div>
                <div class="modal-body" id="konfirmasi-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-id="" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..." id="confirm-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    @include('superadmin.project.create')
    @include('superadmin.project.edit')
    
@endsection

@push('script')
    <script type="text/javascript">
        $('#data-table').DataTable();
        // console.log("hallo");
        $(function(){
            var mainTable = $('#data-table').DataTable();
            var selectedRow;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#data-table').on('click', '.delete', function (e) {
                e.preventDefault();
                selectedRow = mainTable.row( $(this).parents('tr') );

                $("#modal-konfirmasi").modal('show');

                $("#modal-konfirmasi").find("#confirm-delete").data("id", $(this).data('id'));
                $("#konfirmasi-body").text("Apakah yakin ingin menghapus data?");
            });

            $('#confirm-delete').click(function(){
                var deleteButton = $(this);
                var id          = deleteButton.data("id");

                deleteButton.button('loading');

                $.ajax(
                {
                    url: "project/"+id,
                    type: 'POST',
                    dataType: "JSON",
                    data: {
                    // _method:"DELETE"
                    // "id": id
                    },
                    success: function (response)
                    {
                    deleteButton.button('reset');

                    selectedRow.remove().draw();

                    $("#modal-konfirmasi").modal('hide');

                    Swal.fire({
                        title: response.success,
                        // text: response.success,
                        type: 'success',
                        confirmButtonText: 'Close',
                        confirmButtonColor: '#AAA',
                        onClose: function(){
                        
                        }
                    })
                    },
                    error: function(xhr) {
                    console.log(xhr.responseText);
                    }
                });
            });

            // edit data project 
            $('#data-table').on('click', '#editProject', function(e){
                e.preventDefault();

                var id = $(this).data('id');
                console.log("id>>>", id);

                $.get('project/'+id , function(data){
                    $('editBtn').val("edit-project");
                    $('project_modal').modal('show');
                    $('#id').val(data.data.id);
                    // console.log(data.data.nama);
                    $('#edit_nama').val(data.data.nama);
                    $('#edit_lokasi').val(data.data.lokasi);
                })
            });

            $('#editBtn').click(function(e){
                e.preventDefault();
                var id = $("#id").val();
                var edit_nama =  $("#edit_nama").val();
                var edit_lokasi = $("#edit_lokasi").val();

                console.log("ids>>>", id);
                console.log("edit_nama>>>", nama);
                console.log("edit_lokasi>>>", lokasi);

                $.ajax({
                    url:"project/update/"+id,
                    type: "POST",
                    data: {
                        id : id,
                        edit_nama : edit_nama,
                        edit_lokasi : edit_lokasi,
                    },
                    dataType: 'json',
                    success: function (data){
                        $('#projectForm').trigger("reset");
                        $('#project_modal').modal('hide');
                        window.location.reload(true);
                    }, 
                    error: function (data){
                        console.log('Error:', data);
                        $('#editBtn').html('Update Changes');
                    }
                });
            })

            });
    </script>
@endpush

