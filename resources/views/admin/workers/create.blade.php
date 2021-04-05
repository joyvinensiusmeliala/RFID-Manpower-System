<div class="modal fade tambahworkers_" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size: 16px !important;"><i class="fa fa-plus-square"></i><b> Tambah Data Workers </b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" enctype="multipart/form-data" method="post" action="{{url("workers_/store")}}">
            {{csrf_field()}}
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">NIK<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control fonts" placeholder="ex: (PRO) 01234567891" maxlength="16" name="nik" id="nik" required="required"/>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control fonts" placeholder="Nama lengkap" name="nama" id="nama" required="required"/>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="jenis_kelamin" name="jenis_kelamin" style="font-size: 13px;width: 100%;">
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control fonts" name="alamat" id="alamat" required></textarea>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="email" class="form-control fonts" placeholder="ex: a@domain.com" name="email" id="email" required="required"/>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control fonts" id="no_hp" name="no_hp" placeholder="ex: 08123xxxxx" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="hidden" class="form-control fonts" name="project_id" id="project_id" value="{{Auth::user()->project_id}}"/>
                    <input type="text" class="form-control fonts" value="{{Auth::user()->project->nama}}" readonly/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Divisi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="divisi_id" name="divisi_id" style="font-size:13px;width: 100%;" onchange="getJabatan()">
                        <option selected disabled>Pilih Divisi</option>
                        @foreach ($divisi as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="jabatan_id" name="jabatan_id" style="font-size:13px;width:100%;">
                        <option selected disabled>Pilih Posisi</option>
                    </select>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="gate_id" name="gate_id" style="font-size:13px;width: 100%;" >
                        <option selected disabled>Pilih Gate</option>
                        @foreach ($gate as $item)
                            <option value="{{$item->id}}">{{$item->gate}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Bergabung<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="tgl_bergabung" id="tgl_bergabung" class="date-picker form-control fonts" type="date">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Keluar<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="tgl_keluar" id="tgl_keluar" class="date-picker form-control fonts" type="date">
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="status" name="status" style="font-size: 13px;width: 100%;">
                        <option selected disabled>Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control fonts" name="keterangan" id="keterangan"></textarea>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Upload Foto<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('AdminLTE/production/images/user.png')}}" id="emp_foto" name="emp_foto" alt="Foto Workers" class="img-circle profile_img" style="width: 20% !important;">
                    <div style="padding-bottom:10px">
                    </div>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">ID RFID<span class="required"></span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2 form-control" tabindex="-1" id="id_rfid" name="id_rfid" style="font-size: 13px;width:100%;">
                        <option selected disabled>Pilih ID RFID</option>
                        @foreach ($rfid as $rfids)
                            <option value="{{$rfids->uid}}">{{$rfids->uid}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@push('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

  <script type="text/javascript">
    $('.select2').select2();
    $(document).ready(function(){
        $('#foto').change(function(){
            preview_foto(this);
        });

});
    function timeFunctionLong(input) {
        setTimeout(function() {
            input.type = 'text';
        }, 60000);
    }

function preview_foto(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#emp_foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

    // Get Jabatan
    function getJabatan(){
        var divisi_id = $("#divisi_id").val();
        console.log("divisi_id>>", divisi_id);

        if(divisi_id == -1){
            alert('Pilih Divisi');
        }
        else{
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
            $.ajax({
                type: "POST",
                url: "{{url('get-jabatan_/store')}}",
                data:{"divisi_id" : divisi_id},
                success: function(data){
                    console.log(data);
                    $("#jabatan_id").empty();
                    $("#jabatan_id").append('<option selected disabled>Pilih Posisi</option>');
                    $.each(data,function(placement,row){
                            $("#jabatan_id").append('<option value="'+row.id+'">'+row.nama+'</option>');
                        });
                    }
                });
            }
    }
</script>
@endpush
