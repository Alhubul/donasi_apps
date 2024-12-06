<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;
use App\Filament\Resources\DonorResource\Pages;

class DonorResource extends Resource
{
    // Tidak menggunakan model karena menggunakan API
    protected static ?string $model = null;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone_number')->required(),
                Forms\Components\Textarea::make('address')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('name')->label('Name'),
            Tables\Columns\TextColumn::make('email')->label('Email'),
            Tables\Columns\TextColumn::make('phone_number')->label('Phone Number'),
            Tables\Columns\TextColumn::make('address')->label('Address'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(), // Tambahkan ini untuk tombol Create
        ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDonors::route('/'),
        ];
    }
}
