<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhSachBdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'danh_sach_bd';

    /**
     * Run the migrations.
     * @table danh_sach_bd
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_tongket');
            $table->unsignedInteger('id_hocki');

            $table->index(["id_hocki"], 'fk_bangdiem_hocki');

            $table->index(["id_tongket"], 'fk_danhsach_tongket');


            $table->foreign('id_hocki', 'fk_bangdiem_hocki')
                ->references('id')->on('hoc_ki')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_tongket', 'fk_danhsach_tongket')
                ->references('id')->on('bang_tong_ket')
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
