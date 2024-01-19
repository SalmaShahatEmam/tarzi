<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
        $orders = RafaOrder::with('client')->get();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function late()
    {
        $today  = date('Y-m-d');

        $orders = RafaOrder::whereDate('delivery_date', '<', $today)->where('finish', 'no')->get();

        return view('dashboard.solutions.index', compact('orders'));
    }

    public function delivery()
    {
        $today = date('Y-m-d');

        $orders  = RafaOrder::where('delivery_date', $today)->where('finish', 'no')->get();

        return view('dashboard.categories.index', compact('orders'));
    }

    public function finish($order)
    {
        $order = RafaOrder::find($order);

        $order->update(['finish' => true]);

        return redirect()->back()->with('success', __('models.update_success'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();

        return view('dashboard.orders.create', compact('clients'));
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
        $data = $request->except('_token', 'price');

        $prices = $request->price;

        $total_price = 0;

        foreach ($prices as $price) {
            $total_price += $price;
        }

        $data['total_price'] = $total_price;

        if (is_array($request->details) && is_array($request->price)) {
            $data['details'] = json_encode(array_combine($request->details, $request->price));
        } else {
            $data['details'] = json_encode([]);
        }

        $order =  RafaOrder::create($data);

        return redirect()->route('rafaorders.index')->with('success', __('models.added_success'));
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

        $clients = Client::get();

        return view('dashboard.orders.edit', compact('order', 'clients'));
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
        $data = $request->except('_token', 'price');

        $prices = $request->price;
        $total_price = 0;

        foreach ($prices as $price) {
            $total_price += $price;
        }

        $data['total_price'] = $total_price;

        if (is_array($request->details) && is_array($request->price)) {
            $data['details'] = json_encode(array_combine($request->details, $request->price));
        } else {
            $data['details'] = json_encode([]);
        }

        $order = RafaOrder::findOrFail($id);

        $order->update($data);

        return redirect()->route('rafaorders.index')->with('success', __('models.update_success'));
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

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
