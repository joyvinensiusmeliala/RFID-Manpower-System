<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gate;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gate'] = Gate::where('project_id', Auth::user()->project_id)->get();
        $data['project'] = Project::all();
        
        return view('admin/gate/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            
            return redirect('/gate_')->with('success', 'Berhasil menyimpan data gate');
        }
        catch(\Exception $e){
            return redirect('/gate_')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $gate = Gate::find($id);
        return response()->json([
            'data' => $gate
          ]);

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
            $gate = $request->get('edit_gate');
            $project = Auth::user()->project_id;

            Gate::updateOrCreate(
                [
                    'id' => $id
                ], 
                [
                    'gate' => $gate, 
                    'project_id' => $project,
                    'updated_at' => Carbon::now()->toDateTimeString() 
                ],
            ); 
            return response()->json(['success' => true ]);
        }
        catch(\Exception $e){
            return response()->json(['failed' => true]);
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
        $gate = Gate::destroy($id);
        if($gate){
            return response()->json([
                'success'=> 'Data gate berhasil dihapus'
            ]);
        }   
        else{
            return response()->json([
                'failes'=> 'Data gate gagal dihapus'
            ]);
        }
        return response($response);
    }
}
