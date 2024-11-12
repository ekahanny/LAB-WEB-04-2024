<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];

    // Relasi many-to-one ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi one-to-many ke InventoryLog
    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class);
    }
}