<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('icon1');
            $table->string('icon1_img');
            $table->mediumText('icon1_popover');
            $table->string('icon2');
            $table->string('icon2_img');
            $table->mediumText('icon2_popover');
            $table->string('icon3');
            $table->string('icon3_img');
            $table->mediumText('icon3_popover');
            $table->string('icon4');
            $table->string('icon4_img');
            $table->mediumText('icon4_popover');
            $table->string('icon5');
            $table->string('icon5_img');
            $table->mediumText('icon5_popover');
            $table->string('icon6');
            $table->string('icon6_img');
            $table->mediumText('icon6_popover');
            $table->string('icon7');
            $table->string('icon7_img');
            $table->mediumText('icon7_popover');
            $table->string('icon8');
            $table->string('icon8_img');
            $table->mediumText('icon8_popover');
            $table->string('icon9');
            $table->string('icon9_img');
            $table->mediumText('icon9_popover');
            $table->string('icon10');
            $table->string('icon10_img');
            $table->mediumText('icon10_popover');
            $table->string('icon11');
            $table->string('icon11_img');
            $table->mediumText('icon11_popover');
            $table->string('icon12');
            $table->string('icon12_img');
            $table->mediumText('icon12_popover');
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
        Schema::dropIfExists('sections');
    }
}
