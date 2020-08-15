<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Tire;
use App\Vehicle;
use App\Provider;

class TireController extends Controller
{
    public function index(){
        return view('tires.index', array(
            'tires' => Tire::index(),
        ));
    }

    public function view($id){
        $tire = Tire::find($id);
        return view('tires.view', array(
            'tire' => $tire,
        ));
    }

    public function create(){        
        return view('tires.create', array(
            'providers' => Provider::all(),
        ));
    }

    public function update($id){
        $tire = Tire::find($id);
        return view('tires.update', array(
            'tire' => $tire,
            'providers' => Provider::all(),
        ));
    }

    public function link_vehicle($id){        
        return view('tires.link_vehicle', array(
            'tire_id' => $id,
            'vehicle_spots' => Tire::vehicle_spots(),
            'vehicles' => Vehicle::all(),
        ));
    }

    public function update_link(Request $request, $id){
        $tire = Tire::find($id);
        $vehicle = Vehicle::find($request->vehicle_id);       
        $tire->km_vehicle_change = $vehicle->km_current;
        $tire->update($request->all());
        return Redirect::to('tires')->withMessage(__('messages.success_update'));
    }

    public function unlink_vehicle($id){
        $tire = Tire::find($id);
        $tire->vehicle_id = null;
        $tire->vehicle_spot = null;
        $tire->change_date = null;
        $tire->comment = null;
        $tire->km_vehicle_change = null;
        $tire->save();
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Tire::getRules(), Tire::getMessages());

        if(!empty($id)){
            $tire = Tire::find($id);
            $tire->update($request->all());
            $message = __('messages.success_update');
        }else{
            $tire = new Tire();
            $tire->fill($request->all());
            $tire->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('tires')->withMessage($message);
    }

    public function delete(Tire $tire){
        $tire->delete();
    }
}