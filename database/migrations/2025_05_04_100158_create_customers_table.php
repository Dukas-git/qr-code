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
		Schema::create('customers', function (Blueprint $table) {
			$table->id();
			$table->string('domain', 255)->unique();
			$table->string('filesystem_path', 255)->unique();
			$table->timestamps();
		});
		Schema::create('customer_user', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->foreignId('customer_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('customer_user');
		Schema::dropIfExists('customers');
	}
};
