<?php

namespace Anakinseb\Activitylog\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Anakinseb\Activitylog\ActivitylogPlugin;
use Anakinseb\Activitylog\Resources\ActivitylogResource;
use Filament\Support\Icons\Heroicon;

class ActivitylogRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'description';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return static::$title ?? (string) str(ActivitylogPlugin::get()->getPluralLabel())
            ->kebab()
            ->replace('-', ' ')
            ->headline();
    }

    public function form(Schema $schema): Schema
    {
        return ActivitylogResource::form($schema);
    }

    public function table(Table $table): Table
    {
        return ActivitylogResource::table(
            $table
                ->heading(ActivitylogPlugin::get()->getPluralLabel())
                ->rowActions([
                    Action::make('view')
                        ->icon(Heroicon::OutlinedEye)
                        ->url(fn ($record) => route('activitylogs.view', $record)),
                ])
        );
    }
}
