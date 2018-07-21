<?php

namespace Ollieread\Discord;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Ollieread\Discord\Mappers\GuildMapper;
use Ollieread\Discord\Respite\DiscordProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot()
    {
        respite()->extend('discord', DiscordProvider::class);

        $this->registerEntities();
    }

    public function registerEntities(): void
    {
        entities()->registerEntity(new GuildMapper());
    }
}