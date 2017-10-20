<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tickets',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('body');
                $table->string('image')->nullable();
                $table->integer('user_id');
                $table->integer('status_id');
                $table->timestamps();
            }
        );

        Schema::create(
            'category_ticket',
            function (Blueprint $table) {
                $table->integer('category_id')->unsigned()->index();
                $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

                $table->integer('ticket_id')->unsigned()->index();
                $table->foreign('ticket_id')
                    ->references('id')
                    ->on('tickets')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('category_ticket');
    }
}
