<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailsRequest;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $order)
    {
        return OrderDetail::where("order_id", $order->uuid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailsRequest $request)
    {
        $request->validated();
        return OrderDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        return $orderDetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(OrderDetailsRequest $request, OrderDetail $orderDetail)
    {
        $request->validated();
        $data = [
            'order_id' => $orderDetail->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'status' => $request->status,
        ];
        $orderDetail->update($data);
        return $orderDetail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return response()->noContent();
    }
}
