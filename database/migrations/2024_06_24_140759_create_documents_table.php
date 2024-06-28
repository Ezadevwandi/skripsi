<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document_no');
            $table->unsignedBigInteger('document_type_id');
            $table->string('upload_path');
            $table->date('date');
            $table->boolean('is_validate')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
