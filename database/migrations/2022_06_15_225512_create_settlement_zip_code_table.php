<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementZipCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement_zip_code', function (Blueprint $table) {
            $table->id();

            $table->foreignId('settlement_id')
                ->constrained('settlements')
                ->onDelete('cascade');

            $table->foreignId('zip_code_id')
                ->constrained('zip_codes')
                ->onDelete('cascade');
            
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
        Schema::dropIfExists('settlement_zip_code');
    }
}
