@extends('template.header')
@section('content')

{{-- TAB START --}}

<div class="right_col" role="main">
    <div class="x_panel">
      <div class="x_content">
        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="divisi-tab" data-toggle="tab" href="#divisi" role="tab" aria-controls="divisi" aria-selected="true">Divisi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="jabatan-tab" data-toggle="tab" href="#jabatan" role="tab" aria-controls="jabatan" aria-selected="false">Posisi</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="divisi" role="tabpanel" aria-labelledby="divisi-tab">
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
          
            {{-- TAB DIVISI START --}}
        <div class="x_title">
            <h2><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-top: 2px;" id="tambahdivisi"><i class="fa fa-plus"></i> Tambah Divisi</button></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
        <div class="clearfix"></div>
        </div>

  <div class="x_content">
    <div class="row">
        <div class="col-sm-12">
        <div class="card-box table-responsive" style="overflow-x: unset!important;">
      <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Divisi</th>
            <th>Project</th>
            <th>Created at</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <tbody>
              @foreach ($divisi as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->divisi_project->nama}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>
                    <center>
                        <a href="{{route('editdivisi',$item->id)}}" class="btn btn-round btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
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

<div class="modal fade bs-example-modal-divisi" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-divisi">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2" style="font-size: 16px;">Konfirmasi Hapus Data Divisi </h5>
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

@include('superadmin.divisi.create')

@push('script')
<script type="text/javascript">
    $('#data-table').DataTable();
    // console.log("hallo");
    $(function(){
var mainTable = $('#data-table').DataTable();
var selectedRow;

$('#data-table').on('click', '.delete', function (e) {
e.preventDefault();
selectedRow = mainTable.row( $(this).parents('tr') );

$("#modal-konfirmasi").modal('show');

$("#modal-konfirmasi").find("#confirm-delete").data("id", $(this).data('id'));
$("#konfirmasi-body").text("Hapus Data ?");
});

$('#confirm-delete').click(function(){
  var deleteButton = $(this);
  var id          = deleteButton.data("id");

  deleteButton.button('loading');

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax(
  {
    url: "divisi/"+id,
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
});
</script>
@endpush
            {{-- TAB DIVISI END  --}}
          </div>

          <div class="tab-pane fade" id="jabatan" role="tabpanel" aria-labelledby="jabatan-tab">

           {{-- TAB JABATAN START  --}}

           <div class="x_title">
               <h2><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-createjabatan-modal-lg" style="margin-top: 2px;" id="tambahjabatan"><i class="fa fa-plus"></i> Tambah Posisi</button></h2>
               <ul class="nav navbar-right panel_toolbox">
                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   </li>
                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                   </li>
               </ul>
           <div class="clearfix"></div>
           </div>

           <div class="x_content">
               <div class="row">
                   <div class="col-sm-12">
                   <div class="card-box table-responsive" style="overflow-x: unset!important;">
               <table id="data-table-jabatan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
               <thead>
                <tr>
                    <th>No</th>
                    <th>Divisi</th>
                    <th>Project</th>
                    <th>Posisi</th>
                    <th>Created at</th>
                    <th>Aksi</th>
                </tr>
               </thead>
               <tbody>
                   @foreach ($jabatan as $item)
                       <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$item->divisi_jabatan->nama}}</td>
                           <td>{{$item->divisi_jabatan->divisi_project->nama}}</td>
                           <td>{{$item->nama}}</td>
                           <td>{{$item->created_at}}</td>
                           <td>
                               <center>
                                   {{--   <a href="{{route('editdivisi',$item->id)}}" class="btn btn-round btn-info"><span class="glyphicon glyphicon-pencil"></span></a> --}}
                                   <a href="{{route('editjabatan',$item->id)}}" class="btn btn-round btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                   <button class="btn btn-round btn-danger delete-jabatan" data-id="{{$item->id}}"><span class="glyphicon glyphicon-trash"></span></button>
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


{{-- <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="konfirmasi-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-id="" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..." id="confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade bs-example-modal-jabatan" id="modal-konfirmasi-jabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-jabatan">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel2" style="font-size: 16px;">Konfirmasi Hapus Data Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="konfirmasi-body-jabatan"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" data-id="" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Deleting..." id="confirm-delete-jabatan">Delete</button>
        </div>
      </div>
    </div>
</div>

@include('superadmin.divisi.create-jabatan')

@push('script')
<script type="text/javascript">
    $('#data-table-jabatan').DataTable();
    // console.log("hallo");
    $(function(){
var mainTable = $('#data-table-jabatan').DataTable();
var selectedRow;

$('#data-table-jabatan').on('click', '.delete-jabatan', function (e) {
e.preventDefault();
selectedRow = mainTable.row( $(this).parents('tr') );

$("#modal-konfirmasi-jabatan").modal('show');

$("#modal-konfirmasi-jabatan").find("#confirm-delete-jabatan").data("id", $(this).data('id'));
$("#konfirmasi-body-jabatan").text("Hapus Data ?");
});

$('#confirm-delete-jabatan').click(function(){
  var deleteButton = $(this);
  var id          = deleteButton.data("id");

  deleteButton.button('loading');

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax(
  {
    url: "jabatan/"+id,
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

      $("#modal-konfirmasi-jabatan").modal('hide');

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
});
</script>
@endpush

            {{-- TAB JABATAN END  --}}
          </div>

</div>
</div>
</div>
</div>

{{-- TAB END  --}}

@endsection

