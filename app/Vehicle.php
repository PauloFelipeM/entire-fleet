<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model {

    protected $table = 'vehicles';

    use SoftDeletes;

    protected $fillable = ['plate', 'color', 'manufacture_year', 'model_year', 
                    'fuel', 'document', 'km_started', 'brand_id', 'vehicle_type_id',
    ];

    protected $appends = [
        'fuel_name',
        'km_current',
    ];

    protected $hidden = []; 

    public static $rules = [
        'plate' => 'required|string|max:20',
        'color' => 'required|string|max:20',
        'manufacture_year' => 'required|string|min:4|max:4',
        'model_year' => 'required|string|min:4|max:4',
        'document' => 'required|string|max:11',
        'document' => 'required',
        'fuel' => 'required',
        'brand_id' => 'required',
        'vehicle_type_id' => 'required',
    ];

    // Relationships
    public function brand()
    {
        return $this->belongsTo(Brand::class)->withTrashed();
    }

    public function vehicletype()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id')->withTrashed();
    }
    
    public function transits()
    {
        return $this->hasMany(Transit::class, 'vehicle_id');
    }  

    public function tires()
    {
        return $this->hasMany(Tire::class, 'vehicle_id');
    }

    //Attributes
    public function setPlateAttribute($value)
    {
        $this->attributes['plate'] = mb_strtoupper($value);
    }    

    public function getFuelNameAttribute(){
        return Vehicle::fuels($this->fuel);
    }

    public function getKmCurrentAttribute(){
        $transit = Transit::where('vehicle_id', $this->id)->orderBy('id','desc')->first();
        if(!$transit){
            $vehicle = Vehicle::where('id',$this->id)->first();
            return $vehicle->km_started;
        }else{
            return $transit->km_arrival;
        }        
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function getMessages(){
        return array(
            'fuel.required' => __('validation.selected_required'),
            'brand_id.required' => __('validation.selected_required'),
            'vehicle_type_id.required' => __('validation.selected_required'),
        );
    }

    public static function fuels($index = null){
        $fuels = array(
            1 => __('vehicle.gasoline'),
            2 => __('vehicle.ethanol'),
            3 => __('vehicle.diesel'),
            4 => __('vehicle.natural_gas'),
            5 => __('vehicle.flex'),
            6 => __('vehicle.tetrafuel'),   
        );
        if($index) return $fuels[$index];
        else return $fuels;
    }

    public static function index($trash = false)
    {                  
        $model = Vehicle::query();
        if($trash){
            $model = $model->onlyTrashed();
        }
        if(request()->search){
             $model = $model->Where('plate', 'like', '%'.request()->search.'%');
        }
        if(request()->order_by){
            $model = $model->orderBy(request()->order_by, request()->sort);
        }else{            
            $model = $model->orderBy('created_at', 'desc');        
        }
        $model = $model->with(['brand','vehicletype']);
        $model = $model->paginate(8);
        return $model;
    }
}