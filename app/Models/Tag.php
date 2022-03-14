<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    public $table = 'tags';
    protected $primaryKey = 'tag_id';

    public $fillable = [
        'tag_slug',
        'tag_name'
    ];

    public $timestamps  = false;
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tag_id' => 'integer',
        'tag_slug' => 'string',
        'tag_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tag_slug' => 'required',
        'tag_name' => 'required'
    ];

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags', 'tag_id', 'product_id');
    }
}
