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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploaded_user_id')->nullable();
            $table->foreign('uploaded_user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('attachmentable_id');
            $table->string('attachmentable_type');
            $table->string('url');
            $table->string('state');
            $table->string('label');
            $table->string('file');
            $table->string('content_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
