<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\MasterPoint;

class MasterPointController extends Controller
{
    public function index(){
        return view('masterpoints.index', array(
            'masterPoints' => MasterPoint::index(),
        ));
    }

    public function view($id){
        $masterPoint = MasterPoint::find($id);
        return view('masterpoints.view', array(
            'masterPoint' => $masterPoint,
        ));
    }

    public function create(){
        return view('masterpoints.create', array(
            'load_scripts'=>array('master_point_form.js'),
        ));
    }

    public function update($id){
        $masterPoint = MasterPoint::find($id);
        return view('masterpoints.update', array(
            'masterPoint' => $masterPoint,
            'load_scripts'=>array('master_point_form.js'),
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, MasterPoint::getRules());      

        if(!empty($id)){            
            $masterPoint = MasterPoint::find($id); 
            $masterPoint->update($request->all());   
            $message = __('messages.success_update');        
        }else{
            $masterPoint = new MasterPoint();
            $masterPoint->fill($request->all());
            $masterPoint->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('masterpoints')->withMessage($message);
    }

    public function delete(MasterPoint $masterPoint){
        $masterPoint->delete();
    }

    public function trash() 
    {            
        return view('masterpoints.trash', array(
            'masterPoints'=> MasterPoint::index(true),
        ));
    }

    public function restore($id)
    {
        MasterPoint::withTrashed()->where('id', $id)->restore();
    }
}
