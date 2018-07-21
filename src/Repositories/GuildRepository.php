<?php

namespace Ollieread\Discord\Repositories;

use Sprocketbox\Articulate\Sources\Respite\RespiteRepository;
use Sprocketbox\Articulate\Support\Collection;

class GuildRepository extends RespiteRepository
{
    /**
     * @return \Sprocketbox\Articulate\Support\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): Collection
    {
        $results = $this->builder()->get('users/@me/guilds')->contents();
    }

    public function get(string $id)
    {
        return $this->getOne($this->builder()->get('guilds/{id}', [$id]));
    }
}