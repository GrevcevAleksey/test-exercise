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
        Schema::create('data_feed_import', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id');
            $table->integer('domain_id');
            $table->integer('subject');
            $table->timestamp('unisender_send_date_at');
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
        Schema::dropIfExists('data_feed_import');
    }
};
