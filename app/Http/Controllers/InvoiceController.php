<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Setting;
use PDF;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class InvoiceController extends Controller
{


    public function invoiceref()
    {
        //Get the latest invoice and add one to it
        return response()->json(['invoiceref' => 1234567]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return view('invoices');
    }

    /**
     * Get the list of all invoices
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = Invoice::all();
        $multiplied = $invoices->map(function ($item, $key) {
            $item->date = (new Carbon($item->date))->toFormattedDateString();
            $item->client = $item->client;
            $item->subtotal = json_decode($item->invoicedetails)->subtotal;
            $item->total = json_decode($item->invoicedetails)->total;
            return $item;
        });
        return response()->json($multiplied);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
        Invoice::create(
            [
                'invoiceid' => 'INV' . str_random(10),
                'invoiceref' => $request->data['invoiceref'],
                'date' => $request->data['date'],
                'client' => $request->data['clientdetails'],
                'invoicedetails' => json_encode($request->data)
            ]
        );
        return response()->json($request->data);
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

    public function print()
    {
        $latest_invoice = Invoice::latest()->first();
        $pdf = PDF::loadView('print', [
            'invoice' => $latest_invoice,
            'invoicedetails' => json_decode($latest_invoice->invoicedetails),
            'settings' => json_decode(Setting::first()->details)
        ]);
        return $pdf->stream('invoice.pdf');
    }

    /**
     * GET /print/printID
     * 
     * Prepare and print an invoice
     */
    public function printOne($ref)
    {
        $latest_invoice = Invoice::where(['invoiceref' => $ref])->first();
        $pdf = PDF::loadView('print', [
            'invoice' => $latest_invoice,
            'invoicedetails' => json_decode($latest_invoice->invoicedetails),
            'settings' => json_decode(Setting::first()->details)
        ]);
        return $pdf->stream('invoice.pdf');
    }
}
