<?php

namespace Ollieread\Discord;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Ollieread\Discord\Components;
use Ollieread\Discord\Mappers;
use Ollieread\Discord\Respite\DiscordProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot()
    {
        respite()->extend('discord', DiscordProvider::class);

        $this->registerComponents();
        $this->registerEntities();
    }

    private function registerComponents()
    {
        entities()->registerComponent(new Components\PermissionsMapper());
    }

    private function registerEntities(): void
    {
        entities()->registerEntity(new Mappers\GuildMapper);
        entities()->registerEntity(new Mappers\RoleMapper);
        entities()->registerEntity(new Mappers\ChannelMapper);
        entities()->registerEntity(new Mappers\Channel\OverwriteMapper);
    }
}