<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocKiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'hoc_ki';

    /**
     * Run the migrations.
     * @table hoc_ki
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('hoc_ki');
            $table->unsignedInteger('id_namhoc');

            $table->index(["id_namhoc"], 'fk_hocki_namhoc');


            $table->foreign('id_namhoc', 'fk_hocki_namhoc')
                ->references('id')->on('nam_hoc')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
