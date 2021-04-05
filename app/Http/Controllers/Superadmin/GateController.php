<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Gate;
use App\Project;
use Carbon\Carbon;

use Illuminate\Http\Request;

class GateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gate'] = Gate::orderBy('created_at','desc')->get();
        $data['project'] = Project::all();
        return view('superadmin/gate/index')->with($data);
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
            $gates = new Gate();
            $gates->gate = $request->gate;
            $gates->project_id = $request->project_id;
            $gates->created_at = Carbon::now()->toDateTimeString();
            $gates->save();
            
            return redirect('/gate')->with('success', 'Berhasil menyimpan data gate');
        }
        catch(\Exception $e){
            return redirect('/gate')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $data['gate'] = Gate::find($id);
        $data['project'] = Project::all();
        return view('superadmin/gate/edit')->with($data);
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
            $gates = Gate::find($id);
            $gates->gate = $request->gate;
            $gates->project_id = $request->project_id;
            $gates->updated_at = Carbon::now()->toDateTimeString();
            $gates->save();
            return redirect('/gate')->with('success', 'Berhasil memperbaharui data');
        }
        catch(\Exception $e){
            return redirect('/gate')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $gates = Gate::destroy($id);

        if($gates){
            return response()->json([
                'success'=> 'Data gate berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failed'=> 'Data gate gagal dihapus'
            ]);
        }
        return response($response);
    }
}
