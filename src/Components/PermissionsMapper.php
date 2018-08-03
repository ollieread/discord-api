<?php

namespace Ollieread\Discord\Components;

use Sprocketbox\Articulate\Components\ComponentMapper;
use Sprocketbox\Articulate\Components\ComponentMapping;

class PermissionsMapper extends ComponentMapper
{

    public function component(): string
    {
        return Permissions::class;
    }

    public function map(ComponentMapping $mapping)
    {
        $mapping->int('permissions');
    }
}