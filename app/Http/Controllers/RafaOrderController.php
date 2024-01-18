<?php

namespace App\Http\Controllers;

use App\Models\RafaOrder;
use Illuminate\Http\Request;

class RafaOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = RafaOrder::get();

        return view('dashboard.services.index', compact('orders'));
    }

    public function late()
    {
        $today  = date('Y-m-d');

        $orders = RafaOrder::whereDate('delivery_date' ,'<' ,$today)->where('finish' , 'no')->get();

        return view('dashboard.solutions.index', compact('orders'));


    }

    public function delivery()
    {
        $today = date('Y-m-d');

        $orders  = RafaOrder::where('delivery_date' , $today)->where('finish' ,'no')->get();
        
        return view('dashboard.categories.index', compact('orders'));

    }

    public function finish($order)
    {
        $order = RafaOrder::find($order);

        $order->update(['finish' => 'yes']);

        return redirect()->route('finish');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $prices = $request->price;
        $total_price = 0 ;
        foreach($prices as $price)
        {
            $total_price += $price;
        }
        $order =  RafaOrder::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'total_price' => $total_price,
            'delivery_date' => $request->date,
            'details' =>json_encode($request->details),
            'finish' =>'no'
        ]);

        return redirect()->route('rafaorders.index');

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
        $order = RafaOrder::find($id);

        return view('dashboard.services.edit', compact('order'));
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
        $order = RafaOrder::find($id);

        $order->delete();

        return redirect()->back();
    }
}
