<?php

namespace Ollieread\Discord\Mappers;

use Ollieread\Discord\Entities\Channel;
use Ollieread\Discord\Repositories\ChannelRepository;
use Sprocketbox\Articulate\Contracts\EntityMapping;
use Sprocketbox\Articulate\Entities\EntityMapper;

class ChannelMapper extends EntityMapper
{

    protected const TEXT     = 0;
    protected const DM       = 1;
    protected const VOICE    = 2;
    protected const GROUP_DM = 3;
    protected const CATEGORY = 4;

    public function entity(): string
    {
        return Channel::class;
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
        $mapping->setRepository(ChannelRepository::class);

        $mapping
            ->setChildClasses(Channel\Text::class, Channel\DM::class, Channel\Voice::class, Channel\Category::class)
            ->setMultipleInheritance(function (array $data) {
                switch ((int)$data['type']) {
                    case self::TEXT:
                        return Channel\Text::class;
                    case self::DM:
                        return Channel\DM::class;
                    case self::VOICE:
                        return Channel\Voice::class;
                    case self::GROUP_DM:
                        return Channel\DM::class;
                    case self::CATEGORY:
                        return Channel\Category::class;
                }

                return Channel::class;
            });

        $mapping->snowflake('id')->setImmutable();
        $mapping->int('type')->setImmutable();
        $mapping->snowflake('guild_id')->for(Channel\Voice::class, Channel\Text::class, Channel\Category::class);
        $mapping->int('position')->for(Channel\Voice::class, Channel\Text::class, Channel\Category::class);
        $mapping->entity('permission_overwrites', Channel\Overwrite::class, true)->belongsTo(Channel\Voice::class, Channel\Text::class);
        $mapping->string('name');
        $mapping->string('topic')->for(Channel\Text::class);
        $mapping->bool('nsfw')->for(Channel\Voice::class, Channel\Text::class);
        $mapping->snowflake('last_message_id')->for(Channel\Text::class, Channel\DM::class);
        $mapping->int('bitrate')->for(Channel\Voice::class);
        $mapping->int('user_limit')->for(Channel\Voice::class);
        $mapping->array('recipients')->for(Channel\DM::class);
        $mapping->string('icon');
        $mapping->snowflake('owner_id')->for(Channel\DM::class);
        $mapping->snowflake('application_id');
        $mapping->snowflake('parent_id')->for(Channel\Voice::class, Channel\Text::class, Channel\Category::class);
        $mapping->timestamp('last_pin_timestamp', 'c')->setImmutable()->for(Channel\Text::class);
    }
}