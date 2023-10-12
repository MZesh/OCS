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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->string('name');
            $table->string('father_name');
            $table->string('nic');
            $table->bigInteger('contact_pak');
            $table->text('address_pak');
            $table->string('iqama');
            $table->text('work_address');
            $table->bigInteger('contact_saudi');
            $table->bigInteger('contact_relative');
            $table->string('pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
