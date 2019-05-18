<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_taikhoan');
            $table->string('ho_ten', 50);
            $table->string('gioi_tinh', 10);
            $table->string('so_dien_thoai', 15);
            $table->string('email', 191);
            $table->string('dia_chi', 100);
            $table->string('image', 100)->nullable()->default(null);
            $table->integer('trang_thai')->default(1);
            $table->index(["id_taikhoan"], 'fk_admin_taikhoan');


            $table->foreign('id_taikhoan', 'fk_admin_taikhoan')
                ->references('id')->on('users')
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
        Schema::dropIfExists('admin');
    }
}
