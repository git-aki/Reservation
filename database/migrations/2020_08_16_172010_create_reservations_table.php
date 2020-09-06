<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('room');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('children');
            $table->timestamps();
        });
    }
    protected $fillable = ['users_id', 'room', 'check_in', 'check_out', 'adults', 'children'];
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
