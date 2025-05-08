<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditCustomerProfile extends EditTenantProfile
{
	protected static ?string $navigationIcon = 'heroicon-o-document-text';

	public static function getLabel(): string
	{
		return 'Customer profile';
	}

	public function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('name'),
			]);
	}
}
