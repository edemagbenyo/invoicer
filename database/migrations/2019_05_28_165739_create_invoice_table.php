<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceid');
            $table->string('invoiceref');
            $table->date('date');
            $table->text('client');
            $table->text('invoicedetails');
            $table->string('string0')->nullable();
            $table->string('string1')->nullable();
            $table->string('string2')->nullable();
            $table->string('string3')->nullable();
            $table->string('string4')->nullable();
            $table->text('text0')->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->text('text3')->nullable();
            $table->text('text4')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
