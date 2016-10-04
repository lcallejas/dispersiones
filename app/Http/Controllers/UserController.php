<?php

namespace Dispersiones\Http\Controllers;

use Illuminate\Http\Request;

use Dispersiones\Http\Requests;
use Dispersiones\Http\Requests\UserRequest;
use Dispersiones\Http\Requests\UserUpdateRequest;
use Dispersiones\Http\Controllers\Controller;

use Dispersiones\User;
use Illuminate\Routing\Route;

use Redirect;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['show','edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('user'));
        $this->notFound($this->user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::name($request->get('name'))->where('id', '!=', Auth::user()->id)->orderBy('name','asc')->paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        Session::flash('message-success','Usuario registrado correctamente.');
        return Redirect::to('/user');
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
        return view('users.show',['user'=>$this->user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit',['user'=>$this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->user->fill($request->all());
        $this->user->save();

        Session::flash('message-success','Usuario editado correctamente.');
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->delete();

        Session::flash('message-success','Usuario eliminado correctamente.');

        return response()->json([
            "mensaje" => "borrado"
        ]);
    }
}
