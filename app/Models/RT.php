<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $fillable = ['nama_rt', 'alamat', 'ketua_rt'];
    protected $table='rts';
    protected $primaryKey='id';
}