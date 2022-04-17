<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Обозначение поля');
            $table->string('field_name')->nullable()->comment('Атрибут name');
            $table->string('placeholder_form')->nullable()->comment('placeholder поля');
            $table->timestamps();
        });

        DB::table('forms')->insert([
        'title' => 'Имя',
        'field_name' => 'name',
        'placeholder_form' => 'Введите имя'
        ]);

        DB::table('forms')->insert([
        'title' => 'Телефон',
        'field_name' => 'phone',
        'placeholder_form' => 'Введите номер мобильного телефона'
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('forms')->delete();
        Schema::dropIfExists('forms');
    }
}
