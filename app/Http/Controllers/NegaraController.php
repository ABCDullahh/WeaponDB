<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {

        $datas = DB::select('select * from negaras where is_delete = 0');
        return view('negara.index')
            ->with('negaras', $datas);
    }

    // {
    //     return view('pabrik.index')->with([
    //         'weapons' => weapon::all(),
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('negara.create');
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
            'nama_negara' => 'required|min:1|max:29',
            'region' => 'required|min:1|max:29',
            'presiden' => 'required|min:1|max:29',
        ]);
//builder
        DB::insert('INSERT INTO negaras(nama_negara,region,presiden) VALUES
        (:nama_negara, :region, :presiden)',
        [
        'nama_negara' => $request->nama_negara,
        'region' => $request->region,
        'presiden' => $request->presiden,
        ]
        );
        return redirect()-> route('negara.index')->with('success','berhasil');

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
        return view('negara.edit')->with([
            'negaras' => negara::find($id),
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
        $request->validate([
            'nama_negara' => 'required|min:1|max:29',
            'region' => 'required|min:1|max:29',
            'presiden' => 'required|min:1|max:29',
        ]);

//builder

        DB::update('UPDATE negaras SET nama_negara = :nama_negara, region = :region, presiden = :presiden where id=:id',
        [
        'id' => $id,
        'nama_negara' => $request->nama_negara,
        'region' => $request->region,
        'presiden' => $request->presiden,
        ]
        );

        return to_route('negara.index')->with('success','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $negara = negara::find($id);
        $negara->delete();

        return back()->with('success', 'berhasil');
    }

    public function soft($id)
    {
        DB::update('UPDATE negaras SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('negara.index')->with('success', 'Data Barang berhasil dihapus');
    }

}
