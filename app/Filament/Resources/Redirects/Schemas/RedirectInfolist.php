<?php

namespace App\Filament\Resources\Redirects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RedirectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('alias')
                    ->formatStateUsing(fn($record) => route('redirect', ['redirect' => $record->alias])),

                TextEntry::make('redirect_to'),
                TextEntry::make('description'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
