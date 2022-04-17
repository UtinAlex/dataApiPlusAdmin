<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('pages')->delete();
        
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->string('data_pages')->nullable()->comment('Содержание поля');
            $table->string('pages_uid')->nullable()->comment('id страницы');
        });

        for ($i = 1; $i <= 10; $i++) {
            DB::table('pages')->insert([
            'data_pages' => 'Иван ' . $i,
            'pages_uid' => '1'
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
        DB::table('pages')->delete();

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('data_pages')->nullable()->comment('Содержание поля');
            $table->dropColumn('pages_uid')->nullable()->comment('id страницы');
            $table->string('name')->nullable()->comment('Имя');
            $table->string('phone')->nullable()->comment('Телефон');
        });

        for ($i = 1; $i <= 10; $i++) {
            DB::table('pages')->insert([
            'name' => 'Иван ' . $i,
            'phone' => '777-' .  $i,
            ]);
        }
    }
}
