<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use PDF;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('certificate.index');
    }
    /**
     * Get all the certificates
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return response()->json(Certificate::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $certificate = Certificate::create(
            [
                'certificateid'=>'CERT_'.str_random(10),
                'name'=>$request->name,
                'details'=>$request->all()
            ]
        );
        return response()->json($certificate);

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
        $details =json_encode($request->certificate_info);
        $certificate = Certificate::updateOrCreate(
            [
                'id'=>$id
            ],
            [
                'name'=>$request->name,
                'details'=>$details
            ]
        );
        return response()->json($request->all());
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



    /**
     * GET /print/printID
     * 
     * Prepare and print an invoice
     */
    public function printOne($certificateid)
    {
        $certificate = Certificate::where(['certificateid' => $certificateid])->first();
        $pdf = PDF::loadView('certificate/print', [
            'details' => $certificate->details,
        ]);
        return $pdf->stream('certificate.pdf');
    }
}
