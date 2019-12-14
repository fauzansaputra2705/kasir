<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json()
    {
        $order = Order::all();

        return DataTables::of($order)
        ->addColumn('action', function($order){
            return  /*' <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i>Show</a> '*/
                     ' <a onclick="edit('. $order->id_order .')" class="btn btn-primary btn-xs text-white"><i class="fas fa-edit text-white"></i> Edit </a> '
                    . '<a onclick="hapus('. $order->id_order .')" class="btn btn-danger btn-xs text-white"><i class="fas fa-trash-alt text-white"></i> Delete </a> ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function index()
    {
        $data['title'] = "Order | WAITER";
        $data['sidebar'] = "waiter.sidebar";
        $data['page'] = "waiter.order";
        return view('layouts.app',$data);

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

        $input = 
        [
            // 'id_order' => $request->id_order,
            'no_meja' => 0,
            'tanggal' => date("Y-m-d"),
            'id_user' => 5,
            'keterangan' => $request->keterangan,
            'status_order' => $request->status_order
        ];

        dd($input);

        // Order::create($input);

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
        $order = Order::find($id);
        return $order;
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
        $idOrder = Order::findOrFail($id);

        $idOrder->update($input);

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
        Order::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
