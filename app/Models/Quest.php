<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'reward', 'duration', 'status', 'active_user_id', 'rewarded'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isClaimable(){
        return $this->status === 'accepted' && now()->gte($this->updated_at->addMinutes($this->duration));
    }
}
