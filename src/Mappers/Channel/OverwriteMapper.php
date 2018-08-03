<?php

namespace Ollieread\Discord\Mappers\Channel;

use Ollieread\Discord\Components\Permissions;
use Ollieread\Discord\Entities\Channel\Overwrite;
use Sprocketbox\Articulate\Contracts\ComponentMapping;
use Sprocketbox\Articulate\Contracts\EntityMapping;
use Sprocketbox\Articulate\Entities\EntityMapper;

class OverwriteMapper extends EntityMapper
{

    public function entity(): string
    {
        return Overwrite::class;
    }

    public function source(): string
    {
        return 'respite';
    }

    /**
     * @param \Sprocketbox\Articulate\Contracts\EntityMapping|\Sprocketbox\Articulate\Sources\Respite\RespiteEntityMapping $mapping
     */
    public function map(EntityMapping $mapping)
    {
        $mapping->setKey('id');

        $permissionMapping = function (ComponentMapping $mapping) {
            $mapping->int('allow');
        };

        $mapping->snowflake('id');
        $mapping->string('type');
        $mapping->component('allow', Permissions::class)
                ->setCustomMapping($permissionMapping);
        $mapping->component('deny', Permissions::class)
                ->setCustomMapping($permissionMapping);
    }
}