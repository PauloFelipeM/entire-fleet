<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Brand;

class BrandController extends Controller
{
    public function index(){
        return view('brands.index', array(
            'brands' => Brand::index(),
        ));
    }

    public function view($id){
        $brand = Brand::find($id);
        return view('brands.view', array(
            'brand' => $brand,
        ));
    }

    public function create(){
        return view('brands.create');
    }

    public function update($id){
        $brand = Brand::find($id);
        return view('brands.update', array(
            'brand' => $brand,
        ));
    }

    public function store(Request $request, $id = null){

        $this->validate($request, Brand::getRules());        

        if(!empty($id)){            
            $brand = Brand::find($id); 
            $brand->update($request->all());
            $message = __('messages.success_update');
        }else{
            $brand = new Brand();
            $brand->fill($request->all());
            $brand->save();
            $message = __('messages.success_create');
        }

        return Redirect::to('brands')->withMessage($message);
    }

    public function delete(Brand $brand){
        $brand->delete();
    }

    public function trash() 
    {            
        return view('brands.trash', array(
            'brands'=> Brand::index(true),
        ));
    }

    public function restore($id)
    {
        Brand::withTrashed()->where('id', $id)->restore();
    }
}
