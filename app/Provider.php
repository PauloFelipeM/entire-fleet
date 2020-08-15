<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model {

    protected $table = 'providers';

    use SoftDeletes;

    protected $fillable = ['name', 'social_name', 'email', 'phone', 'zip_code', 'address'
    ];

    protected $dates = [];

    public static $rules = [
        'name' => 'required|string|max:255',
        'social_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|string|max:20',
        'zip_code' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ];

    //Relationships
    public function tires(){
        return $this->hasMany(Tire::class, 'provider_id');
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function index($trash = false)
    {                  
        $model = Provider::query();
        if($trash){
            $model = $model->onlyTrashed();
        }
        if(request()->search){
             $model = $model->where('name', 'like', '%'.request()->search.'%');
             $model = $model->orWhere('social_name', 'like', '%'.request()->search.'%');
             $model = $model->orWhere('email', 'like', '%'.request()->search.'%');
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