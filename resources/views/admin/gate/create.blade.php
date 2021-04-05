<div class="modal fade tambahgate_" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size: 16px !important;"><i class="fa fa-plus-square"></i> <b>Tambah Data Gate</b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("gate_/store")}}">
            {{csrf_field()}} 
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control fonts" name="project_id" id="project_id" value="{{Auth::user()->project_id}}" type="hidden"/>
                    <input class="form-control fonts" value="{{Auth::user()->project->nama}}" readonly/>
                    <div id="div1"></div>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                <div class="col-md-8 col-sm-8">
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
