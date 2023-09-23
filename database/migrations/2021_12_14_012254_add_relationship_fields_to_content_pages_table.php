<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_pages', function (Blueprint $table) {
            $table->unsignedBigInteger('content_categories_id');
            $table->foreign('content_categories_id', 'content_categories_fk_5267222')->references('id')->on('content_categories');
        });
    }
}
