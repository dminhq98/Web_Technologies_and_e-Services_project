<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangTongKetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bang_tong_ket';

    /**
     * Run the migrations.
     * @table bang_tong_ket
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_hocsinh')->nullable();
            $table->string('hoc_luc', 40)->nullable();
            $table->double('diem_phay_cuoi')->nullable();
            $table->string('hanh_kiem', 40)->nullable();
            $table->text('nhan_xet')->nullable()->default(null);
            $table->index(["id_hocsinh"], 'fk_tongket_hocsinh');


            $table->foreign('id_hocsinh', 'fk_tongket_hocsinh')
                ->references('id')->on('hoc_sinh')
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
