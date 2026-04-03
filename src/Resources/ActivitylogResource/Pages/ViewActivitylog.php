<?php

namespace Anakinseb\Activitylog\Resources\ActivitylogResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use Anakinseb\Activitylog\Resources\ActivitylogResource;

class ViewActivitylog extends ViewRecord
{
    public static function getResource(): string
    {
        return ActivitylogResource::class;
    }
}
