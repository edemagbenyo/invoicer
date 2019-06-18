<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use \Image;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('report.index');
    }

    /**
     * Get all the reports
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return response()->json(Report::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images_name = [];
        if ($request->get('image')) {
            $images = $request->get('image');
            foreach ($images as $image) {
                $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                array_push($images_name,$name);
                Image::make($image)->save(storage_path('app/public/') . $name);
            }
        }
        $report = Report::create(
            [
                'reportid'=>'REP_'.str_random(10),
                'name'=>$request->name,
                'details'=>$request->except('image'),
                'photographs'=>$images_name
            ]
        );
        return response()->json($report);
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

    /**
     * GET /print/printID
     * 
     * Prepare and print an invoice
     */
    public function printOne($reportid)
    {
        $report = Report::where(['reportid' => $reportid])->first();
        $pdf = PDF::loadView('report/print', [
            'details' => $report->details,
            'photographs' => $report->photographs
        ]);
        return $pdf ->setPaper('a4', 'landscape')->stream('report.pdf');
    }
}
