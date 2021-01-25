<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distribution_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->timestamps();

            $table->foreign('distribution_id')
                ->references('id')
                ->on('distributions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_distributions');
    }
}
