<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $table = 'clients';
    use SoftDeletes;
    protected $fillable=['first_name', 'last_name', 'birth_date', 'phone_number'];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
