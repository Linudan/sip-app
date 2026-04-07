<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment_items', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->foreignId('category_id')->constrained('equipment_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('inventory_number')->nullable()->unique();
            $table->string('serial_number')->nullable()->unique();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->json('specifications')->nullable();
            $table->enum('status', ['in_use', 'in_stock', 'in_repair', 'written_off'])->default('in_stock');
            $table->date('purchase_date')->nullable();
            $table->date('warranty_until')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->foreignId('current_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->string('qr_code_hash')->nullable()->unique();
            $table->timestamps();
        });
    }

    public function down(): void
{
    Schema::table('equipment_items', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}
};
