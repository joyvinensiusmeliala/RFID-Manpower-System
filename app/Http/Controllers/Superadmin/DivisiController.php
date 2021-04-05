<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Divisi;
use App\Jabatan;
use App\Project;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Divisi $divisi)
    {
        $data['divisi'] = Divisi::all();
        $data['project'] = Project::all();
        $data['jabatan'] = Jabatan::all();
        return view('superadmin/divisi/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['divisi'] = Divisi::all();
        $data['jabatan'] = Jabatan::all();
        return view('superadmin/divisi/create', $data);
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
            $divisi =  new Divisi();
            $divisi->nama=$request->nama;
            $divisi->project_id = $request->project_id;
            $divisi->save();
            return redirect('jabatan_divisi')->with('success', 'Data Divisi Berhasil Ditambahkan');
        }
        catch(\Exception $e){
            return redirect('jabatan_divisi')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
          }
    }

    public function store_jabatan(Request $request)
    {
        try{
            $jabatan =  new Jabatan();
            $jabatan->nama=$request->nama;
            $jabatan->save();
            return redirect('jabatan_divisi')->with('success', 'Data Jabatan Berhasil Ditambahkan');
        }
        catch(\Exception $e){
            return redirect('jabatan_divisi')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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

            $data ['divisi'] = Divisi::find($id);
            $data ['jabatan'] = Jabatan::find($id);
            $data['project'] = Project::all();

            return view('superadmin/divisi/edit')->with($data);

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
            $divisi = Divisi::find($id);
            $divisi->nama = $request->nama;
            $divisi->project_id = $request->project_id;
            $divisi->updated_at = Carbon::now()->toDateTimeString();
            $divisi->save();
            return redirect('jabatan_divisi')->with('success', 'Berhasil memperbaharui data');
        }
        catch(\Exception $e){
            return redirect('jabatan_divisi')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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

        $divisi = Divisi::destroy($id);
        if($divisi){
            return response()->json([
                'success'=> 'Data divisi berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failes'=> 'Data divisi gagal dihapus'
            ]);
        }
        return response($response);
    }

    public function destroy_jabatan($id)
    {
        $jabatan = Jabatan::destroy($id);

        if($jabatan){
            return response()->json([
                'success'=> 'Data jabatan berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failed'=> 'Data jabatan gagal dihapus'
            ]);
        }
        return response($response);
    }
}
