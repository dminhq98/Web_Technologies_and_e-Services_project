<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_day', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_giaovien');
            $table->unsignedInteger('id_lop');
            $table->unsignedInteger('id_hocki');
            $table->timestamps();
            $table->index(["id_giaovien"], 'fk_lopday_giaovien');
            $table->index(["id_lop"], 'fk_lopday_lop');
            $table->index(["id_hocki"], 'fk_lopday_hocki');
            $table->foreign('id_giaovien', 'fk_lopday_giaovien')
                ->references('id')->on('giao_vien')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('id_lop', 'fk_lopday_lop')
                ->references('id')->on('lop_hoc')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('id_hocki', 'fk_lopday_hocki')
                ->references('id')->on('hoc_ki')
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
        Schema::dropIfExists('lop_day');
    }
}
