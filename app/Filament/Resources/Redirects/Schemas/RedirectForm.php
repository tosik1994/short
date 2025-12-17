<?php

namespace App\Filament\Resources\Redirects\Schemas;

use App\Models\Redirect;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RedirectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('alias')
                    ->default(fn() => Redirect::generateUniqueAlias())
                    ->rules(['required', 'string', 'max:4'])
                    ->unique(Redirect::class, 'alias')
                    ->required(),
                TextInput::make('redirect_to')
                    ->required(),
                Checkbox::make('is_active')
                    ->label('Active'),
                Textarea::make('description')
            ]);
    }
}
