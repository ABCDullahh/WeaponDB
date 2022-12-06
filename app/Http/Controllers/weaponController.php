<?php

namespace App\Http\Controllers;

// use Illuminate\Http\weapon;
use Illuminate\Http\Request;
use App\Models\weapon;
use Illuminate\Support\Facades\DB;

class weaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $datas = DB::select('select * from weapons where is_delete = 0');
        return view('weapon.index')
            ->with('weapons', $datas);
    }

    // {
    //     return view('weapon.index')->with([
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
        return view('weapon.create');
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
            'weapname' => 'required|min:1|max:29',
            'ammo' => 'required|min:1|max:29',
            'type' => 'required|min:1|max:29',
            'price' => 'required|min:1|max:29',
            'nama_pabrik' => 'required|min:1|max:29',
        ]);

        DB::insert('INSERT INTO weapons(weapname,ammo,type,price,nama_pabrik) VALUES
        (:weapname, :ammo, :type, :price, :nama_pabrik)',
        [
        'weapname' => $request->weapname,
        'ammo' => $request->ammo,
        'type' => $request->type,
        'price' => $request->price,
        'nama_pabrik' => $request->nama_pabrik,
        ]
        );

        return to_route('weapon.index')->with('success','berhasil');

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
        return view('weapon.edit')->with([
            'weapons' => weapon::find($id),
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
            'weapname' => 'required|min:1|max:29',
            'ammo' => 'required|min:1|max:29',
            'type' => 'required|min:1|max:29',
            'price' => 'required|min:1|max:29',
            'nama_pabrik' => 'required|min:1|max:29',
        ]);

        DB::update('UPDATE weapons SET weapname = :weapname, ammo = :ammo, type = :type, price = :price, nama_pabrik = :nama_pabrik where id=:id',
        [
        'id' => $id,
        'weapname' => $request->weapname,
        'ammo' => $request->ammo,
        'type' => $request->type,
        'price' => $request->price,
        'nama_pabrik' => $request->nama_pabrik,
        ]
        );
        return to_route('weapon.index')->with('success','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weapon = weapon::find($id);
        $weapon->delete();

        return back()->with('success', 'berhasil');
    }

    public function soft($id)
    {
        DB::update('UPDATE weapons SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('weapon.index')->with('success', 'Data Barang berhasil dihapus');
    }

}
