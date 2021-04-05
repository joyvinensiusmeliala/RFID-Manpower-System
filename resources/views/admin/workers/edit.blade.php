@extends('template.header')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="font-size: 15px;"><i class="fa fa-edit"></i> Form Edit Workers</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" name="formdata" enctype="multipart/form-data" method="post" action="{{route('updateworkers_', $workers->id)}}" >
                            @method('PATCH') 
                            {{csrf_field()}}

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">NIK<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="nik" id="nik" required="required" value="{{$workers->nik}}"/>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="nama" id="nama" required="required" value="{{$workers->nama}}"/>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2 form-control" tabindex="-1" id="jenis_kelamin" name="jenis_kelamin" style="font-size: 13px;width:100%;">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option {{$workers->jenis_kelamin == "Pria" ? 'selected' : '' }} value="{{$workers->jenis_kelamin}}">Pria</option>
                                        <option {{$workers->jenis_kelamin == "Wanita" ? 'selected' : '' }} value="{{$workers->jenis_kelamin}}">Wanita</option>
                                    </select>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="form-control fonts" name="alamat" id="alamat" required="required"> {{$workers->alamat}} </textarea>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="email" id="email" required="required" value="{{$workers->email}}"/>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="handphone" id="handphone" required="required" value="{{$workers->handphone}}" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
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
                                    <select class="select2 form-control" tabindex="-1" id="divisi_id" name="divisi_id" style="font-size: 13px;width:100%;" onchange="getJabatan()">
                                        <option selected disabled>Pilih Divisi</option>
                                        @foreach ($divisi as $item)
                                            <option {{$item->id == $workers->divisi_id ? 'selected': ''}} value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6" id="class_posisi" style="display: block;">
                                    <input type="hidden" class="form-control" name="posisi_id" value="{{$workers->jabatan_id}}" style="font-size: 13px;background-color: #ffffff !important;" readonly/>
                                    <input type="text" class="form-control" id="posisi_id" value="{{$workers->jabatan_workers->nama}}" style="font-size: 13px;background-color: #ffffff !important;" readonly/>
                                </div>
                                <div class="col-md-6 col-sm-6" id="class_posisi2" style="display: none;">
                                    <select class="select2 form-control" tabindex="-1" id="id_posisi" name="posisi_id" style="font-size: 13px;width:100%;" onchange="getGate()">
                                        <option selected disabled>Pilih Posisi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2 form-control" tabindex="-1" id="gate_id" name="gate_id" style="font-size: 13px;width:100%;">
                                        <option selected disabled>Pilih Gate</option>
                                        @foreach ($gate as $item)
                                            <option {{$item->id == $workers->gate_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->gate}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Bergabung<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_bergabung" id="tgl_bergabung" class="date-picker form-control fonts" type="date" required="required" value="{{$workers->tgl_bergabung}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Keluar<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_keluar" id="tgl_keluar" class="date-picker form-control fonts" type="date" value="{{$workers->tgl_keluar}}">
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2 form-control" tabindex="-1" id="status" name="status" style="font-size: 13px;width:100%;">
                                        <option selected disabled>Pilih Status</option>
                                        <option {{$workers->status == 1 ? 'selected' : ''}} value="{{$workers->status}}">Aktif</option>
                                        <option {{$workers->status == 2 ? 'selected' : ''}} value="{{$workers->status}}">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="form-control fonts" name="keterangan" id="keterangan">{{$workers->keterangan}}</textarea>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Upload Foto<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    @if($workers->foto != null)
                                        <img src="{{ asset('uploads/workers/')."/".$workers->foto}}" id="emp_foto" name="emp_foto" alt="Foto Workers" class="img-circle profile_img" style="width: 20% !important;">
                                    @else
                                        <img src="{{ asset('AdminLTE/production/images/user.png')}}" id="emp_foto" name="emp_foto" alt="Foto Workers" class="img-circle profile_img" style="width: 20% !important;">
                                    @endif
                                    <div style="padding-bottom:10px">
                                    </div>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">ID RFID<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2 form-control" tabindex="-1" id="id_rfid" name="id_rfid" style="font-size: 13px;width:100%;">
                                        <option selected disabled>Pilih ID RFID</option>
                                        @foreach ($rfid as $rfids)
                                            <option {{$workers->id_rfid == $rfids->uid ? 'selected' : ''}} value="{{$rfids->uid}}">{{$rfids->uid}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('workers_')}}" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
        document.getElementById("class_posisi").style.display = "none";
        document.getElementById("class_posisi2").style.display = "block";
        
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
                    $("#id_posisi").empty();
                    $("#id_posisi").append('<option selected disabled>Pilih Posisi</option>');
                    $.each(data,function(placement,row){
                        console.log("posisi>>>", row.nama);
                            $("#id_posisi").append('<option value="'+row.id+'">'+row.nama+'</option>');
                        });
                    }
                });
            }
    }

</script>

@endpush