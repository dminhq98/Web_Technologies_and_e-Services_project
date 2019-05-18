<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangDiemTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bang_diem';

    /**
     * Run the migrations.
     * @table bang_diem
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_danh_sach_bd');
            $table->unsignedInteger('id_giaovien');
            $table->unsignedInteger('id_mon');

            $table->index(["id_danh_sach_bd"], 'fk_diem_danhsach');

            $table->index(["id_mon"], 'fk_bangdiem_monhoc');

            $table->index(["id_giaovien"], 'fk_bangdiem_giaovien');


            $table->foreign('id_giaovien', 'fk_bangdiem_giaovien')
                ->references('id')->on('giao_vien')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_mon', 'fk_bangdiem_monhoc')
                ->references('id')->on('mon_hoc')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_danh_sach_bd', 'fk_diem_danhsach')
                ->references('id')->on('danh_sach_bd')
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
