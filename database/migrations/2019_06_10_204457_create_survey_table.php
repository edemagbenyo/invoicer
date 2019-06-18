<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surveyid');
            $table->string('name');
            // $table->string('premise_name');
            // $table->string('premise_address');
            // $table->string('contact_name');
            // $table->string('fao');
            // $table->text('re');
            // $table->double('price',10,2);
            // $table->string('schedule');
            // $table->string('scope');
            // $table->string('terms');
            // $table->string('validity');
            // $table->text('observation')->nullable();
            // $table->text('conclusion')->nullable();
            // $table->date('workdate');
            // $table->string('report_by');
            $table->text('photographs');
            $table->text('details');
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
        Schema::dropIfExists('surveys');
    }
}
