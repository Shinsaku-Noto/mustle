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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->float('weight', 8,2)->nullable();
            $table->integer('reps')->nullable();
            $table->time('time', $precision = 0)->nullable();
            $table->float('distance', 8,2)->nullable();
            $table->string('memo', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
