<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kyc_kybs', function (Blueprint $table) {
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kyc_kybs', function (Blueprint $table) {
            //
        });
    }
};
