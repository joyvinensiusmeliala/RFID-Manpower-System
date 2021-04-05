<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size: 16px !important;"><i class="fa fa-plus-square"></i><b> Tambah Data User </b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("users/store")}}">
            {{csrf_field()}}
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" data-validate-length-range="6" data-validate-words="2" name="username" id="username" required="required" placeholder="Masukkan username"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" required="required" title="Minimal 8 Karakter termasuk huruf besar dan huruf kecil, angka dan karaker unik" placeholder="Masukkan password"/>
                    <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                        <i id="slash" class="fa fa-eye-slash"></i>
                        <i id="eye" class="fa fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" name="email" required="required" type="email" placeholder="ex: emails@domain.com"/></div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2_single form-control" tabindex="-1" id="project_id" name="project_id" style="font-size: 13px;">
                        <option selected disabled>Pilih Project</option>
                        @foreach ($project as $projects)
                            <option value="{{$projects->id}}">{{$projects->nama}}</option>
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
                                <option value="{{$roles->id}}">{{$roles->nama}}</option>
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
