<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Container;

class ContainerController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Get all containers
        $c = DB::table('containers')->orderBy('id', 'asc')->paginate(12);

        //Return them to the view
        return View::make('containers.index')->with('containers', $c);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return View::make('containers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required',
            'localization' => 'required',
            'status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/containers/create')
                ->withErrors($validator);
        } else {
            // store
            $container = new Container;
            $container->name = Input::get('name');
            $container->localization = Input::get('localization');
            $container->status = Input::get('status');
            if(Input::get('image') != null){
            	$container->image =  Input::get('image');
            }
            $container->save();

            // redirect
            Session::flash('message', 'Successfully created container!');
            return Redirect::to('admin/containers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function collect(){
    	$container = Container::find(Input::get('container_id'));
    	$container->being_collected = 1;
    	$container->save();
    	return Redirect::to('admin/containers');
    }

    public function set_full(){
    	$container = Container::find(Input::get('container_id'));
    	$container->status = "FULL";
    	$container->being_collected = 0;
    	$container->amount = 100.00;
    	$container->save();
    	return Redirect::to('admin/containers');

    }

    public function set_empty(){
    	$container = Container::find(Input::get('container_id'));
    	$container->status = "EMPTY";
    	$container->being_collected = 0;
    	$container->amount = 0.00;
    	$container->save();
    	return Redirect::to('admin/containers');
    	
    }

    public function change_amount(){
    	$container = Container::find(Input::get('container_id'));
    	$new_amount = $container->amount + Input::get('add_amount');

    	if($new_amount < 0) $new_amount = 0;
    	if($new_amount > 100) $new_amount = 100;

    	$container->amount = $new_amount;

    	if($new_amount < 100) $container->status = "EMPTY";
    	else $container->status = "FULL";

    	$container->save();
    	return Redirect::to('admin/containers');
    }
}
