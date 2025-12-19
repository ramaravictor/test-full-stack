<?php

namespace App\Filament\Resources\Reseps\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Form as ComponentsForm;
use Livewire\Attributes\Rule;

class ResepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('nama_resep')
                    ->required(),
                CheckboxList::make('bahans')
                    ->relationship('bahans', 'nama_bahan')
                    ->label('Bahan')
                    ->columns(2)
                    ->required()
                    ->options(
                        fn () => \App\Models\Bahan::all()->pluck('nama_bahan', 'id')
                    )
                    ->getOptionDescriptionFromRecordUsing(
                        fn ($record) => 'Jumlah: ' . $record->jumlah . ' Satuan: ' . $record->satuan
                    )
                    ->searchable()
                    ->reactive(),
                Textarea::make('instruksi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
