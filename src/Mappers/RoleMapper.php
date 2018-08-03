<?php

namespace Ollieread\Discord\Mappers;

use Ollieread\Discord\Components\Permissions;
use Ollieread\Discord\Entities\Role;
use Ollieread\Discord\Repositories\RoleRepository;
use Sprocketbox\Articulate\Contracts\EntityMapping;
use Sprocketbox\Articulate\Entities\EntityMapper;

class RoleMapper extends EntityMapper
{

    public function entity(): string
    {
        return Role::class;
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
        $mapping->setProvider('discord');
        $mapping->setRepository(RoleRepository::class);

        $mapping->snowflake('id')->setImmutable();
        $mapping->string('name');
        $mapping->int('color');
        $mapping->bool('hoist');
        $mapping->int('position');
        $mapping->component('permissions', Permissions::class);
        $mapping->bool('managed');
        $mapping->bool('mentionable');
    }
}