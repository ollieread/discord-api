<?php

namespace Ollieread\Discord\Mappers;

use Ollieread\Discord\Entities\Guild;
use Ollieread\Discord\Repositories\GuildRepository;
use Sprocketbox\Articulate\Contracts\EntityMapping;
use Sprocketbox\Articulate\Entities\EntityMapper;

class GuildMapper extends EntityMapper
{

    public function entity(): string
    {
        return Guild::class;
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
        $mapping->setProvider('api-discord');
        $mapping->setRepository(GuildRepository::class);

        $mapping->snowflake('id');
        $mapping->string('name');
        $mapping->string('icon');
        $mapping->string('splash');
        $mapping->bool('owner');
        $mapping->snowflake('ownerId');
        $mapping->int('permissions');
        $mapping->string('region');
        $mapping->snowflake('afk_channel_id')->setDefault(null);
        $mapping->int('afk_timeout');
        $mapping->bool('embedEnabled');
        $mapping->snowflake('embed_channel_id');
        $mapping->int('verification_level');
        $mapping->int('default_mMessage_notifications');
        $mapping->int('explicit_content_filter');
        $mapping->array('roles');//('roles', Role::class, true);
        $mapping->array('emojis');//entity('emojis', Emoji::class, true);
        $mapping->array('features');
        $mapping->int('mfa_level');
        $mapping->snowflake('application_id')->setDefault(null);
        $mapping->bool('widget_enabled');
        $mapping->snowflake('widget_channel_id')->setDefault(null);
        $mapping->snowflake('system_channel_id')->setDefault(null);
        $mapping->timestamp('joined_at', 'c');
        $mapping->bool('large');
        $mapping->bool('unavailable');
        $mapping->int('member_count');
        $mapping->array('voice_states')->setDefault(null);
        $mapping->array('members')->setDefault(null);
        $mapping->array('channels')->setDefault(null);
        $mapping->array('presences')->setDefault(null);
    }
}