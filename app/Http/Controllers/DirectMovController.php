<?php

namespace Dispersiones\Http\Controllers;

use Illuminate\Http\Request;

use Dispersiones\Http\Requests;
use Dispersiones\Http\Controllers\Controller;

use Dispersiones\CompanyModel;
use Dispersiones\DirectMovModel;
use Dispersiones\DirectMovEntryModel;
use Dispersiones\DirectMovOutputModel;

use Session;

class DirectMovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directmovs = DirectMovModel::orderBy('created_at','desc')->paginate(10);
        return view('directmov.index',compact('directmovs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = CompanyModel::lists('name','id');
        return view('directmov.create',compact('companies'));
    }

    public function createDispersers($id)
    {
        $directmov = DirectMovModel::where('id', $id)->first();

        $directmoventrys = DirectMovEntryModel::where('directmov_no', $id)->get();
        foreach($directmoventrys as $directmoventry){
            $directmoventry->company = CompanyModel::where('id', $directmoventry->directmov_company)->first()->name;
        }
        $directmoventrytotal = DirectMovEntryModel::where('directmov_no', $id)->sum('directmov_rode');

        $directmovoutputs = DirectMovOutputModel::where('directmov_output_no', $id)->get();
        $directmovoutputtotal = DirectMovOutputModel::where('directmov_output_no', $id)->sum('directmov_output_rode');

        $companies = CompanyModel::lists('name','id');

        return view('directmov.dispersers',compact('directmov','directmoventrys','directmoventrytotal','directmovoutputs','directmovoutputtotal','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            DirectMovModel::create([
                'directmov_from' => $request->directmov_from,
            ]);

            $last_mov = DirectMovModel::withTrashed()->orderBy('id', 'desc')->first()->id;

            for($i = 0; $i < count($request->directmov_company); $i++){ 
                DirectMovEntryModel::create([
                    'directmov_no' => $last_mov,
                    'directmov_company' => $request->directmov_company[$i],
                    'directmov_rode' => $request->directmov_rode[$i],
                    'directmov_bank' => $request->directmov_bank[$i],
                    'directmov_account' => $request->directmov_account[$i],
                ]);
            }

            for($i = 0; $i < count($request->directmov_output_company); $i++){ 
                DirectMovOutputModel::create([
                    'directmov_output_no' => $last_mov,
                    'directmov_output_company' => $request->directmov_output_company[$i],
                    'directmov_output_type' => $request->directmov_output_type[$i],
                    'directmov_output_rode' => $request->directmov_output_rode[$i],
                    'directmov_output_disperser' => $request->directmov_output_disperser[$i],
                    'directmov_output_origin' => $request->directmov_output_origin[$i],
                    'directmov_output_destiny' => $request->directmov_output_destiny[$i],
                    'directmov_output_comment' => $request->directmov_output_comment[$i],
                ]);
            }

            Session::flash('message-success','Movimiento Directo creado correctamente.');

            return response()->json([
                "mensaje" => "Movimiento Creado"
            ]);
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
        $directmov = DirectMovModel::where('id', $id)->first();

        $directmoventrys = DirectMovEntryModel::where('directmov_no', $id)->get();
        foreach($directmoventrys as $directmoventry){
            $directmoventry->company = CompanyModel::where('id', $directmoventry->directmov_company)->first()->name;
        }
        $directmoventrytotal = DirectMovEntryModel::where('directmov_no', $id)->sum('directmov_rode');

        $directmovoutputs = DirectMovOutputModel::where('directmov_output_no', $id)->get();
        $directmovoutputtotal = DirectMovOutputModel::where('directmov_output_no', $id)->sum('directmov_output_rode');

        return view('directmov.view',compact('directmov','directmoventrys','directmoventrytotal','directmovoutputs','directmovoutputtotal'));
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
