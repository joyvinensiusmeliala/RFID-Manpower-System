<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['project'] = Project::orderBy('created_at','desc')->get();
        return view('superadmin/project/index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['project'] = Project::all();
        return view('superadmin/project/create', $data);
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
            $project =  new Project();
            $project->nama=$request->nama;
            $project->lokasi=$request->lokasi;
            $project->created_at = Carbon::now()->toDateTimeString();

            $project->save();
            return redirect('/project')->with('success', 'Data berhasil ditambahkan');
        }
        catch(\Exception $e){
            return redirect('/project')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        //
        // $data ['project'] = Project::find($id);
        // return view('superadmin/project/edit')->with($data);

        $project = Project::find($id);
        return response()->json([
            'data' => $project
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
        // try{
        //     $project =  Project::find($id);
        //     $project->nama=$request->get('nama');
        //     $project->lokasi=$request->get('lokasi');
        //     $project->updated_at = Carbon::now()->toDateTimeString();
        //     $project->save();
        //     return redirect('/project')->with('success', 'Data  berhasil di Update');
        // }
        // catch(\Exception $e){
        //     return redirect('/project')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
        //   }
        try{
            $nama = $request->get('edit_nama');
            $lokasi =  $request->get('edit_lokasi');

            Project::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'nama' => $nama,
                    'lokasi' => $lokasi,
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

        $project = Project::destroy($id);
        if($project){
            return response()->json([
                'success'=> 'Project berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failes'=> 'Project gagal dihapus'
            ]);
        }
        return response($response);
    }
}
