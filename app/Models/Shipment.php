<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'code', 'shipper', 'image', 'weight', 'description', 'status', 'price'
    ];
    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($shipment) {
            $shipment->price = static::calculatePrice($shipment->weight);
        });

        static::updating(function ($shipment) {
            $shipment->price = static::calculatePrice($shipment->weight);
        });
    }
    public static function calculatePrice($weight)
    {
        if ($weight >= 1 && $weight <= 10) {
            return 10;
        } elseif ($weight > 10 && $weight <= 25) {
            return 100;
        } elseif ($weight > 25) {
            return 300;
        } else {
            return 0;
        }
    }
}
