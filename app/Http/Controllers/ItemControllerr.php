<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::join('categories','categories.id','=','items.category_id')
        ->get();
        return view('item.index', compact('item'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name'     => 'required',
            'quantity'      => 'required',
            'price'         => 'required',
            'category_id'   => 'required'
        ]);

        $item = Item::create([
            'item_name'     => $request->item_name,
            'quantity'      => $request->quantity,
            'price'         => $request->price,
            'category_id'   => $request->category_id,

        ]);

        if($item){
            //redirect dengan pesan sukses
            return redirect('item')->with(['success' => 'Data Has been Created!']);
        }else{
            //redirect dengan pesan error
            return redirect('item')->with(['error' => 'Data Has cant be Create! Fill with correct answer']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        route('item.edit');
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
        $this->validate($request, [
        'item_name'      => 'required',
        'quantity'       => 'required',
        'price'          => 'required'
        ]);

        //get data Blog by ID
        $item = Item::findOrFail($request->id);


        $item->update([
        'item_name'     => $request->item_name,
        'quantity'      => $request->quantity,
        'price'         => $request->price
        ]);

        if($item){
        //redirect dengan pesan sukses
        return redirect('item')->with(['success' => 'Data has been updated']);
        }else{
        //redirect dengan pesan error
        return redirect('item')->with(['error' => 'Data fail update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Item::findOrFail($id);
        $item->delete();

        if($item){
            //redirect dengan pesan sukses
            return redirect('item')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect('item')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
