<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Vehicle;
use App\Brand;
use App\VehicleType;

class VehicleController extends Controller
{
    public function index(){
        return view('vehicles.index', array(
            'vehicles' => Vehicle::index(),
        ));
    }

    public function view($id){
        $vehicle = Vehicle::find($id);
        return view('vehicles.view', array(
            'vehicle' => $vehicle,
        ));
    }

    public function create(){
        return view('vehicles.create', array(
            'brands' => Brand::all(),
            'vehicletypes' => VehicleType::all(),
            'fuels' => Vehicle::fuels(),
        ));
    }

    public function update($id){
        $vehicle = Vehicle::find($id);
        return view('vehicles.update', array(
            'vehicle' => $vehicle,
            'brands' => Brand::all(),
            'vehicletypes' => VehicleType::all(),
            'fuels' => Vehicle::fuels(),
        ));
    }

    public function store(Request $request, $id = null){
        
        $this->validate($request, Vehicle::getRules(), Vehicle::getMessages());        
        $data = $request->all();        

        if(!empty($id)){            
            $vehicle = Vehicle::find($id);
            $vehicle->update($data);    
            $message = __('messages.success_update');
        }else{
            $vehicle = new Vehicle();
            $vehicle->fill($data);
            $vehicle->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('vehicles')->withMessage($message);
    }

    public function delete(Vehicle $vehicle){
        $vehicle->delete();
    }

    public function trash() 
    {            
        return view('vehicles.trash', array(
            'vehicles'=> Vehicle::index(true),
        ));
    }

    public function restore($id)
    {
        Vehicle::withTrashed()->where('id', $id)->restore();
    }
}
