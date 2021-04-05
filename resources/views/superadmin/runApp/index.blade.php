<?php 
  use App\Gate;
  use Carbon\Carbon as Carbon;
?>
@extends('template.header')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          {{-- <h3 style="font-size: 13px">Report Manhours</h3> --}}
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              {{-- <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span> --}}
            </div>
          </div>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="bs-glyphicons">
                    <ul class="bs-glyphicons-list">
                        <li><a href="">
                                <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                                <span class="glyphicon-class">Run Electron Apps C#</span>
                            </a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                            <span class="glyphicon-class">Run MQTT Log Manhours</span>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>
                            <span class="glyphicon-class">Run MQTT Register RFID Tag</span>
                        </li>
                      
                    </ul>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
    //   $(function(){
    //     $('#report_manhours_').DataTable();
    //   });
    </script>

@endpush

