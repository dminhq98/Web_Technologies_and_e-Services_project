<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeSo1Table extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'he_so1';

    /**
     * Run the migrations.
     * @table he_so1
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_bangdiem');
            $table->double('diem')->nullable()->default(null);

            $table->index(["id_bangdiem"], 'fk_heso1_bangdiem');


            $table->foreign('id_bangdiem', 'fk_heso1_bangdiem')
                ->references('id')->on('bang_diem')
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
