<?php

namespace App\Filament\Pages;

use App\Models\Customer;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

/** @package App\Filament\Pages */
class RegisterCustomer extends RegisterTenant
{
	protected static ?string $navigationIcon = 'heroicon-o-document-text';

	protected static string $view = 'filament.pages.register-customer';

	public static function getLabel(): string
	{
		return 'Register Customer';
	}

	public function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('name'),
				TextInput::make('handle'),
			]);
	}

	protected function handleRegistration(array $data): Customer
	{
		$customer = Customer::create($data);

		$customer->members()->attach(auth()->user());

		return $customer;
	}
}
