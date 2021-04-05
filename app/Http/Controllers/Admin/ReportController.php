<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Manhours;
use App\RFID;
use App\Workers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dates = date('Y-m-d', strtotime(Carbon::now()));
        $data['manhours'] = Manhours::join('workers','manhours.rfid_tag_id', '=','workers.id_rfid')
                    ->select('workers.nik', 'workers.nama', 'workers.project_id','workers.gate_id', 'workers.id_rfid', DB::raw('MIN(manhours.start_time) AS start_time'), DB::raw('MAX(manhours.end_time) AS end_time'),  DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(manhours.man_hours))) as man_hours'), 'manhours.rfid_tag_id')
                    ->where('workers.project_id', Auth::user()->project_id)
                    // ->whereDate('manhours.start_time', $dates)
                    ->groupby('manhours.rfid_tag_id')
                    ->orderBy('manhours.updated_at','desc')
                    ->get();

        return view('admin/report_manhours/index')->with($data);
    }

    

    public function detail($id){
        // $dates = date('Y-m-d', strtotime(Carbon::now()));

        $data['detail'] = Manhours::join('workers','manhours.rfid_tag_id', '=','workers.id_rfid')
                            ->select('manhours.*', 'workers.gate_id', 'workers.nik', 'workers.nama', DB::raw('MIN(manhours.start_time) AS start_time'), DB::raw('MAX(manhours.end_time) AS end_time'),  DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(manhours.man_hours))) as man_hours') )
                            ->where('manhours.rfid_tag_id', $id)
                            // ->whereDate('manhours.start_time', $dates)
                            // ->groupby('manhours.start_time')
                            ->groupBy(DB::raw('Date(start_time)'))   
                            ->orderBy('manhours.updated_at','desc')
                            // ->orderBy('manhours.start_time', 'asc')
                            ->get();

        $data['detail_report'] = Manhours::join('workers','manhours.rfid_tag_id', '=','workers.id_rfid')
                            ->select('manhours.*', 'workers.gate_id', 'workers.nik', 'workers.nama')
                            ->where('manhours.rfid_tag_id',  $id)
                            // ->where(DB::raw('Date(start_time)'))
                            // ->whereDate('manhours.start_time', $dates)
                            // ->groupby('manhours.rfid_tag_id')
                            // ->groupBy(DB::raw('Date(start_time)'))   
                            ->orderBy('manhours.updated_at','desc')
                            // ->orderBy('manhours.start_time', 'asc')
                            ->get();
                            // return $data;

        return view('admin/report_manhours/detail')->with($data);
    }

    //Fungsi Search
    public function search( Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');
        $other    = $request->input('other');
        $rfid_tag_id = $request->rfid_tag_id;

        $data['detail'] = Manhours::join('workers','manhours.rfid_tag_id', '=','workers.id_rfid')
                            // ->select('manhours.*', 'workers.gate_id', 'workers.nama', 'workers.nik')
                            ->select('manhours.*', 'workers.gate_id', 'workers.nik', 'workers.nama', DB::raw('MIN(manhours.start_time) AS start_time'), DB::raw('MAX(manhours.end_time) AS end_time'),  DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(manhours.man_hours))) as man_hours') )
                            // ->where('manhours.rfid_tag_id', '=', 'workers.rfid_tag_id')
                            // ->groupby('manhours.rfid_tag_id' )
                            ->groupBy(DB::raw('Date(start_time)')) 
                            ->where('rfid_tag_id', '=', $rfid_tag_id)
                            ->whereDate('start_time', '>=', $fromDate)
                            // ->where('end_time', '>=', $fromDate)
                            // ->where('start_time', '>=', $toDate)
                            ->whereDate('end_time', '<=', $toDate)
                            ->orderBy('manhours.updated_at','desc')
                            // ->orderBy('manhours.start_time', 'asc')
                            ->get();

        $data['detail_report'] = Manhours::join('workers','manhours.rfid_tag_id', '=','workers.id_rfid')
                            ->select('manhours.*', 'workers.gate_id', 'workers.nik', 'workers.nama')
                            // ->where('manhours.rfid_tag_id' )
                            ->where('rfid_tag_id', '=', $rfid_tag_id)
                            // ->where(DB::raw('Date(start_time)'))
                            // ->whereDate('manhours.start_time', $dates)
                            // ->groupby('manhours.rfid_tag_id')
                            // ->groupBy(DB::raw('Date(start_time)'))   
                            ->orderBy('manhours.updated_at','desc')
                            // ->orderBy('manhours.start_time', 'asc')
                            ->get();
                            // return $data;
     
         return view('admin/report_manhours/detail')->with($data);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
