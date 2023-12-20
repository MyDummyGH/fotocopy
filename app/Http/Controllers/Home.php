<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Datas;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');
        $data = [
            'type' => 'Input',
        ];

        $product = Product::all('product');
        $contentView = view('pages/form', compact('product', 'data'))->with('navbar', $navbarView)->with('sidebar', $sidebarView);

        return $contentView;
    }

    public function getHarga($product)
    {
        $dataHarga = Product::where('product', $product)->first(['harga']);

        // Check if the product exists
        if ($dataHarga) {
            return response()->json($dataHarga);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listData()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $datas = Datas::orderBy('created_at', 'desc')->get();
        $contentView = view('pages/listdata', compact('datas'))->with('navbar', $navbarView)->with('sidebar', $sidebarView);

        return $contentView;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name_order'),
            'no_tlp' => $request->input('no_tlp'),
            'product' => $request->input('product'),
            'total' => $request->input('total'),
            'harga' => $request->input('harga'),
        ];

        Datas::create($data);

        return redirect('/');
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
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');
        $data = [
            'type' => 'Edit',
        ];

        $dataOrder = Datas::find($id);
        $product = Product::all('product');
        $contentView = view('pages/form', compact('dataOrder', 'data', 'product'))->with('navbar', $navbarView)->with('sidebar', $sidebarView);

        return $contentView;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->input('name_order'),
            'no_tlp' => $request->input('no_tlp'),
            'product' => $request->input('product'),
            'total' => $request->input('total'),
            'harga' => $request->input('harga'),
        ];

        Datas::find($id)->update($data);

        return redirect('/listDatas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Datas::find($id)->delete();

        return redirect('/listDatas');
    }
}
