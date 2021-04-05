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
              <ul class="nav navbar-right panel_toolbox">
                <li>Reporting date: {{ date('d M Y', strtotime(Carbon::now())) }}</li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects" id="report_manhours_">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>RFID Tag Id</th>
                    <th>Nama </th>
                    <th>NIK</th>
                    <th>Gate</th>
                    <th>Clock In</th>
                    <th>Clock Out</th>
                    <th>Total Manhours</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($manhours as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->rfid_tag_id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nik}}</td>
                            <td>
                                <?php 
                                    $gates = Gate::where('id', $item->gate_id)->select('gate')->first();
                                    echo $gates->gate;
                                ?>
                            </td>
                            <td>
                                {{ date('H:i:s', strtotime($item->start_time)) }}
                            </td>
                            <td>
                                {{ date('H:i:s', strtotime($item->end_time)) }}
                            </td>

                            <td>
                                <?php 
                                    $man_hourss = date('H', strtotime($item->total_manhours));
                                    $hour = date('H', strtotime($item->total_manhours));
                                    $minutes = date('i', strtotime($item->total_manhours));
                                    $total = ($man_hourss/10)*100;  
                                ?>
                                <div class="progress progress_sm">
                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $total?>"></div>
                                </div>
                                <small>Total : 
                                  <?php
                                    echo $item->total_manhours;
                                  ?>
                                </small>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- end project list -->

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
      $(function(){
        $('#report_manhours_').DataTable();
      });
      function autoRefreshPage()
        {
            window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 10000);
    </script>
    {{-- </script> --}}

@endpush

