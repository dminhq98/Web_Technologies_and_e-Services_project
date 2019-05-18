<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiuaKiC1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giua_ki_c1', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_bangdiemc1');
            $table->string('muc_do', 10)->nullable()->default(null);
            $table->unsignedInteger('diem')->nullable()->default(null);
            $table->text('nhan_xet')->nullable()->default(null);
            $table->index(["id_bangdiemc1"], 'fk_giuakic1_bangdiemc1');
            $table->foreign('id_bangdiemc1', 'fk_giuakic1_bangdiemc1')
                ->references('id')->on('bang_diemc1')
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
        Schema::dropIfExists('giua_ki_c1');
    }
}
