<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyeFingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aye_fingers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aye_id');
            $table->decimal('lng', 10, 2)->default(0.00);
            $table->decimal('lat', 10, 2)->default(0.00);
            $table->boolean('finger')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('aye_id')
                ->references('id')
                ->on('ayes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aye_fingers');
    }
}
