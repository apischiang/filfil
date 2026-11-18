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
        Schema::table('customer_tradings', function (Blueprint $table) {
            $table->string('uniqueID', 10)->unique();
            $table->string('name');
            $table->string('company');
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable();
            $table->string('logo')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status', 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_tradings', function (Blueprint $table) {
            $table->dropColumn([
                'uniqueID',
                'name',
                'company',
                'email',
                'phone',
                'logo',
                'notes',
                'status',
            ]);
        });
    }
};
