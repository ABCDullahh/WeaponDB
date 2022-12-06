<?php

namespace App\Http\Controllers;

// use Illuminate\Http\pabrik;
use Illuminate\Http\Request;
use App\Models\pabrik;
use Illuminate\Support\Facades\DB;

class pabrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {

        $datas = DB::select('select * from pabriks where is_delete = 0');
        return view('pabrik.index')
            ->with('pabriks', $datas);
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
        return view('pabrik.create');
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
            'nama_pabrik' => 'required|min:1|max:29',
            'lokasi' => 'required|min:1|max:29',
            'tahun_pabrik_dibuat' => 'required|min:1|max:29',
        ]);
//builder
        DB::insert('INSERT INTO pabriks(nama_pabrik,lokasi,tahun_pabrik_dibuat) VALUES
        (:nama_pabrik, :lokasi, :tahun_pabrik_dibuat)',
        [
        'nama_pabrik' => $request->nama_pabrik,
        'lokasi' => $request->lokasi,
        'tahun_pabrik_dibuat' => $request->tahun_pabrik_dibuat,
        ]
        );
        return redirect()-> route('pabrik.index')->with('success','berhasil');

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
        return view('pabrik.edit')->with([
            'pabriks' => pabrik::find($id),
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
            'nama_pabrik' => 'required|min:1|max:29',
            'lokasi' => 'required|min:1|max:29',
            'tahun_pabrik_dibuat' => 'required|min:1|max:29',
        ]);

//builder

        DB::update('UPDATE pabriks SET nama_pabrik = :nama_pabrik, lokasi = :lokasi, tahun_pabrik_dibuat = :tahun_pabrik_dibuat where id=:id',
        [
        'id' => $id,
        'nama_pabrik' => $request->nama_pabrik,
        'lokasi' => $request->lokasi,
        'tahun_pabrik_dibuat' => $request->tahun_pabrik_dibuat,
        ]
        );

        return to_route('pabrik.index')->with('success','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pabrik = pabrik::find($id);
        $pabrik->delete();

        return back()->with('success', 'berhasil');
    }

    public function soft($id)
    {
        DB::update('UPDATE pabriks SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('pabrik.index')->with('success', 'Data Barang berhasil dihapus');
    }

}
