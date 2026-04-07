<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->string('ticket_number')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('ticket_categories')->restrictOnDelete();
            $table->foreignId('equipment_item_id')->nullable()->constrained('equipment_items')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->enum('status', ['new', 'in_progress', 'pending', 'resolved', 'closed', 'cancelled'])->default('new');
            $table->string('telegram_chat_link')->nullable();
            $table->string('max_chat_link')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->unsignedTinyInteger('user_rating')->nullable(); // 1-5
            $table->text('user_feedback')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
{
    Schema::table('tickets', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}
};
