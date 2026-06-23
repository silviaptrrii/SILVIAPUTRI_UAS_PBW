<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_outfit',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clothes()
    {
        return $this->belongsToMany(
            Clothes::class,
            'outfit_details',
            'outfit_id',
            'clothes_id'
        )->withTimestamps();
    }
}
