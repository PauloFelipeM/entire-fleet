<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Route;
use App\MasterPoint;

class RouteController extends Controller
{
    public function index(){
        return view('routes.index', array(
            'routes' => Route::index(),
        ));
    }

    public function view($id){
        $route = Route::find($id);
        return view('routes.view', array(
            'route' => $route, 
            'masterPoints' => MasterPoint::all(),
            'load_scripts' => array('routes_form.js'),           
        ));
    }

    public function create(){
        return view('routes.create', array(
            'masterPoints' => MasterPoint::all(),
            'load_scripts' => array('routes_form.js'),
        ));
    }

    public function update($id){
        $route = Route::find($id);
        return view('routes.update', array(
            'route' => $route,
            'masterPoints' => MasterPoint::all(),
            'load_scripts' => array('routes_form.js'),
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Route::getRules(), Route::getMessages());        

        if(!empty($id)){            
            $route = Route::find($id); 
            $route->update($request->all());
            $message = __('messages.success_update');
        }else{
            $route = new Route();
            $route->fill($request->all());
            $route->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('routes')->withMessage($message);
    }

    public function delete(Route $route){
        $route->delete();
    }

    public function trash() 
    {            
        return view('routes.trash', array(
            'routes'=> Route::index(true),
        ));
    }

    public function restore($id)
    {
        Route::withTrashed()->where('id', $id)->restore();
    }
}
