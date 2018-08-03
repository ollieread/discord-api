<?php

namespace Ollieread\Discord\Repositories;

use Ollieread\Discord\Entities\Channel;
use Ollieread\Discord\Entities\Guild;
use Sprocketbox\Articulate\Contracts\Criteria;
use Sprocketbox\Articulate\Sources\Respite\RespiteRepository;

/**
 * Class ChannelRepository
 *
 * @method \Ollieread\Discord\Entities\Channel getOneByCriteria(Criteria ...$criteria)
 *
 * @package Ollieread\Discord\Repositories
 */
class ChannelRepository extends RespiteRepository
{

    public function getAll($guild)
    {
        $guild = $guild instanceof Guild ? $guild->id : (string) $guild;
        return $this->builder()->get('guilds/{id}/channels', [$guild])->many();
    }

    public function get($id)
    {
        return $this->builder()->get('channels/{id}', [$id])->one();
    }

    /**
     * @param Channel|\Ollieread\Discord\Entities\Channel\Text|\Ollieread\Discord\Entities\Channel\Voice $channel
     *
     * @return null|\Ollieread\Discord\Entities\Channel|\Sprocketbox\Articulate\Entities\Entity
     */
    public function persist($channel)
    {
        if (\get_class($channel) === $this->entity()) {
            $fields = $this->getDirty($channel);

            if (\count($fields)) {
                if ($channel->isPersisted()) {
                    $channel = $this->builder()->patch('channels/{id}', [$channel->id])->body($fields)->one();
                } else {
                    $channel = $this->builder()->post('guilds/{guild}/channels', [$channel->id])->body($fields)->one();
                }

                return $channel;
            }
        }
    }

    public function delete($id)
    {
        $id = $id instanceof Channel ? $id->id : (string) $id;
        $code = $this->builder()->delete('channels/{id}', $id)->code();
        return $code === 204;
    }
}