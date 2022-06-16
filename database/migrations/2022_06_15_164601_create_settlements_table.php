<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->nullable();
            $table->enum('zone_type', [ZONE_TYPE_URBANO, ZONE_TYPE_SEMIURBANO, ZONE_TYPE_RURAL]);

            $table->foreignId('settlement_type_id')
                ->nullable()
                ->constrained('settlement_types')
                ->onDelete('set null');

            $table->foreignId('municipality_id')
                ->nullable()
                ->constrained('municipalities')
                ->onDelete('set null');

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
        Schema::dropIfExists('settlements');
    }
}
