<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('timeout');
            $table->string('adress');
            $table->string('regency');
            $table->string('province');
            $table->bigInteger('total');
            $table->bigInteger('shipping_cost');
            $table->bigInteger('sub_total');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('courier_id')->constrained('couriers')->onDelete('cascade');
            $table->string('proof_of_payment')->nullable();
            $table->enum('status',['Terverifikasi','Menunggu verifikasi','Dibatalkan','Expired','Dalam perjalanan','Sampai di tujuan']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
