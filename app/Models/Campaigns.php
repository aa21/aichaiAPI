<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use HasFactory;
    protected $table = 'campaigns';
    protected $fillable = [
        'name', 
        'active', 
        'purchase_validity_days',
        'purchase_count_min',
        'purchase_total_value_min',
        'redemption_per_customer'
    ];    
}
