<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    // protected $guarded = [];
    // protected $primaryKey = 'id';
    public $timestamps = false;

    // protected $fillable = [
    //     'kota',
    //     'no_hp',
    //     'email',
    //     'nama_company',
    //     'logo',
    // ];
}