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
        Schema::table('quotation_tradings', function (Blueprint $table): void {
            $table->string('quotation_number')->unique();
            $table->foreignId('customer_trading_id')->constrained()->restrictOnDelete();
            $table->string('customer_name');
            $table->string('customer_company');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->date('quotation_date');
            $table->date('valid_until')->nullable();
            $table->string('status')->default('draft')->index();
            $table->char('currency', 3)->default('IDR');
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount_total', 15, 2)->default(0);
            $table->decimal('tax_total', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2)->default(0);
            $table->text('payment_terms')->nullable();
            $table->text('delivery_terms')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_tradings', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('customer_trading_id');
            $table->dropConstrainedForeignId('created_by');
            $table->dropUnique(['quotation_number']);
            $table->dropIndex(['status']);
            $table->dropColumn([
                'quotation_number',
                'customer_name',
                'customer_company',
                'customer_email',
                'customer_phone',
                'quotation_date',
                'valid_until',
                'status',
                'currency',
                'subtotal',
                'discount_total',
                'tax_total',
                'grand_total',
                'payment_terms',
                'delivery_terms',
                'notes',
            ]);
        });
    }
};
