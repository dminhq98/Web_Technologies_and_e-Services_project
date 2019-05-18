<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruongTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'truong';

    /**
     * Run the migrations.
     * @table truong
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ten_truong', 100);
            $table->integer('level');
            $table->string('dia_chi', 100);
            $table->integer('trang_thai')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
