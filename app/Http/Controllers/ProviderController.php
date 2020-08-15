<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Provider;

class ProviderController extends Controller
{
    public function index(){
        return view('providers.index', array(
            'providers' => Provider::index(),
        ));
    }

    public function view($id){
        $provider = Provider::find($id);
        return view('providers.view', array(
            'provider' => $provider,
        ));
    }

    public function create(){
        return view('providers.create');
    }

    public function update($id){
        $provider = Provider::find($id);
        return view('providers.update', array(
            'provider' => $provider,
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Provider::getRules());        

        if(!empty($id)){            
            $provider = Provider::find($id); 
            $provider->update($request->all());   
            $message = __('messages.success_update');        
        }else{
            $provider = new Provider();
            $provider->fill($request->all());
            $provider->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('providers')->withMessage($message);
    }

    public function delete(Provider $provider){
        $provider->delete();
    }

    public function trash() 
    {            
        return view('providers.trash', array(
            'providers'=> Provider::index(true),
        ));
    }

    public function restore($id)
    {
        Provider::withTrashed()->where('id', $id)->restore();
    }
}
