<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutomerReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutomer_report', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');;
            $table->integer('quantity');
            $table->softDeletes();
            $table->primary(['sale_id', 'products_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cutomer_report');
    }
}
