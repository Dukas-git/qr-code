<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model implements HasName
{
	/** @use HasFactory<\Database\Factories\CustomerFactory> */
	use HasFactory;

	public function users(): HasMany
	{
		return $this->hasMany(User::class);
	}

	public function getFilamentName(): string
	{
		return $this->domain;
	}
}
