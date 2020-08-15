<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\VehicleType;

class VehicleTypeController extends Controller
{
    public function index(){
        return view('vehicletypes.index', array(
            'vehicletypes' => VehicleType::index(),
        ));
    }

    public function view($id){
        $vehicletype = VehicleType::find($id);
        return view('vehicletypes.view', array(
            'vehicletype' => $vehicletype,
        ));
    }

    public function create(){
        return view('vehicletypes.create');
    }

    public function update($id){
        $vehicletype = VehicleType::find($id);
        return view('vehicletypes.update', array(
            'vehicletype' => $vehicletype,
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, VehicleType::getRules());        

        if(!empty($id)){            
            $vehicletype = VehicleType::find($id); 
            $vehicletype->update($request->all()); 
            $message = __('messages.success_update');
        }else{
            $vehicletype = new VehicleType();
            $vehicletype->fill($request->all());
            $vehicletype->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('vehicletypes')->withMessage($message);
    }

    public function delete(VehicleType $vehicletype){
        $vehicletype->delete();
    }

    public function trash() 
    {            
        return view('vehicletypes.trash', array(
            'vehicletypes'=> VehicleType::index(true),
        ));
    }

    public function restore($id)
    {
        VehicleType::withTrashed()->where('id', $id)->restore();
    }
}
