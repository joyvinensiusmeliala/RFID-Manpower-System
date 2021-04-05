<div class="modal fade tambahgate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel" style="font-size: 16px !important;"><i class="fa fa-plus-square"></i> <b>Tambah Data Gate</b></h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("rfid/store")}}">
            {{csrf_field()}} 
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" name="uid" id="uid" required="required" placeholder="Masukkan Nama"/>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">NIK<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" name="nik" id="nik" required="required" placeholder="Masukkan NIK"/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>