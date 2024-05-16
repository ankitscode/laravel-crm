<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->integer('file_size')->nullable();
            $table->string('name');
            $table->string('thumbnail_name');
            $table->timestamp('deleted_at');
            $table->string('created_by');
            $table->string('updated_by');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
