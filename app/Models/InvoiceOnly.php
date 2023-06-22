<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOnly extends Model
{
    use HasFactory;

    protected $table = 'invoiceonly';
    public $timestamps = false;
}