<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'item_id', 'quantity'];
    
    //relatie met user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relatie met item
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
