<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $table = 'clothes';

    protected $fillable = [
        'user_id',
        'category_id',
        'nama_pakaian',
        'warna',
        'foto',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function outfits()
    {
        return $this->belongsToMany(
            Outfit::class,
            'outfit_details',
            'clothes_id',
            'outfit_id'
        )->withTimestamps();
    }
}
