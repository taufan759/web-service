<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    use HasFactory;

    protected $table = 'motivation'; // Nama tabel sesuai dengan yang Anda gunakan

    protected $fillable = ['content', 'user_id', 'visibility'];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

}