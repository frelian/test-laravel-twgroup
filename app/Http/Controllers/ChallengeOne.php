<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChallengeOne extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Desafio 1
        // 1. Obtener precio total de la factura.
        $totalPrice = Invoice::where('invoices.id', 4)
            ->join('products', 'products.invoice_id', '=', 'invoices.id')
            ->sum(DB::raw('products.price * products.quantity'));

        // 2. Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.
        $invoiceOverQt = Product::select('invoice_id')
            ->groupBy("invoice_id")
            ->havingRaw('SUM(quantity) > ?', [100])
            ->get();

        // 3. Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.
        $productsOverPrice = Product::select('name' )
            ->havingRaw(DB::raw('price * quantity') > '1000000')
            ->get();

        $newRecord = Product::create([
            'invoice_id' => 4,
            'name' => 'My new product',
            'quantity' => 1,
            'price' => 780000
        ]);

        dd($totalPrice, $invoiceOverQt, $productsOverPrice, $newRecord);
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
