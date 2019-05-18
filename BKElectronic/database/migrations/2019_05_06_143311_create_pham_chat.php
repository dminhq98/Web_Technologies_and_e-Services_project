<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhamChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pham_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_hocsinh');
            $table->unsignedInteger('id_giaovien');
            $table->string('muc_do1', 10)->nullable()->default(null);
            $table->string('muc_do2', 10)->nullable()->default(null);
            $table->string('muc_do3', 10)->nullable()->default(null);
            $table->string('muc_do4', 10)->nullable()->default(null);
            $table->text('nhan_xet')->nullable()->default(null);
            $table->index(["id_hocsinh"], 'fk_phamchat_hocsinh');
            $table->foreign('id_hocsinh', 'fk_phamchat_hocsinh')
                ->references('id')->on('hoc_sinh')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->index(["id_giaovien"], 'fk_phamchat_giaovien');
            $table->foreign('id_giaovien', 'fk_phamchat_giaovien')
                ->references('id')->on('giao_vien')
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
        Schema::dropIfExists('pham_chat');
    }
}
