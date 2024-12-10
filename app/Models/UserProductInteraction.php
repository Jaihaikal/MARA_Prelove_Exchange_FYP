<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProductInteraction extends Model
{
    use HasFactory;

    // Define the table name if it's not following Laravel's default naming convention
    protected $table = 'user_product_interactions';

    // Define fillable fields
    protected $fillable = [
        'user_id',
        'product_id',
        'interaction',
        'weight'
    ];


    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}