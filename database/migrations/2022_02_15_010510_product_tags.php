<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("product_tag", function (Blueprint $table) {
            $table->unsignedInteger("product_id");
            $table->foreign("product_id")
                ->references("id")
                ->on("product")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedInteger("tag_id");
            $table->foreign("tag_id")
                ->references("id")
                ->on("tag")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
