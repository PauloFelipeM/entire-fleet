<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model {

    use SoftDeletes;

    protected $table = 'vehicle_types';

    protected $fillable = ['title'];

    public static $rules = [
        'title' => 'required|string|max:50',
    ];

    //Attributes
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = mb_strtoupper($value);
    }

    // Relationships
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_type_id');
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function index($trash = false)
    {                  
        $model = VehicleType::query();
        if($trash){
            $model = $model->onlyTrashed();
        }
        if(request()->search){
             $model = $model->where('title', 'like', '%'.request()->search.'%');
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
