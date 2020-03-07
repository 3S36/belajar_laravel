<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class ProdukController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $model = Produk::leftjoin('kategoris','kategoris.id','=','produks.kategori_id')
        ->select('produks.*','kategoris.nama as nama_kategori')
        ->paginate(10);
        return view('produk.index')-> with(['model'=>$model]);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategori::get();
        return view('produk.create')->with(["kategori"=>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'kategori_id'=>'required|max:100',
            'nama'=>'required|max:100',
            'harga'=>'required|numeric',
            'diskon'=>'required|numeric|between:0,99',
            'deskripsi'=>'required|string',
        ]);
        $model= new Produk;
        $model->kategori_id=$request->input('kategori_id');
        $model->nama=$request->input('nama');
        $model->harga=$request->input('harga');
        $model->diskon=$request->input('diskon');
        $model->deskripsi=$request->input('deskripsi');
        $model->save();

        return redirect()->route('produk.index');
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
          $kategori=Kategori::get();
         $model=Produk::findOrFail($id);                                                                                                                                                                                    
        return view('produk.update')->with(['model'=>$model,'kategori'=>$kategori]);
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
        $request->validate([
            'kategori_id'=>'required|max:100',
            'nama'=>'required|max:100',
            'harga'=>'required|numeric',
            'diskon'=>'required|numeric|between:0,99',
            'deskripsi'=>'required|string',
        ]);
        $model= Produk::findOrFail($id);
        $model->kategori_id=$request->input('kategori_id');
        $model->nama=$request->input('nama');
        $model->harga=$request->input('harga');
        $model->diskon=$request->input('diskon');
        $model->deskripsi=$request->input('deskripsi');
        $model->save();

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= produk::findOrFail($id);
         $model->delete();

         return redirect()->route('produk.index');
    }
}
