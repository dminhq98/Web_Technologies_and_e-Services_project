<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhSachGvTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'danh_sach_gv';

    /**
     * Run the migrations.
     * @table danh_sach_gv
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_truong');
            $table->unsignedInteger('id_hocki');

            $table->index(["id_truong"], 'fk_giaovien_truong');

            $table->index(["id_hocki"], 'fk_giaovien_hocki');


            $table->foreign('id_hocki', 'fk_giaovien_hocki')
                ->references('id')->on('hoc_ki')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_truong', 'fk_giaovien_truong')
                ->references('id')->on('truong')
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
