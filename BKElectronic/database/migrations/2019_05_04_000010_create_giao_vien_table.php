<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaoVienTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'giao_vien';

    /**
     * Run the migrations.
     * @table giao_vien
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_danh_sach_gv');
            $table->unsignedInteger('id_mon')->nullable()->default(null);
            $table->unsignedInteger('id_taikhoan');
            $table->string('ho_ten', 50);
            $table->string('gioi_tinh', 10);
            $table->string('so_dien_thoai', 15);
            $table->string('email', 191);
            $table->string('ngay_sinh', 20);
            $table->string('dia_chi', 100);
            $table->string('chuc_vu', 100)->nullable()->default(null);
            $table->string('image', 100)->nullable()->default(null);

            $table->index(["id_danh_sach_gv"], 'fk_giaovien_danhsach');

            $table->index(["id_taikhoan"], 'fk_giaovien_taikhoan');

            $table->index(["id_mon"], 'fk_giaovien_monhoc');


            $table->foreign('id_danh_sach_gv', 'fk_giaovien_danhsach')
                ->references('id')->on('danh_sach_gv')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_mon', 'fk_giaovien_monhoc')
                ->references('id')->on('mon_hoc')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_taikhoan', 'fk_giaovien_taikhoan')
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
       Schema::dropIfExists($this->tableName);
     }
}
