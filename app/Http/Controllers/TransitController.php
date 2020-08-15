<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Vehicle;
use App\Driver;
use App\Transit;
use App\Route;

class TransitController extends Controller
{
    public function index(){
        return view('transits.index', array(
            'transits' => Transit::index(),
            'vehicles' => Vehicle::all(),
            'drivers' => Driver::all(),
            'routes' => Route::all(),
        ));
    }

    public function view($id){
        $transit = Transit::find($id);
        return view('transits.view', array(
            'transit' => $transit,
        ));
    }

    public function create(){
        return view('transits.create', array(
            'vehicles' => Vehicle::all(),
            'drivers' => Driver::all(),
            'routes' => Route::all(),
        ));
    }

    public function update($id){
        $transit = Transit::find($id);
        return view('transits.update', array(
            'transit' => $transit,
            'vehicles' => Vehicle::all(),
            'drivers' => Driver::all(),
            'routes' => Route::all(),
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Transit::getRules(), Transit::getMessages());   

        if(!empty($id)){
            $transit = Transit::find($id); 
            $transit->update($request->all());  
            $message = __('messages.success_update');      
        }else{
            $transit = new Transit();
            $transit->fill($request->all());
            $transit->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('transits')->withMessage($message);
    }
}
