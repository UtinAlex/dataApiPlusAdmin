<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Имя');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->timestamps();
        });
        for ($i = 1; $i <= 10; $i++) {
            DB::table('pages')->insert([
            'name' => 'Иван ' . $i,
            'phone' => '777-' .  $i,
        ]);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
