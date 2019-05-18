<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhSachHsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'danh_sach_hs';

    /**
     * Run the migrations.
     * @table danh_sach_hs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_giaovien')->nullable()->default(null);
            $table->unsignedInteger('id_lop');
            $table->unsignedInteger('id_hocki');

            $table->index(["id_giaovien"], 'fk_hocsinh_giaovien');

            $table->index(["id_hocki"], 'fk_hocsinh_hocki');

            $table->index(["id_lop"], 'fk_hocsinh_lop');


            $table->foreign('id_giaovien', 'fk_hocsinh_giaovien')
                ->references('id')->on('giao_vien')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_hocki', 'fk_hocsinh_hocki')
                ->references('id')->on('hoc_ki')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_lop', 'fk_hocsinh_lop')
                ->references('id')->on('lop_hoc')
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
