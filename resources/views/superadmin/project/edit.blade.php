<div class="modal fade bs-example-modal-lg" id="project_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-size:16px !important;"><i class="fa fa-edit"></i> <b> Form Edit Project </b></h5>
        </div>
        <form role="form" id="projectForm">
            <div class="modal-body">
                <div class="field item form-group">
                    {{-- <label class="col-form-label col-md-3 col-sm-3  label-align">Id<span class="required">*</span></label> --}}
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control fonts" name="id" id="id" value="" type="hidden"/>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control fonts" name="edit_nama" id="edit_nama" value=""/>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Lokasi<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control fonts" type="text" id="edit_lokasi" name="edit_lokasi" required="required" value=""/>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editBtn" value="Submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>


