<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'sub_category_id',
        'category_id', 'stock', 'active', 'is_special', 'discount'];

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function getFinalPriceAttribute()
    {
        return $this->discount ? $this->price - ($this->price * ($this->discount / 100)) : $this->price;
    }
}
