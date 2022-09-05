<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $table = "purchases";

    protected $fillable = ["customer_id", "total_spent", "total_saving", "transaction_at"];
}
