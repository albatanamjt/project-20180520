<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemoutgoingsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('itemoutgoings', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('item_id');
      $table->unsignedInteger('user_id');

      $table->date('checkoutdate');
      $table->unsignedSmallInteger('quantity');
      $table->decimal('soldprice', 8, 2);
      $table->string('salesinvoice')->nullable();

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('item_id')
            ->references('id')->on('items')
            ->onDelete('cascade');
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('itemoutgoings');
  }
}
