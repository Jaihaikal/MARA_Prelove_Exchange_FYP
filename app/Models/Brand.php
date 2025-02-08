<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'status'
    ];

    // public static function getProductByBrand($id){
    //     return Product::where('brand_id',$id)->paginate(10);
    // }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id')->where('status','active');
    }
    public static function getProductByBrand($slug){
        $brand = Brand::where('slug', $slug)->first();

        if ($brand) {
            // Paginate the products for the brand
            return $brand->products()->where('status', 'active')->paginate(12); // Adjust the pagination size as needed
        }
        return null;
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}
}
