<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reportid');
            $table->string('name');
            // $table->date('workdate');
            // $table->string('premise_name')->nullable();
            // $table->string('premise_address')->nullable();
            // $table->string('contact_name')->nullable();
            // $table->text('observation')->nullable();
            // $table->text('conclusion')->nullable();
            $table->text('photographs')->nullable();
            $table->text('details')->nullable();
            $table->text('details0')->nullable();
            $table->text('details1')->nullable();
            $table->text('details2')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
