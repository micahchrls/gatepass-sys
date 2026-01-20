<?php

namespace App\Filament\Resources\Gatepasses;

use App\Filament\Resources\Gatepasses\Pages\CreateGatepass;
use App\Filament\Resources\Gatepasses\Pages\EditGatepass;
use App\Filament\Resources\Gatepasses\Pages\ListGatepasses;
use App\Filament\Resources\Gatepasses\Schemas\GatepassForm;
use App\Filament\Resources\Gatepasses\Tables\GatepassesTable;
use App\Models\Gatepass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GatepassResource extends Resource
{
    protected static ?string $model = Gatepass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;

    protected static string|\UnitEnum|null $navigationGroup = 'Gatepass Management';

    protected static ?string $recordTitleAttribute = 'Gatepass';

    public static function form(Schema $schema): Schema
    {
        return GatepassForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GatepassesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGatepasses::route('/'),
            'create' => CreateGatepass::route('/create'),
            'edit' => EditGatepass::route('/{record}/edit'),
        ];
    }
}
