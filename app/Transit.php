<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model {

    protected $table = 'transits';

    protected $fillable = [
        'vehicle_id','driver_id', 'route_id', 'auxiliary',
        'km_leave','km_arrival','km_total','total_liters',
        'average_transit','liter_value','daily_value','discharge_value',
        'expenses_diverse','transit_cost','transit_expense','weight',
        'date_leave','date_arrival', 'refrigeration_value'
    ];

    protected $dates = [];

    public static $rules = [                
        'vehicle_id' => 'required',
        'driver_id' => 'required',
        'route_id' => 'required',
        'km_leave' => 'required',
        'km_arrival' => 'required',
    ];

    // Relationships
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class)->withTrashed();
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class)->withTrashed();
    }

    public function route()
    {
        return $this->belongsTo(Route::class)->withTrashed();
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function getMessages(){
        return array(
            'vehicle_id.required' => __('validation.selected_required'),
            'driver_id.required' => __('validation.selected_required'),
            'route_id.required' => __('validation.selected_required'),
        );
    }

    public static function index($trash = false)
    {                  
        $model = Transit::query();
        if($trash){
            $model = $model->onylTrashed();
        }
        if(request()->route_id){
            $model = $model->where('route_id', request()->route_id);
        }
        if(request()->vehicle_id){
            $model = $model->where('vehicle_id', request()->vehicle_id);
        }
        if(request()->driver_id){
            $model = $model->where('driver_id', request()->driver_id);
        }
        if(request()->date_leave){
            $model = $model->where('date_leave', request()->date_leave);
        }
        if(request()->date_arrival){
            $model = $model->where('date_arrival', request()->date_arrival);
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