<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    protected $table = 'tires';

    protected $fillable = [
        'vehicle_id', 'provider_id', 'serie_number', 
        'brand', 'dimension', 'note_number', 'km_total',
        'value', 'validate_date', 'purchase_date',
        'change_date', 'vehicle_spot', 'comment', 'km_vehicle_change'                     
    ];

    protected $appends = ['spot_set', 'status'];

    public static $rules = [
        'serie_number' => 'required|string|max:100',
        'brand' => 'required|string|max:100',
        'dimension' => 'required|string|max:100',
        'note_number' => 'required|string|max:255',
        'km_total' => 'required',
        'value' => 'required',
        'validate_date' => 'required',
        'purchase_date' => 'required',
        'provider_id' => 'required',
    ];  

    //Relationships
    public function vehicle(){
        return $this->belongsTo(Vehicle::class)->withTrashed();
    }

    public function provider(){
        return $this->belongsTo(Provider::class)->withTrashed();
    }

    //Attributes
    public function getSpotSetAttribute(){
        return Tire::vehicle_spots($this->vehicle_spot);
    }

    public function getStatusAttribute(){
        $status = '';
        if($this->vehicle_id) $status = __('tire.used');
        else $status = __('tire.available');
        return $status;
    }
    
    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function getMessages(){
        return array(
            'provider_id.required' => __('validation.selected_required'),
        );
    }

    public static function vehicle_spots($index = null){
        $vehicle_spots = array(
            1 => __('tire.front_left'),
            2 => __('tire.front_right'),
            3 => __('tire.back_left'),
            4 => __('tire.back_right'), 
        );
        if($index) return $vehicle_spots[$index];
        else return $vehicle_spots;
    }

    public static function index()
    {                  
        $model = Tire::query();
        if(request()->search){
            $model = $model->where('serie_number', 'like', '%'.request()->search.'%');
            $model = $model->orWhere('note_number', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $model = $model->orderBy(request()->order_by, request()->sort);
        }else{            
            $model = $model->orderBy('created_at', 'desc');        
        }
        $model = $model->paginate(8);
        return $model;
    }
}
