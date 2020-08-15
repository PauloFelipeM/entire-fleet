<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;

    protected $table = 'routes';

    protected $fillable = ['title', 'distance', 'masterpoint_origin_id', 'masterpoint_destination_id'];

    public static $rules = [
        'title' => 'required|string|max:255',
        'distance' => 'required',        
        'masterpoint_origin_id' => 'required',
        'masterpoint_destination_id' => 'required',
    ];

    // Relationships
    public function masterPointOrigin()
    {
        return $this->belongsTo(MasterPoint::class, 'masterpoint_origin_id')->withTrashed();
    }
    public function masterPointDestination()
    {
        return $this->belongsTo(MasterPoint::class, 'masterpoint_destination_id')->withTrashed();
    }
    public function transits(){
        $this->hasMany(Transit::class, 'route_id');
    }

    //Attributes
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = mb_strtoupper($value);
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function getMessages(){
        return array(
            'masterpoint_origin_id.required' => __('validation.selected_required'),
            'masterpoint_destionation_id.required' => __('validation.selected_required'),
        );
    }

    public static function index($trash = false)
    {                  
        $model = Route::query();
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
        $model = $model->with(['masterPointOrigin','masterPointDestination']);
        $model = $model->paginate(8);
        return $model;
    }
}
