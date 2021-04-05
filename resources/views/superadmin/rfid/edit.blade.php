@extends('template.header')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i> Form Edit Rfid</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" name="formdata" method="post" action="{{route('updaterfid',$rfid->id)}}">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Rfid<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control fonts" name="rfid" id="rfid" required="required" value="{{$rfid->rfid}}"/>
                                </div>
                            </div>
                            
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">ID RFID<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="select2 form-control" tabindex="-1" id="id_rfid" name="id_rfid" style="font-size: 13px;width:100%;">
                                        <option selected disabled>Pilih ID RFID</option>
                                        @foreach ($rfid as $rfids)
                                            <option {{$rfid->id_workers == $rfids->nik ? 'selected' : ''}} value="{{$rfids->uid}}">{{$rfids->uid}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{url('rfid')}}" class="btn btn-danger">Batal</a>
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