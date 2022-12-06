<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dataweap;


class dataweapController extends Controller
{



    // $joins = DB::table('senjatas')
    // ->join('subjenis', 'senjatas.id_subjenis', '=', 'subjenis.id_subjenis')
    // ->join('types', 'senjatas.id_jenis', '=', 'types.id_type')
    // ->select('senjatas.nama_senjata as nama_senjata', 'subjenis.subjenis as subjenis', 'types.type as type')
    // ->paginate(6);
    // return view('totals.index',compact('joins'))
    //     ->with('i', (request()->input('page',1)-1)*6);
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index(Request $request)
    {
        // $joins = DB::select("SELECT * FROM view_name");
        // return view('dataweap.index')
        //     ->with('joins', $joins);
        if($request->has("search")){
            $search = $request->input("search");
            if($search == ""){
                $joins = DB::select("SELECT * FROM view_name");

                return view('dataweap.index')
                    ->with('joins', $joins);
        }else{
            $joins = DB::select("SELECT * FROM view_name WHERE
            weapname like '%{$search}%' or
            type like '%{$search}%' or
            nama_pabrik like '%{$search}%';");
                return view('dataweap.index')
                    ->with('joins', $joins);
            }
        }else{
            $joins = DB::select("SELECT * FROM view_name");
            // dd($joins());

            return view('dataweap.index')
                ->with('joins', $joins);
        }


        // $joins = DB::table('weapons')
        //     ->join('pabriks', 'weapons.nama_pabrik', '=', 'pabriks.nama_pabrik')
        //     ->select('weapons.weapname as weapname', 'pabriks.nama_pabrik as pabriks')
        //     ->paginate(6);
        //     return view('dataweap.index',compact('joins'))
        //         ->with('i', (request()->input('page',1)-1)*6);

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
        //
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
        //
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
    }
}
