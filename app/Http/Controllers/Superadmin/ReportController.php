<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\RFID;
use App\Manhours;
use App\Project;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = date('Y-m-d', strtotime(Carbon::now()));
        $data['manhours'] = DB::table('manhours')
                        ->join('workers','workers.id_rfid', '=', 'manhours.rfid_tag_id')
                        ->select('manhours.rfid_tag_id','workers.nama','workers.nik','workers.gate_id','manhours.start_time', 'manhours.end_time' , DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(manhours.man_hours))) as total_manhours'))
                        ->whereDate('manhours.start_time', $dates)
                        ->groupBy('manhours.id' )
                        ->orderBy('manhours.updated_at', 'desc')
                        ->get();
         return view('superadmin/report/index')->with($data);
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
