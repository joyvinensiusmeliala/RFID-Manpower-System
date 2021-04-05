<div class="modal fade tambahgate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size: 16px !important;"><i class="fa fa-plus-square"></i> <b>Tambah Data Gate</b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("gate/store")}}">
            {{csrf_field()}} 
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2_single form-control" tabindex="-1" id="project_id" name="project_id" style="font-size: 13px">
                        <option selected disabled>Pilih Project</option>
                        @foreach ($project as $projects)
                            <option value="{{$projects->id}}">{{$projects->nama}}</option>
                        @endforeach
                    </select>
                    <div id="div1"></div>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" name="gate" id="gate" required="required" placeholder="Masukkan Gate"/>
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
