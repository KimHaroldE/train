<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public $timestamps = true;
    protected $table = 'passenger';
    protected $primaryKey = 'passenger_id';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'train_id'
    ];
    protected $casts = [
        'email' => 'string',
    ];
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];

    public function train()
    {
        return $this->belongsTo(Train::class, 'train_id', 'train_id');
    }
}
