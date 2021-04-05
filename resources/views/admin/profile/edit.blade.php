@extends('template.header')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="font-size: 15px;"><i class="fa fa-edit"></i> Ubah Password</h2>
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

                        <form role="form" name="formdata" enctype="multipart/form-data" method="post" action="{{route('updateprofile_', $users->uid)}}" >
                            @method('PATCH') 
                            {{csrf_field()}}

                            {{-- <div class="field item form-group">
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
                             --}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control fonts" name="username" id="username" required="required" value="{{$users->username}}" readonly/>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" type="password" id="password" name="password" value="{{$users->password}}" readonly/>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">New Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" type="password" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" required="required" title="Minimal 8 Karakter termasuk huruf besar dan huruf kecil, angka dan karaker unik" placeholder="Masukkan password baru"/>
                                    <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                        <i id="slash" class="fa fa-eye-slash"></i>
                                        <i id="eye" class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="email" id="email" required="required" value="{{$users->email}}"/>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-secondary">Simpan</button>
                                        {{-- <a href="{{url('profile_')}}/{{Auth::user()->id}}" class="btn btn-danger">Batal</a> --}}
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

function hideshow(){
        var password = document.getElementById("new_password");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }
    }

</script>

@endpush