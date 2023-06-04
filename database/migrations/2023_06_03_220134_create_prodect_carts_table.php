<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdectCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodect_carts', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->unsignedBigInteger('product_id');
            $table->string('color', 300);
            $table->string('size', 300);

            $table->foreign('email')->references('email')->on('profiles')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()->cascadeOnUpdate();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodect_carts');
    }
}
