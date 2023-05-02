<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $list_of_order = OrderDetail::with('user')->where('user_id', auth()->user()->id)->get();
        $list_of_order = OrderDetail::with('user')->where('user_id', auth()->user()->id)->orderBy('rec_no', 'asc')->paginate(3);
        // $list_of_order = OrderDetail::where('user_id', auth()->user()->id)->get();
        // dd($list_of_order);

        return view('list_of_order', compact('list_of_order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latest_order = OrderDetail::latest()->value('id');

        if ($latest_order == null) {
            $new_rec_no = 'KK00001';
        } else {

            $new_rec_no = 'KK' . str_pad($latest_order + 1, 5, 0, STR_PAD_LEFT);
        }

        return view('new_order', compact('new_rec_no'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rec_no' => 'required|max:7',
            'email' => 'nullable',
            'tel_no' => 'nullable|numeric',
            'address' => 'required|max:255'
        ]);

        OrderDetail::create(
            [
                'rec_no' => $request->rec_no,
                // 'name' => auth()->user()->name,
                'user_id' => auth()->user()->id,
                'address' => $request->address,
                'tel_no' => $request->tel_no,
                'email' => $request->email,
                'date' => $request->date,

            ]
        );
        return redirect()->route('order.create')->with('status', 'Order added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order_detail = OrderDetail::findorFail($id);
        // $order_detail = OrderDetail::find($id);
        // $order_detail = OrderDetail::where('id', $id)->first();
        // dd($order_detail);
        return view('editor_order', compact('order_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'rec_no' => 'required|max:7',
            'email' => 'nullable',
            'tel_no' => 'nullable|numeric',
            'address' => 'required|max:255'
        ]);

        $order_detail = OrderDetail::findorFail($id);
        $order_detail->rec_no = $request->rec_no;
        $order_detail->address = $request->address;
        $order_detail->tel_no = $request->tel_no;
        $order_detail->email = $request->email;
        $order_detail->save();

        return redirect()->route('order.index')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderDetail::destroy($id);
        // return back();
        return redirect()->route('order.index')->with('status', 'Data has been deleted!');
    }
}
