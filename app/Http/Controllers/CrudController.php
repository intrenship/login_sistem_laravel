<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Crud;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		
        return view('auth/login');
    }
	    public function utama()
    {
        //
		$datas = Crud::orderBy('id','DESC')->paginate(2);
		return view('show')->with('datas',$datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('add');
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
		$this->validate($request, [
      'judul' => 'required',
      'isi' => 'required'
]);

     $tambah = new Crud();
     $tambah->judul = $request['judul'];
     $tambah->isi = $request['isi'];
     $tambah->save();

     return redirect()->to('/');
    }
	  
  public function register1(Request $request)
    {
        //

	$this->validate($request, [
      'name' => 'required',
      'username' => 'required',
	  'email' => 'required',
      'password' => 'required'	  
]);
	$tambah = new Reg();
     $tambah->name = $request['name'];
     $tambah->username = $request['username'];
	 $tambah->email = $request['email'];
     $tambah->password = $request['password'];
     $tambah->save();
		dd('succes');

     return redirect()->to('../utama');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampilkan = Crud::find($id);
        return view('tampil')->with('tampilkan', $tampilkan);
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
		   $tampiledit = Crud::where('id', $id)->first();
        return view('edit')->with('tampiledit', $tampiledit);
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
		  $update = Crud::where('id', $id)->first();
        $update->judul = $request['judul'];
        $update->isi = $request['isi'];
        $update->update();

        return redirect()->to('/');
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
		   $hapus = Crud::find($id);
        $hapus->delete();

        return redirect()->to('/');
    }
}
