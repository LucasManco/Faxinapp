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

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')
                ->on('employees')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');

            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id')->references('id')
                ->on('job_types')->onDelete('cascade');

            $table->json('additionals');
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
