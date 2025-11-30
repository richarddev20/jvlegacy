<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('legacy')->create('account_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('name');
            $table->string('file_path');
            $table->string('file_type')->nullable(); // pdf, image, etc
            $table->integer('file_size')->nullable(); // in bytes
            $table->string('category')->nullable(); // kyc, contract, statement, etc
            $table->text('description')->nullable();
            $table->boolean('is_private')->default(true); // Private to account or shared
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->datetime('created_on')->nullable();
            $table->datetime('updated_on')->nullable();
            $table->boolean('deleted')->default(false);
            
            $table->index('account_id');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::connection('legacy')->dropIfExists('account_documents');
    }
};

