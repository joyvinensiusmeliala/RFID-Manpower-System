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
          <h2>Report Manhours <small> {{Auth::user()->project->nama}} </small></h2> 
          <style type="text/css">
                .left    { text-align: left;}
                .right   { text-align: right;}
                .center  { text-align: center;}
                .justify { text-align: justify;}
              </style>
              <p class="right">Reporting date: {{ date('d M Y', strtotime(Carbon::now())) }} </p>
              <ul class="nav navbar-right panel_toolbox">
              </ul>  
              <div class="clearfix">
              </div>
            </div>
            <div class="x_content">
              <!-- start project list -->
              
              <table class="table table-striped projects" id="report_manhours">
                <thead> 
                  <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 10%">RFID Tag</th>
                    <th style="width: 1%">NIK</th>
                    <th style="width: 15%">Nama Karyawan</th>
                    <th style="width: 5%">Gate</th>
                    <!-- <th>Clock In</th>
                    <th>Clock Out</th>
                    <th>Total Manhours</th> -->
                    <th style="width: 5%">Aksi</th>
                  </tr>
                </thead>
                
                <tbody>
                
                    @foreach($manhours as $item)
                        <tr>
                        
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->rfid_tag_id}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <?php 
                                    $gates = Gate::where('id', $item->gate_id)->select('gate')->first();
                                    echo $gates->gate;
                                ?>
                            </td>
                            <!-- <td>
                                {{ date('H:i:s', strtotime($item->start_time)) }}
                            </td>
                            <td>
                                {{ date('H:i:s', strtotime($item->end_time)) }}
                            </td>
                            <td>
                              <?php 
                                $man_hourss = date('H', strtotime($item->man_hours));
                                $hour = date('H', strtotime($item->man_hours));
                                $minutes = date('i', strtotime($item->man_hours));
                                $second = date('s', strtotime($item->man_hours));
                                $total = ($man_hourss/10)*100;  
                              ?>
                                <div class="progress progress_sm">
                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $total?>"></div>
                                </div>
                                <small>Total :
                                  <?php 
                                      echo $item->man_hours;
                                      // if($hour == 00 && $minutes == 00 && $second == 00){
                                      //     echo "";
                                      //   }
                                      // elseif($hour != 00 && $minutes == 00 && $second == 00){
                                      //     echo $hour." jam";
                                      //   }
                                      // elseif($hour != 00 && $minutes != 00 && $second == 00){
                                      //     echo $hour." jam", $minutes." menit";
                                      //   }
                                      // elseif($hour != 00 && $minutes != 00 && $second != 00){
                                      //     echo $hour." jam", $minutes." menit";
                                      //   }
                                      //   else{
                                      //     echo $second." detik";
                                      //   }
                                  ?>
                                
                                </small>
                            </td> -->
                           
                          <td> 
                                <center><a href="{{route('detail_report_',$item->rfid_tag_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i><span style="font-size: 12px;"> Detail</span></a></center>
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
        $('#report_manhours').DataTable();
      });
    </script>

@endpush

