<?php

namespace App\Observers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {

        Log::info('Inicio ProductCreated desafio 3:');

            // 1. Calculo el valor de todos los productos de la factura
            $totalPrice = Invoice::where('invoices.id', $product->invoice_id)
                ->join('products', 'products.invoice_id', '=', 'invoices.id')
                ->sum(DB::raw('products.price * products.quantity'));

            // 2. Actualizo el registro total de invoice
            $invo = Invoice::where('id', $product->invoice_id)->first();
            $invo->total = $totalPrice;
            $invo->save();

        Log::info("Fin ProductCreated Listener desafio 3 Total invoice: $totalPrice", );

    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
