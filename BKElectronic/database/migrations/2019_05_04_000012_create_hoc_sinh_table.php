<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocSinhTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'hoc_sinh';

    /**
     * Run the migrations.
     * @table hoc_sinh
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_danh_sach_hs');
            $table->unsignedInteger('id_taikhoan');
            $table->string('ho_ten', 50);
            $table->string('gioi_tinh', 10);
            $table->string('ngay_sinh', 20);
            $table->string('dia_chi', 100);
            $table->string('image', 155)->nullable()->default(null);

            $table->index(["id_danh_sach_hs"], 'fk_hocsinh_danhsach');

            $table->index(["id_taikhoan"], 'fk_hocsinh_taikhoan');


            $table->foreign('id_danh_sach_hs', 'fk_hocsinh_danhsach')
                ->references('id')->on('danh_sach_hs')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_taikhoan', 'fk_hocsinh_taikhoan')
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
