<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangDiemc1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bang_diemc1', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_hocsinh');
            $table->unsignedInteger('id_giaovien');
            $table->unsignedInteger('id_mon');
            $table->timestamps();
            $table->index(["id_hocsinh"], 'fk_hocsinh_bangdiemc1');
            $table->index(["id_giaovien"], 'fk_giaovien_bangdiemc1');
            $table->index(["id_mon"], 'fk_mon_bangdiemc1');
            $table->foreign('id_hocsinh', 'fk_hocsinh_bangdiemc1')
                ->references('id')->on('hoc_sinh')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('id_giaovien', 'fk_giaovien_bangdiemc1')
                ->references('id')->on('giao_vien')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('id_mon', 'fk_mon_bangdiemc1')
                ->references('id')->on('mon_hoc')
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
        Schema::dropIfExists('bang_diemc1');
    }
}
