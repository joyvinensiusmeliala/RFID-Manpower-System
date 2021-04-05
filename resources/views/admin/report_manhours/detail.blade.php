<?php 
  use App\Gate;
?>
@extends('template.header')
@section('content')
    <div class="right_col" role="main">
        <div class="">
        <div class="clearfix"></div>
            <div class="row">
                 <div class="col-xs-12 col-xl-12 col-lg-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <span style="color: #73879c;font-size: 14px;"><b><i class="fa fa-bar-chart"></i> Detail Report Manhours</b></span>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{-- Session for notification --}}
                                @if(session()->get('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>SUKSES !</strong> {{ session()->get('success') }}
                                    </div>

                                @elseif(session()->get('failed'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>GAGAL !</strong> {{ session()->get('failed') }}
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-sm-12">
                                <div class="card-box table-responsive" style="overflow-x: unset!important;">
                                <style type="text/css">
                                    .left    { text-align: left;}
                                    .right   { text-align: right;}
                                    .center  { text-align: center;}
                                    .justify { text-align: justify;}
                                </style>
                                <form  action="{{route('search')}}" method ="POST">
                                     @csrf
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="container-fluid">
                                                <div class="form-group row">
                                                    <!-- <label for="date" class="col-form-label col-sm-2">Date Of Birth From</label> -->
                                                    <div class="col-sm-3">
                                                    @foreach ($detail as $item)
                                                        <input type="hidden" class="form-control input-sm" id="rfid_tag_id" name="rfid_tag_id" value="{{$item->rfid_tag_id}}" required/>
                                                    @endforeach
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                                    </div>
                                                    <label for="date" class="col-form-label col-sm-0">TO</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/android/24/000000/search.png"/></button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            <table id="detail_report" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 40%">RFID Tag</th>
                            <th style="width: 40%">NIK</th>
                            <th style="width: 40%">Nama Karyawan</th>
                            <th style="width: 40%">Tanggal Kerja</th>
                            <th style="width: 5%">Gate</th>
                            <th style="width: 40%">Clock In</th>
                            <th style="width: 40%">Clock Out</th>
                            <th style="width: 40%">Total Manhours</th>
                            <th style="width: 40%">Report 1 Day</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($detail as $item)
                              
                            <tr>
                            
                            <!-- Dropdown Table in Table  -->
                            
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->rfid_tag_id}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{ date('d M Y', strtotime($item->start_time)) }}</td>
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
                            </td>
                           
                          <td> 
                                <!-- <center><a href="{{route('detail_report_',$item->rfid_tag_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i><span style="font-size: 12px;"> Detail</span></a></center> -->
                                <div class="row">
                                <div class="col-sm-12">
                                <div class="card-box table-responsive" style="overflow-x: unset!important;">
                                
                            <table id="detail_report" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <!-- <th style="width: 1%">#</th> -->
                            <!-- <th style="width: 10%">RFID Tag</th> -->
                            <!-- <th style="width: 10%">NIK</th> -->
                            <th style="width: 10%" background: transparent;>Nama Karyawan</th>
                            <th style="width: 10%">Tanggal Kerja</th>
                            <th style="width: 50%">Gate</th>
                            <th>Clock In</th>
                            <th style="width: 50%">Clock Out</th>
                            <th style="width: 50%">Total Manhours</th>
                            <!-- <th style="width: 10%">Report 1 Days</th> -->
                                
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($detail_report as $item_report)

                            @if(date('d M Y', strtotime($item_report->start_time)) == date('d M Y', strtotime($item->start_time)))
                            <tr>
                            
                            <!-- Dropdown Table in Table  -->
                            
                            <!-- <td>{{$loop->iteration}}</td> -->
                            <!-- <td>{{$item_report->rfid_tag_id}}</td> -->
                            <!-- <td>{{$item_report->nik}}</td> -->
                            <td>{{$item_report->nama}}</td>
                            <td>{{ date('d M Y', strtotime($item_report->start_time)) }}</td>
                            <td>
                                <?php 
                                    $gates = Gate::where('id', $item->gate_id)->select('gate')->first();
                                    echo $gates->gate;
                                ?>
                            </td>
                            <td>
                                {{ date('H:i:s', strtotime($item_report->start_time)) }}
                            </td>
                            <td>
                                {{ date('H:i:s', strtotime($item_report->end_time)) }}
                            </td>
                            <td>
                              <?php 
                                $man_hourss = date('H', strtotime($item_report->man_hours));
                                $hour = date('H', strtotime($item_report->man_hours));
                                $minutes = date('i', strtotime($item_report->man_hours));
                                $second = date('s', strtotime($item_report->man_hours));
                                $total = ($man_hourss/10)*100;  
                              ?>
                                <div class="progress progress_sm">
                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $total?>"></div>
                                </div>
                                <small>Total :
                                  <?php 
                                      echo $item_report->man_hours;
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
                            </td>
                           
                          
                        </tr>     
                            @endif
                            
                        
                        
                    @endforeach
                            </tbody>
                        </table>
                        </div>
                          </td>
                        </tr>
                    @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
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
        $(function(){
            $('#detail_report').DataTable();  
        });
    </script>
@endpush

