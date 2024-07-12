<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipment_id',
        'type',
        'amount'
    ];
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
