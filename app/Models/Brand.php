<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;


    public $table = 'brands';
    protected $primaryKey = 'brand_id';

    public $fillable = [
        'brand_name',
        'brand_slug',
        'brand_image',
        'brand_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'brand_id' => 'integer',
        'brand_name' => 'string',
        'brand_slug' => 'string',
        'brand_image' => 'string',
        'brand_description' => 'string'
    ];

    /**
     * Validation rules
     * for create
     * @var array
     */
    public static $rules = [
        'brand_name' => 'required|string',
        'brand_slug' => 'required|string|unique:brands,brand_slug',
        'brand_image' => 'required|mimes:jpeg,png|max:1000',
        'brand_description' => 'required|string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    // take asset of the owned image
    public function getSrcAttribute()
    {
        return asset(env('IMAGE_PATH') . $this->attributes['brand_image']);
    }
}
