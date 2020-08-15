<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPoint extends Model {

    use SoftDeletes;

    protected $table = 'master_points';

    protected $fillable = ['title', 'address', 'latitude', 'longitude'];

    protected $hidden = [];     

    public static $rules = [
        'title' => 'required|string|max:255',
        'address' => 'required|string',
        'latitude' => 'required',
        'longitude' => 'required',
    ];

    // Relationships
    public function routes()
    {
        return $this->hasMany(Transit::class, 'masterpoint_origin_id', 'masterpoint_destionation_id');
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

    public static function index($trash = false)
    {                  
        $model = MasterPoint::query();
        if($trash){
            $model = $model->onlyTrashed();
        }
        if(request()->search){
             $model = $model->where('title', 'like', '%'.request()->search.'%');
             $model = $model->orWhere('address', 'like', '%'.request()->search.'%');
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