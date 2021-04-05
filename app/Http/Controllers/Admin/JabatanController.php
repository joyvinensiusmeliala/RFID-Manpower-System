<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\Divisi;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Hash;


use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Jabatan $jabatan)
    {
        $data['jabatan'] = Jabatan::where('divisi_id', Auth::user()->project->nama)->get();
        $data['divisi'] = Divisi::all();
        $data['project'] = Project::all();
        return view('admin/jabatan/index')->with($data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $data['jabatan'] = Jabatan::all();

        return view('admin/jabatan/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function store(Request $request)
    // {
    //     //
    //         $jabatan =  new Jabatan();
    //         $jabatan->nama=$request->nama;
    //         $jabatan->divisi_id = $request->divisi_idd;
    //         $jabatan->save();
    //         return redirect('/jabatan')->with('success', 'Data berhasil ditambahkan');
    // }

    public function store(Request $request)
    {
        //
            $jabatan =  new Jabatan();
            $jabatan->nama=$request->nama;
            $jabatan->divisi_id = $request->divisi_id;
            $jabatan->save();
            return redirect('divisi_jabatan_')->with('success', 'Data berhasil ditambahkan');
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
        $data['jabatan'] = Jabatan::find($id);
        $data['divisi'] = Divisi::where('project_id', Auth::user()->project_id)->get();
        return view('admin/jabatan/edit')->with($data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    // public function update(Request $request, $id)
    // {
    //     try{
    //         $jabatan = Jabatan::find($id);
    //         $jabatan->nama = $request->nama;
    //         $jabatan->divisi_id = $request->divisi_id;
    //         $jabatan->updated_at = Carbon::now()->toDateTimeString();

    //         if(!empty($request->password_baru)){
    //             $jabatan->password = Hash::make($request->password_baru);
    //         }
    //         else{
    //             $jabatan->password = $request->password_lama;
    //         }
    //         $jabatan->save();

    //         return redirect('jabatan_divisi')->with('success', 'Berhasil diupdate');
    //     }
    //     catch(\Exception $e){
    //         return redirect('jabatan')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
    //   }

    // }

    public function update(Request $request, $id)
    {
        try{
            $jabatan = Jabatan::find($id);
            $jabatan->nama = $request->nama;
            $jabatan->divisi_id = $request->divisi_id;
            $jabatan->updated_at = Carbon::now()->toDateTimeString();
            $jabatan->save();
            return redirect('divisi_jabatan_')->with('success', 'Berhasil memperbaharui data');
        }
        catch(\Exception $e){
            return redirect('divisi_jabatan_')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $jabatan = Jabatan::destroy($id);

        if($jabatan){
            return response()->json([
                'success'=> 'Data posisi berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failed'=> 'Data posisi gagal dihapus'
            ]);
        }
        return response($response);
    }



}
