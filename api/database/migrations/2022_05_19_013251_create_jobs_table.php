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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('price');
            $table->float('transport');
            $table->float('tax');
            $table->float('final_price');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->enum('status',['requested','confirmed','done','canceled']);
            $table->longText('observation');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
