<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'auth.input'], function () {
		Route::get('', 'HomeController@index');
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth.admin'], function () {

		// Master Data Karyawan
		Route::get('karyawan','KaryawanController@index');
		Route::get('karyawan/create','KaryawanController@create');
		Route::post('karyawan/store','KaryawanController@store');
		Route::get('karyawan/{id}','KaryawanController@edit')->name('editkaryawan');
		Route::patch('karyawan/{id}','KaryawanController@update')->name('updatekaryawan');
		Route::post('karyawan/{id}','KaryawanController@destroy');

		// Master Data Gate
		Route::get('gate_','GateController@index');
		Route::get('gate_/create','GateController@create');
		Route::post('gate_/store','GateController@store');
		Route::get('gate_/{id}','GateController@edit')->name('editgate_');
		Route::post('gate_/update/{id}','GateController@update')->name('updategate_');
		Route::post('gate_/{id}','GateController@destroy');

		// Master Data Workers
		Route::get('workers_','WorkersController@index');
		Route::get('workers_/create','WorkersController@create');
		Route::post('workers_/store','WorkersController@store');
		Route::get('workers_/{id}','WorkersController@edit')->name('editworkers_');
		Route::patch('workers_/{id}','WorkersController@update')->name('updateworkers_');
		Route::post('workers_/{id}','WorkersController@destroy');

        // Master Data Divisi
		Route::get('divisi_jabatan_','DivisiController@index');
        Route::get('divisi_jabatan_/create','DivisiController@create');
        Route::get('divisi_jabatan_/create-jabatan','DivisiController@create-jabatan');
        Route::post('divisi_jabatan_/store','DivisiController@store');
        Route::post('divisi_jabatan_/store_jabatan','DivisiController@store_jabatan');

		Route::get('divisi_jabatan_/{id}','DivisiController@edit')->name('editdivisi_');
		Route::patch('divisi_jabatan_/{id}','DivisiController@update')->name('updatedivisi_');
        Route::post('divisi_jabatan_/{id}','DivisiController@destroy');


		// Master Data Jabatan
		Route::get('jabatan_','JabatanController@index');
		Route::get('jabatan_/create','JabatanController@create');
		Route::post('jabatan_/store','JabatanController@store');
		Route::get('jabatan_/{id}','JabatanController@edit')->name('editjabatan_');
		Route::patch('jabatan_/{id}','JabatanController@update')->name('updatejabatan_');
		Route::post('jabatan_/{id}','JabatanController@destroy');

		// Master Data RFID
		Route::get('rfid_','RfidController@index');
		Route::get('rfid_/create','RfidController@create');
		Route::post('rfid_/store','RfidController@store');
		Route::get('rfid_/{id}','RfidController@edit')->name('editrfid');
		Route::patch('rfid_/{id}','RfidController@update')->name('updaterfid');
		Route::post('rfid_/{id}','RfidController@destroy');

        // getJabatan
		Route::post('get-jabatan_/store', 'WorkersController@getJabatan');

		// Setting Profile Admin
		Route::get('profile_/{id}','ProfileController@edit')->name('editprofile_');
		Route::patch('profile_/{id}', 'ProfileController@update')->name('updateprofile_');

		// Report Manhours
		Route::get('report_', 'ReportController@index');
		Route::get('report_/{id}', 'ReportController@detail_workers')->name('detail_report_workers_'); 
		Route::get('report_/{id}', 'ReportController@detail')->name('detail_report_');
		
		// ------------------------ Search ------------------------- //
		Route::post('report_','ReportController@search')->name('search');
});

Route::group(['namespace' => 'Superadmin', 'middleware' => 'auth.superadmin'], function () {

		// Master Data Divisi
		Route::get('jabatan_divisi','DivisiController@index');
        Route::get('divisi/create','DivisiController@create');
        Route::get('divisi/create-jabatan','DivisiController@create-jabatan');
        Route::post('divisi/store','DivisiController@store');
        Route::post('divisi/store_jabatan','DivisiController@store_jabatan');

		Route::get('divisi/{id}','DivisiController@edit')->name('editdivisi');
		Route::patch('divisi/{id}','DivisiController@update')->name('updatedivisi');
        Route::post('divisi/{id}','DivisiController@destroy');


		// Master Data Jabatan
		Route::get('jabatan','JabatanController@index');
		Route::get('jabatan/create','JabatanController@create');
		Route::post('jabatan/store','JabatanController@store');
		Route::get('jabatan/{id}','JabatanController@edit')->name('editjabatan');
		Route::patch('jabatan/{id}','JabatanController@update')->name('updatejabatan');
		Route::post('jabatan/{id}','JabatanController@destroy');

		// Master Data Users
		Route::get('users','UsersController@index');
		Route::get('users/create','UsersController@create');
		Route::post('users/store','UsersController@store');
		Route::get('users/{id}','UsersController@edit')->name('editusers');
		Route::patch('users/{id}','UsersController@update')->name('updateusers');
		Route::post('users/{id}','UsersController@destroy');

		// Master Data Gate
		Route::get('gate','GateController@index');
		Route::get('gate/create','GateController@create');
		Route::post('gate/store','GateController@store');
		Route::get('gate/{id}','GateController@edit')->name('editgate');
		Route::patch('gate/{id}','GateController@update')->name('updategate');
		Route::post('gate/{id}','GateController@destroy');

		// Master Data Project
		Route::get('project','ProjectController@index');
		Route::get('project/create','ProjectController@create');
		Route::post('project/store','ProjectController@store');
		Route::get('project/{id}','ProjectController@edit')->name('editproject');
		// Route::patch('project/{id}','ProjectController@update')->name('updateproject');
		Route::post('project/update/{id}','ProjectController@update')->name('updateproject');
		Route::post('project/{id}','ProjectController@destroy');
		
		// Master Data Workers
		Route::get('workers','WorkersController@index');
		Route::get('workers/create','WorkersController@create');
		Route::post('workers/store','WorkersController@store');
		Route::get('workers/{id}','WorkersController@edit')->name('editworkers');
		Route::patch('workers/{id}','WorkersController@update')->name('updateworkers');
		Route::post('workers/{id}','WorkersController@destroy');

		// getGate
		Route::post('get-gate/store', 'WorkersController@getGate');
		// get Divisi
		Route::post('get-divisi/store', 'WorkersController@getDivisi');
		// getJabatan
		Route::post('get-jabatan/store', 'WorkersController@getJabatan');

		// Master Data RFID
		Route::get('rfid','RfidController@index');
		Route::get('rfid/create','RfidController@create');
		Route::post('rfid/store','RfidController@store');
		Route::get('rfid/{id}','RfidController@edit')->name('editrfid');
		Route::patch('rfid/{id}','RfidController@update')->name('updaterfid');
		Route::post('rfid/{id}','RfidController@destroy');

		// Report Manhours
		Route::get('report','ReportController@index');

		// Run Python and .exe
		Route::get('run_app', 'RunController@index');
});
