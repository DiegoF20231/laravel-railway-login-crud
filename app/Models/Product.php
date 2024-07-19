<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $primaryKey = "product_id";
    protected $table = 'product';
    protected $fillable = [
        "product_id",
        "price",
        "name",
        "description",
        "image_url"
    ];


    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "email");
    }
}
