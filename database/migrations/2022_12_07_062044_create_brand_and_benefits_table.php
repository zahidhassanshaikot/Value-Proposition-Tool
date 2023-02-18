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
        Schema::create('brand_and_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('request_user_ip');
            $table->string('request_time');
            $table->string('date_time');
            $table->text('brands');
            $table->text('benefits');
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
        Schema::dropIfExists('brand_and_benefits');
    }
};
