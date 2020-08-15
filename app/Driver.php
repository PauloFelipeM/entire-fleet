<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model {

    protected $table = 'drivers';

    use SoftDeletes;

    protected $fillable = ['name', 'social_security', 'driver_license', 'email', 'phone', 'driver_license_category', 
                'driver_license_expiration', 'birth_date',
    ];

    protected $appends = [
        'license_category_name',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'social_security' => 'required|string|max:14',
        'driver_license' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|string|max:20',
        'driver_license_category' => 'required',
        'driver_license_expiration' => 'required',
        'birth_date' => 'required',
    ];

    // Relationships
    public function transits()
    {
        return $this->hasMany(Transit::class, 'driver_id');
    }    

    // Attributes
    public function getLicenseCategoryNameAttribute(){
        return Driver::licenseCategories($this->driver_license_category);
    }

    // Methods
    public static function getRules(){
        return static::$rules;
    }

    public static function messages(){
        return array(
            'driver_license_category.required' => __('validation.selected_required'),
        );
    }

    public static function licenseCategories($index = null){
        $categories = array(
            1 => __('driver.category_a'),
            2 => __('driver.category_b'),
            3 => __('driver.category_c'),
            4 => __('driver.category_d'),
            5 => __('driver.category_e'),
            6 => __('driver.category_ab'),
            7 => __('driver.category_ac'),
            8 => __('driver.category_ad'),
            9 => __('driver.category_ae'),
        );
        if($index) return $categories[$index];
        else return $categories;
    }

    public static function index($trash = false)
    {                  
        $model = Driver::query();
        if($trash){
            $model = $model->onlyTrashed();
        }
        if(request()->search){
             $model = $model->where('name', 'like', '%'.request()->search.'%');
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
