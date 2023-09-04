<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all(); //pasiemam visus invoicus is DB
        return view('invoices.index', [
            'invoices' => $invoices,
            'countries' => Invoice::$countryList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $prices = [];
        // Product::all()->pluck('price', 'id')->each(function ($item, $key) use (&$prices) {
        //     $prices[] = ['id' => $key, 'price' => $item];
        // })->toArray();

        return view('invoices.create', [
            'clients' => Client::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();

        // fill the object with data from the request
        $invoice->invoice_number = $request->number;
        $invoice->invoice_date = $request->date;
        $invoice->client_id = $request->client_id;
        $invoice->invoice_amount = $request->amount;

        $invoice->save(); // save the object to the database

        return redirect()
            ->route('invoices-index')
            ->with('msg', [
                'type' => 'success',
                'content' => 'Invoice was created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', [
            'invoice' => $invoice,
            'clients' => Client::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        // fill the object with data from the request
        $invoice->invoice_number = $request->number;
        $invoice->invoice_date = $request->date;
        $invoice->client_id = $request->client_id;
        $invoice->invoice_amount = $request->amount;

        $invoice->save();

        return redirect()
            ->route('invoices-index')
            ->with('msg', [
                'type' => 'success',
                'content' => 'Invoice was updated successfully'
            ]);
    }

    /**
     * Delete confirmation
     */

    public function delete(Invoice $invoice)
    {
        return view('invoices.delete', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete(); //delete obj from DB

        return redirect()
            ->route('invoices-index')
            ->with('msg', [
                'type' => 'info',
                'content' => 'Invoice was deleted successfully'
            ]);
    }

    public function showLine()
    {
        $html = view('invoices.line')
            ->with(['products' => Product::all()])
            ->render();

        return response()->json(['html' => $html]);
    }
}
