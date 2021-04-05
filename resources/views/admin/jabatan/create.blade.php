<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square" style="color: blue"></i> Tambah Data Divisi</h5>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form role="form" name="formdata" method="post" action="{{url("jabatan_/store")}}">
            {{csrf_field()}}
        <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control fonts" data-validate-length-range="6" data-validate-words="2" name="nama" id="nama" required="required" placeholder="Masukkan Nama Divisi"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Project<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="select2_single form-control" tabindex="-1" id="divisi_id" name="divisi_id" style="font-size: 13px;">
                        <option selected disabled>Pilih Divisi</option>
                        @foreach ($divisi as $divisi)
                            <option value="{{$divisi->id}}">{{$divisi->nama}}</option>
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
