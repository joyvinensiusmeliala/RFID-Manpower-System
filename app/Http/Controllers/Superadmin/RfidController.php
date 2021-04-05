<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Rfid;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rfid'] = Rfid::orderBy('created_at','desc')->get();
        return view('superadmin/rfid/index')->with($data);
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
        try{
            $rfid = new Rfid();
            $rfid->rfid = $request->rfid;
            // $rfid->project_id = $request->project_id;
            $rfid->created_at = Carbon::now()->toDateTimeString();
            $rfid->save();
            
            return redirect('/rfid')->with('success', 'Berhasil menyimpan data rfid');
        }
        catch(\Exception $e){
            return redirect('/rfid')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
          }
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
        $data['rfid'] = Rfid::find($id);
        return view('superadmin/rfid/edit')->with($data);
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
        try{
            $rfid = Rfid::find($id);
            $rfid->rfid = $request->rfid;
            // $rfid->project_id = $request->project_id;
            $rfid->updated_at = Carbon::now()->toDateTimeString();
            $rfid->save();
            return redirect('/rfid')->with('success', 'Berhasil memperbaharui data');
        }
        catch(\Exception $e){
            return redirect('/rfid')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rfid = Rfid::destroy($id);

        if($rfid){
            return response()->json([
                'success'=> 'Data rfid berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failed'=> 'Data rfid gagal dihapus'
            ]);
        }
        return response($response);
    }
}
