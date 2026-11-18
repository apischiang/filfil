<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quotation_tradings', function (Blueprint $table): void {
            $table->string('public_token', 64)->nullable();
        });

        DB::table('quotation_tradings')
            ->whereNull('public_token')
            ->orderBy('id')
            ->chunkById(100, function ($quotations): void {
                foreach ($quotations as $quotation) {
                    DB::table('quotation_tradings')
                        ->where('id', $quotation->id)
                        ->update(['public_token' => Str::random(48)]);
                }
            });

        Schema::table('quotation_tradings', function (Blueprint $table): void {
            $table->unique('public_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_tradings', function (Blueprint $table): void {
            $table->dropUnique(['public_token']);
            $table->dropColumn('public_token');
        });
    }
};
