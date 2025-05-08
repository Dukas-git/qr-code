<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property string $name
 */
class Superadmin extends Authenticatable implements FilamentUser, HasName
{
	use HasRoles;

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	public function canAccessPanel(Panel $panel): bool
	{
		return $this->hasRole('superadmin');
	}

	public function getFilamentName(): string
	{
		return $this->name;
	}
}
