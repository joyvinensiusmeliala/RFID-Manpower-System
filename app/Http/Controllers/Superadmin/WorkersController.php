<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\Workers;
use Carbon\Carbon;
use App\Project;
use App\Gate;
use App\Jabatan;
use App\Divisi;
use App\RFID;
use File;
use DB;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['workers'] = Workers::all();
        $data['jabatan'] = Jabatan::all();
        $data['divisi'] = Divisi::all();
        $data['gate'] = Gate::all();
        $data['project'] = Project::all();
        
        $data['rfid'] = RFID::where('nik','=', NULL)
                        ->orWhere('nik','=','')
                        ->get();

        return view('superadmin/workers/index')->with($data);
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
            $workers = new Workers();
            $workers->nik = $request->nik;
            $workers->nama = $request->nama;
            $workers->alamat = $request->alamat;
            $workers->email = $request->email;
            $workers->handphone = $request->no_hp;
            $workers->keterangan = $request->keterangan;

            if($request->foto == ''){
                $workers->foto = '';
            }
            else{
                if ($files = $request->file('foto')) {
                    $destinationPath = 'uploads/workers/' . $request->nik; // upload path
                    $file = "Workers_" . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $file);
                    $uploadfoto = $request->nik . "/" . $file;
                    $workers->foto = $uploadfoto;
                }
            }
            $workers->tgl_bergabung = $request->tgl_bergabung;
            $workers->tgl_keluar = $request->tgl_keluar;
            $workers->project_id = $request->project_id;
            $workers->jabatan_id = $request->jabatan_id;
            $workers->divisi_id = $request->divisi_id;
            $workers->gate_id = $request->gate_id;
            $workers->status = $request->status;
            $workers->jenis_kelamin = $request->jenis_kelamin;
            $workers->id_rfid = $request->id_rfid;
            $workers->created_at = Carbon::now()->toDateTimeString();
            $workers->save();

            if($workers->id_rfid != NULL){
                $rfid = RFID::where('uid', $workers->id_rfid)->first();
                $rfid->nik = $request->nik;
                $rfid->updated_at = Carbon::now()->toDateTimeString();
                $rfid->save();
            }
            else{
                echo "tidak ada";
            }

            return redirect('/workers')->with('success', 'Berhasil menyimpan data');
        }
        catch(\Exception $e){
            return redirect('/workers')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $data['workers'] = Workers::find($id);
        $data['jabatan'] = Jabatan::all();
        $data['divisi'] = Divisi::all();
        $data['gate'] = Gate::all();
        $data['project'] = Project::all();
        
        $workers = Workers::where('id', $id)->first();

        $data['rfid'] = RFID::where('uid', $workers->id_rfid)
                            ->orWhere('nik', '=', NULL)
                            ->get();

        return view('superadmin/workers/edit')->with($data);
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
            $workers = Workers::find($id);
            $workers->nik = $request->nik;
            $workers->nama = $request->nama;
            $workers->jenis_kelamin = $request->jenis_kelamin;
            $workers->alamat = $request->alamat;
            $workers->email = $request->email;
            $workers->handphone = $request->handphone;
            $workers->project_id = $request->project_id;
            $workers->divisi_id = $request->divisi_id;
            $workers->jabatan_id = $request->posisi_id;
            $workers->gate_id = $request->gate_id;
            $workers->tgl_bergabung = $request->tgl_bergabung;
            $workers->tgl_keluar = $request->tgl_keluar;
            $workers->status = $request->status;
            $workers->keterangan = $request->keterangan; 
            
            if(empty($request->file('foto'))){
                $uploadfoto = $workers->foto;
            }
            else{
                $path = 'uploads/workers/'.$request->nik;

                if(!File::exists($path)){
                    $files = $request->file('foto');
                    $destinationPath = 'uploads/workers/' . $request->nik; // upload path
                    $file = "Worker_" . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $file);
                    $uploadfoto = $request->nik . "/" . $file;
                }
                else{
                    unlink('uploads/workers/'.$workers->foto);
                    $files = $request->file('foto');
                    $destinationPath = 'uploads/workers/' . $request->nik; // upload path
                    $file = "Worker_" . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $file);
                    $uploadfoto = $request->nik . "/" . $file;
                }
                
            }
            $workers->foto = $uploadfoto;
            $workers->id_rfid = $request->id_rfid;
            $workers->updated_at = Carbon::now()->toDateTimeString();
            $workers->save();

            if($workers->id_rfid == NULL){
                echo "belum diset rfid";
             }
             else{
                 $rfid = RFID::where('uid', $workers->id_rfid)->first();
                 $rfid->nik = $request->nik;
                 $rfid->updated_at = Carbon::now()->toDateTimeString();
                 $rfid->save();
             }
            
            return redirect('/workers')->with('success', 'Berhasil menyimpan data');
    }
    catch(\Exception $e){
        return redirect('/workers')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $get_nik = Workers::where('id', $id)->first();
        
        // Untuk mengupdate data di Table RFID
        $update_RFID = RFID::where('nik', $get_nik->nik)
                        ->update([
                            'nik' => NULL
                        ]);
        $workers = Workers::destroy($id);
        
        if($workers){
            return response()->json([
                'success'=> 'Data workers berhasil dihapus'
            ]);
        }   
        else{
            return response()->json([
                'failed'=> 'Data workers gagal dihapus'
            ]);
        }
        return response($response);
    }

    public function getGate(Request $request){
        $getGates = Gate::where('project_id',$request->project_id)
                            ->select('id','gate','project_id')
                            ->get();
        return $getGates;
    }

    public function getDivisi(Request $request){
        $getDivisi = Divisi::where('project_id', $request->project_id)
                    ->select('id', 'nama', 'project_id')
                    ->get();
        return $getDivisi;
    }

    public function getJabatan(Request $request){
        $getJabatans = Jabatan::where('divisi_id',$request->divisi_id)
                            ->select('id','nama','divisi_id')
                            ->get();
        return $getJabatans;
    }
}
