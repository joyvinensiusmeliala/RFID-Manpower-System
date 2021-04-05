<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size:16px !important;"><i class="fa fa-plus-square"></i> <b>Tambah Data Project</b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("project/store")}}">
            {{csrf_field()}}
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" name="nama" id="nama" required="required" placeholder="Masukkan nama project"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Lokasi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" type="text" id="lokasi" name="lokasi" required="required" placeholder="Masukkan lokasi project"/>
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
