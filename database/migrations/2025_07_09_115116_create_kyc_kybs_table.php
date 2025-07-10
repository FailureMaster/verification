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
        Schema::create('kyc_kybs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal (KYC)
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('id_type');
            $table->string('id_number');
            $table->string('id_document'); // Encrypted path
            $table->text('residential_address');
            $table->string('proof_of_address'); // Encrypted path

            // Business (KYB)
            $table->string('company_name');
            $table->string('company_registration');
            $table->string('country_incorporation');
            $table->string('business_type');
            $table->text('business_address');
            $table->json('company_documents'); // Encrypted paths
            $table->string('representative_name');
            $table->string('representative_id'); // Encrypted path

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kyc_kybs');
    }
};
