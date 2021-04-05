<div class="modal fade bs-example-modal-lg" id="gate_modal_" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-size:16px !important;"><i class="fa fa-edit"></i> <b> Form Edit Gate </b></h5>
        </div>
        <form role="form" id="projectForm">
            <div class="modal-body">
                <div class="field item form-group">
                    {{-- <label class="col-form-label col-md-3 col-sm-3  label-align">Id<span class="required">*</span></label> --}}
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control fonts" name="id" id="id" value="" type="hidden"/>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control fonts" name="edit_project_id" id="edit_project_id" value="{{Auth::user()->project->nama}}" readonly/>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Gate<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control fonts" type="text" id="edit_gate" name="edit_gate" required="required" value=""/>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editGateBtn" value="Submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>


