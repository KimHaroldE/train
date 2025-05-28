<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    public $timestamps = true;
    protected $table = 'train';
    protected $primaryKey = 'train_id';
    protected $fillable = [
        'train_name',
        'passenger_id'
    ];
    protected $casts = [
        'passenger_id' => 'integer',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'train_id', 'train_id');
    }
    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'train_id', 'train_id');
    }
}
