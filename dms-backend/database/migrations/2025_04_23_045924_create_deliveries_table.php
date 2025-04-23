<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->text('pickup_address');
            $table->string('pickup_name', 100);
            $table->string('pickup_contact_no', 20);
            $table->string('pickup_email', 255)->nullable();
            $table->text('delivery_address');
            $table->string('delivery_name', 100);
            $table->string('delivery_contact_no', 20);
            $table->string('delivery_email', 255)->nullable();
            $table->string('type_of_good');
            $table->enum('delivery_provider', ['DHL', 'STARTRACK', 'ZOOM2U', 'TGE']);
            $table->enum('priority', ['Standard', 'Express', 'Immediate']);
            $table->date('shipment_pickup_date');
            $table->time('shipment_pickup_time');
            $table->enum('status', ['Pending', 'Processing', 'Shipped', 'Canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
