<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onUpdate('cascade') ->onDelete('restrict');
            $table->char('kd_menu', 11);
            $table->char('nama_menu', 128);
            $table->string('keterangan');
            $table->char('hpp', 11)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
