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
        Schema::create('amendments', function (Blueprint $table) {
            $table->id();

            //$table->string('parliamentary', 70);
            $table->string('amendment', 8);
            $table->string('caption', 200);
            $table->string('work_program', 21);
            $table->integer('nature_of_expense');
            $table->decimal('price', $precision = 10, $scale = 2);
            //$table->string('viability')->nullable();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('parliamentaries_id')->constrained('parliamentaries')->onDelete('cascade');
            $table->foreignId('progress_id')->constrained('progress')->onDelete('cascade');
            $table->foreignId('viabilities_id')->constrained('viabilities')->onDelete('cascade');
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
        Schema::dropIfExists('amendments');
    }
};
