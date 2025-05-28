<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = true;
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $fillable = [
        'email',
        'train_id',
        'date',
        'time'
    ];
    protected $casts = [
        'date' => 'date',
        'time' => 'string',
    ];
    protected $hidden = [
        'created_at',   
        'updated_at',
    ];
    public function train()
    {
        return $this->belongsTo(Train::class, 'train_id', 'train_id');
    }
}
