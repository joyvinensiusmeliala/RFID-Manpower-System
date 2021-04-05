<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use App\User;
use App\RoleUser;
use App\Project;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('role_id',1)->get();
        $data['role'] = RoleUser::all();
        $data['project'] = Project::all();
        return view('superadmin/users/index')->with($data);
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
            $data = User::where('username', $request->username)->first();

            if(!empty($data)){
                return redirect('/users')->with('failed', 'Username sudah ada');
            }
            else{
                $users = new User();
                $users->username = $request->username;
                $users->password = Hash::make($request->password);
                $users->role_id = $request->role_id;
                $users->email = $request->email;
                $users->project_id = $request->project_id;
                $users->created_at = Carbon::now()->toDateTimeString();
                $users->uid = Str::uuid()->toString();
                $users->save();
                return redirect('/users')->with('success', 'Berhasil disimpan');
            }

        }
        catch(\Exception $e){
            return redirect('/users')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $data['users'] = User::find($id);
        $data['role'] = RoleUser::all();
        $data['project'] = Project::all();

        return view('superadmin/users/edit')->with($data);
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
            $users = User::find($id);
            $users->username = $request->username;
            $users->role_id = $request->role_id;
            $users->project_id = $request->project_id;
            $users->email = $request->email;
            $users->updated_at = Carbon::now()->toDateTimeString();

            if(!empty($request->password_baru)){
                $users->password = Hash::make($request->password_baru);
            }
            else{
                $users->password = $request->password_lama;
            }
            $users->save();

            return redirect('/users')->with('success', 'Berhasil diupdate');
        }
        catch(\Exception $e){
            return redirect('/users')->with('failed', 'Silahkan Cek Kembali Inputan Anda');
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
        $users = User::destroy($id);

        if($users){
            return response()->json([
                'success'=> 'Data user berhasil dihapus'
            ]);
        }
        else{
            return response()->json([
                'failed'=> 'Data user gagal dihapus'
            ]);
        }
        return response($response);
    }
}
