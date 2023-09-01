<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
        return view('invoices.create', [
            'countries' => Invoice::$countryList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->invoice_number = $request->number;
        $invoice->invoice_date = $request->date;
        $invoice->client_name = $request->name;
        $invoice->client_address = $request->address;
        $invoice->client_address2 = $request->address2;
        $invoice->client_vat = $request->vat;
        $invoice->client_country = $request->country;
        $invoice->invoice_amount = $request->amount;
        $invoice->save();

        return redirect()->route('invoices-index');
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
            'countries' => Invoice::$countryList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->invoice_number = $request->number;
        $invoice->invoice_date = $request->date;
        $invoice->client_name = $request->name;
        $invoice->client_address = $request->address;
        $invoice->client_address2 = $request->address2;
        $invoice->client_vat = $request->vat;
        $invoice->client_country = $request->country;
        $invoice->invoice_amount = $request->amount;
        $invoice->save();

        return redirect()->route('invoices-index');
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

        return redirect()->route('invoice-index');
    }
}
