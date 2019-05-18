<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongBaoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'thong_bao';

    /**
     * Run the migrations.
     * @table thong_bao
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tieu_de');
            $table->string('tom_tat');
            $table->longText('noi_dung');
            $table->string('image')->nullable()->default(null);
            $table->unsignedInteger('id_vanthu');
            $table->unsignedInteger('id_truong');
            $table->unsignedInteger('so_luot_xem')->default('0');
            $table->timestamps();
            $table->index(["id_vanthu"], 'fk_thongbao_vanthu');
            $table->index(["id_truong"], 'fk_thongbao_truong');

            $table->foreign('id_vanthu', 'fk_thongbao_vanthu')
                ->references('id')->on('van_thu')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('id_truong', 'fk_thongbao_truong')
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
