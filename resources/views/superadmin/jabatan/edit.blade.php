@extends('template.header')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i> Form Edit Data Jabatan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" name="formdata" method="post" action="{{route('updatejabatan',$jabatan->id)}}">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="nama" id="nama" required="required" value="{{$jabatan->nama}}"/>
                                    {{-- <input class="form-control fonts" data-validate-length-range="6" data-validate-words="2" name="nama" id="nama" required="required" placeholder="Masukkan Nama Divisi"/> --}}
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Divisi <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2_single form-control" tabindex="-1" id="divisi_id" name="divisi_id" style="font-size: 13px;">
                                            <option selected disabled>Pilih Divisi</option>
                                            @foreach ($divisi as $p)
                                                <option {{$jabatan->divisi_id == $p->id ? 'selected' : ''}} value="{{$p->id}}">{{$p->nama}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('jabatan_divisi')}}" class="btn btn-danger">Batal</a>
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
