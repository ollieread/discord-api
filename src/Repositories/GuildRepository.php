<?php
/** @noinspection CallableParameterUseCaseInTypeContextInspection */
/** @noinspection PhpIncompatibleReturnTypeInspection */

namespace Ollieread\Discord\Repositories;

use Ollieread\Discord\Entities\Guild;
use Sprocketbox\Articulate\Contracts\Criteria;
use Sprocketbox\Articulate\Sources\Respite\RespiteRepository;

/**
 * Class GuildRepository
 *
 * @method \Ollieread\Discord\Entities\Guild getOneByCriteria(Criteria ...$criteria)
 *
 * @package Ollieread\Discord\Repositories
 */
class GuildRepository extends RespiteRepository
{

    /**
     * Get all Guilds for the current user
     *
     * @return \Sprocketbox\Articulate\Support\Collection
     */
    public function getAll()
    {
        return $this->builder()->get('users/@me/guilds')->many();
    }
    /**
     * Get a Guild identified by the provided id
     *
     * @param string|\Ollieread\Discord\Support\Snowflake $id
     *
     * @return null|\Ollieread\Discord\Entities\Guild
     */
    public function get($id)
    {
        return $this->builder()->get('guilds/{id}', [$id])->one();
    }

    /**
     * Create or update a Guild
     *
     * @param \Ollieread\Discord\Entities\Guild $guild
     *
     * @return null|\Ollieread\Discord\Entities\Guild|\Sprocketbox\Articulate\Entities\Entity
     */
    public function persist(Guild $guild)
    {
        if (\get_class($guild) === $this->entity()) {
            $fields = $this->getDirty($guild);

            if (\count($fields)) {
                if ($guild->isPersisted()) {
                    $guild = $this->builder()->patch('guilds/{id}', [$guild->id])->body($fields)->one();
                } else {
                    $guild = $this->builder()->post('guilds')->body($fields)->one();
                }

                return $guild;
            }
        }
    }

    /**
     * Delete a Guild
     *
     * @param string|\Ollieread\Discord\Entities\Guild|\Ollieread\Discord\Support\Snowflake $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $id = $id instanceof Guild ? $id->id : (string) $id;
        $code = $this->builder()->delete('guilds/{id}', $id)->code();
        return $code === 204;
    }
}