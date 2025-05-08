<?php

namespace App\Filament\Pages;

use App\Models\Customer;
use App\Models\User;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

/** @package App\Filament\Pages */
class RegisterCustomer extends RegisterTenant
{
	protected static ?string $navigationIcon = 'heroicon-o-document-text';

	//protected static string $view = 'filament.pages.register-customer';

	public static function getLabel(): string
	{
		return 'Register Customer';
	}

	public function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('handle')
					->label('Subdomain handle'),
				Hidden::make('owner_id')
					->default(auth()->id()),
			]);
	}

	protected function handleRegistration(array $data): User
	{
		/** @var Customer $customer */
		$customer = Customer::create($data);
		$customer->save();
		$this->tenant = $customer;
		return $customer->owner()->getRelated();
	}
}
