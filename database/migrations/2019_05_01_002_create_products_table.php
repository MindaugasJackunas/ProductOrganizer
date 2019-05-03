<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsTable
 */
class CreateProductsTable extends Migration
{
    private const TABLE_NAME = 'products';

    /**
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->mediumText('description')
                ->nullable();

            $table->index('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
