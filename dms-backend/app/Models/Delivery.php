<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $fillable = [
        'pickup_address',
        'pickup_name',
        'pickup_contact_no',
        'pickup_email',
        'delivery_address',
        'delivery_name',
        'delivery_contact_no',
        'delivery_email',
        'type_of_good',
        'delivery_provider',
        'priority',
        'shipment_pickup_date',
        'shipment_pickup_time', // This will be a string (HH:mm)
        'status',
    ];

    protected $attributes = [
        'status' => 'Pending', // Default value for status
    ];

    // Optional: Define a mutator for 'shipment_pickup_time' if needed
    public function setShipmentPickupTimeAttribute($value)
    {
        // Format the time in HH:mm format before saving it
        $this->attributes['shipment_pickup_time'] = Carbon::parse($value)->format('H:i');
    }

    public function getShipmentPickupTimeAttribute($value)
    {
        // Return the time as a Carbon instance, useful for manipulation
        return Carbon::parse($value);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
