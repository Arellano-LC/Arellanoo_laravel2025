<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('original_filename');
            $table->string('filename');
            $table->string('type');
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamps();
    
            // Foreign key constraint
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
};
