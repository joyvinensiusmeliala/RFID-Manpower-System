@extends('template.header')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i> Form Edit User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" name="formdata" method="post" action="{{route('updateusers',$users->id)}}">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" data-validate-length-range="6" data-validate-words="2" name="username" id="username" required="required" value="{{$users->username}}"/>
                                </div>
                            </div>
                            {{-- <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password Lama<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="password" name="password_lama" value="{{$users->password}}" readonly/>
                                </div>
                            </div> --}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password Baru<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="hidden" name="password_lama" value="{{$users->password}}" readonly/>
                                    <input class="form-control fonts" type="password" id="password1" name="password_baru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" placeholder="*Hanya diisi jika ingin mengubah password*"/>
                                    <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                        <i id="slash" class="fa fa-eye-slash"></i>
                                        <i id="eye" class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="email" required="required" type="email" value="{{$users->email}}" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2_single form-control" tabindex="-1" id="project_id" name="project_id" style="font-size: 13px;">
                                        <option selected disabled>Pilih Project</option>
                                        @foreach ($project as $projects)
                                            <option {{$users->project_id == $projects->id ? 'selected' : ''}} value="{{$projects->id}}">{{$projects->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Role <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2_single form-control" tabindex="-1" id="role_id" name="role_id" style="font-size: 13px;">
                                            <option selected disabled>Pilih Role</option>
                                            @foreach ($role as $roles)
                                                <option {{$users->role_id == $roles->id ? 'selected' : ''}} value="{{$roles->id}}">{{$roles->nama}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('users')}}" class="btn btn-danger">Batal</a>
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

<script type="text/javascript">

    function hideshow(){
        var password = document.getElementById("password1");
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
