<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Driver;

class DriverController extends Controller
{
    public function index(){
        return view('drivers.index', array(
            'drivers' => Driver::index(),
        ));
    }

    public function view($id){
        $driver = Driver::find($id);
        return view('drivers.view', array(
            'driver' => $driver,
        ));
    }

    public function create(){
        return view('drivers.create', array(
            'licenseCategories' => Driver::licenseCategories(),
        ));
    }

    public function update($id){
        $driver = Driver::find($id);
        return view('drivers.update', array(
            'driver' => $driver,
            'licenseCategories' => Driver::licenseCategories(),
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Driver::getRules());        

        if(!empty($id)){            
            $driver = Driver::find($id); 
            $driver->update($request->all());   
            $message = __('messages.success_update');        
        }else{
            $driver = new Driver();
            $driver->fill($request->all());
            $driver->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('drivers')->withMessage($message);
    }

    public function delete(Driver $driver){
        $driver->delete();
    }

    public function trash() 
    {            
        return view('drivers.trash', array(
            'drivers'=> Driver::index(true),
        ));
    }

    public function restore($id)
    {
        Driver::withTrashed()->where('id', $id)->restore();
    }
}
