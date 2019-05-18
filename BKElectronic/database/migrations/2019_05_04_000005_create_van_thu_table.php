<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanThuTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'van_thu';

    /**
     * Run the migrations.
     * @table van_thu
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_truong');
            $table->unsignedInteger('id_taikhoan');
            $table->string('ho_ten', 50);
            $table->string('gioi_tinh', 10);
            $table->string('so_dien_thoai', 15);
            $table->string('email', 191);
            $table->string('dia_chi', 100);
            $table->string('image', 100)->nullable()->default(null);
            $table->integer('trang_thai')->default(1);

            $table->index(["id_taikhoan"], 'fk_vanthu_taikhoan');

            $table->index(["id_truong"], 'fk_vanthu_truong');


            $table->foreign('id_taikhoan', 'fk_vanthu_taikhoan')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_truong', 'fk_vanthu_truong')
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
