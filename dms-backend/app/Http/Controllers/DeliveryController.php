<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index()
    {
        return response()->json(Delivery::all());
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_address' => 'required|string',
            'pickup_name' => 'required|string|max:100',
            'pickup_contact_no' => 'required|string|max:20',
            'pickup_email' => 'nullable|email|max:255',
            'delivery_address' => 'required|string',
            'delivery_name' => 'required|string|max:100',
            'delivery_contact_no' => 'required|string|max:20',
            'delivery_email' => 'nullable|email|max:255',
            'type_of_good' => 'required|string',
            'delivery_provider' => 'required|in:DHL,STARTRACK,ZOOM2U,TGE',
            'priority' => 'required|in:Standard,Express,Immediate',
            'shipment_pickup_date' => 'required|date',
            'shipment_pickup_time' => 'required|date_format:H:i',
            'status' => 'nullable|in:Pending,Processing,Shipped,Canceled',

            'package_description' => 'required|string',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {

            $delivery = Delivery::create([
                'pickup_address' => $validated['pickup_address'],
                'pickup_name' => $validated['pickup_name'],
                'pickup_contact_no' => $validated['pickup_contact_no'],
                'pickup_email' => $validated['pickup_email'],
                'delivery_address' => $validated['delivery_address'],
                'delivery_name' => $validated['delivery_name'],
                'delivery_contact_no' => $validated['delivery_contact_no'],
                'delivery_email' => $validated['delivery_email'],
                'type_of_good' => $validated['type_of_good'],
                'delivery_provider' => $validated['delivery_provider'],
                'priority' => $validated['priority'],
                'shipment_pickup_date' => $validated['shipment_pickup_date'],
                'shipment_pickup_time' => $validated['shipment_pickup_time'],
                'status' => $validated['status'] ?? 'Pending',
            ]);

            $delivery->packages()->create([
                'package_description' => $validated['package_description'],
                'length' => $validated['length'],
                'width' => $validated['width'],
                'height' => $validated['height'],
                'weight' => $validated['weight'],
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Delivery and package created successfully',
                'data' => $delivery,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred while saving data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
