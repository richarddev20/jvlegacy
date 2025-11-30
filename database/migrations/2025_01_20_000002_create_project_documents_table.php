<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('legacy')->create('project_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Internal project id
            $table->string('name');
            $table->string('file_path');
            $table->string('file_type')->nullable(); // pdf, image, etc
            $table->integer('file_size')->nullable(); // in bytes
            $table->string('category')->nullable(); // general, design, drawing, map, etc
            $table->text('description')->nullable();
            $table->boolean('show_to_investors')->default(true);
            $table->boolean('is_public')->default(false);
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->datetime('created_on')->nullable();
            $table->datetime('updated_on')->nullable();
            $table->boolean('deleted')->default(false);
            
            $table->index('project_id');
            $table->index('category');
            $table->index('show_to_investors');
        });
    }

    public function down(): void
    {
        Schema::connection('legacy')->dropIfExists('project_documents');
    }
};

