<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;
use DataTables;


class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function json()
    {
        $masakan = Masakan::all();

        return DataTables::of($masakan)
        ->addColumn('action', function($masakan){
            return  /*' <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i>Show</a> '*/
                     ' <a onclick="edit('. $masakan->id_masakan .')" class="btn btn-primary btn-xs text-white"><i class="fas fa-edit text-white"></i> Edit </a> '
                    . '<a onclick="hapus('. $masakan->id_masakan .')" class="btn btn-danger btn-xs text-white"><i class="fas fa-trash-alt text-white"></i> Delete </a> ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function index()
    {
        if (route('adminmasakan') == TRUE) {
            redirect()->route('adminmasakan');
        }else{
            redirect()->route('waitermasakan');
        }
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
        $input = $request->all();

        Masakan::create($input);

        return response()->json([
            'success' => true
        ]);
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
        $masakan = Masakan::find($id);
        return $masakan;
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
        $input = $request->all();
        $idMasakan = Masakan::findOrFail($id);

        $idMasakan->update($input);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $masakan = Masakan::findOrFail($id);

        Masakan::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
