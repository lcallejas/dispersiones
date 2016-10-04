<?php

namespace Dispersiones\Http\Controllers;

use Illuminate\Http\Request;

use Dispersiones\Http\Requests;
use Dispersiones\Http\Requests\CompanyRequest;
use Dispersiones\Http\Controllers\Controller;

use Dispersiones\CompanyModel;
use Illuminate\Routing\Route;

use Redirect;
use Session;
use Auth;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['show','edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->company = CompanyModel::find($route->getParameter('company'));
        $this->notFound($this->company);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = CompanyModel::name($request->get('name'))->orderBy('name','asc')->paginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        CompanyModel::create($request->all());

        Session::flash('message-success','Empresa registrada correctamente.');
        return Redirect::to('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Session::flash('view-no-record',true);
        return view('companies.show',['company'=>$this->company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('companies.edit',['company'=>$this->company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $this->company->fill($request->all());
        $this->company->save();

        Session::flash('message-success','Empresa editada correctamente.');
        return Redirect::to('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->company->delete();

        Session::flash('message-success','Empresa eliminada correctamente.');

        return response()->json([
            "mensaje" => "borrado"
        ]);
    }
}
