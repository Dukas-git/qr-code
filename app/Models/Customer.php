<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
	protected $fillable = [
		'handle',
		'owner_id',
	];

	public function owner(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
