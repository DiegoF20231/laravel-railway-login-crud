<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = "user";
    protected $primaryKey = "email";
    protected $keyType = "string";

    protected $hidden = ["password"];
    public $timestamps = false;
    protected $fillable = [
        "email",
        "username",
        "password"
    ];



    public function getProducts(): HasMany
    {
        return $this->hasMany(Product::class, "email");  //Segundo parametro clave foranea en tabla product
    }
}
