<?php

namespace Ollieread\Discord\Entities;

use Sprocketbox\Articulate\Entities\Entity;

/**
 * Class Guild
 *
 * @property \Ollieread\Discord\Support\Snowflake      $id                            guild id
 * @property string                                    $name                          guild name (2-100 characters)
 * @property null|string                               $icon                          icon hash
 * @property null|string                               $splash                        splash hash
 * @property null|bool                                 $owner                         whether or not the user is the owner of the guild
 * @property \Ollieread\Discord\Support\Snowflake      $ownerId                       id of owner
 * @property null|integer                              $permissions                   total permissions for the user in the guild (does not include channel overrides)
 * @property string                                    $region                        voice region id for the guild
 * @property null|\Ollieread\Discord\Support\Snowflake $afkChannelId                  id of afk channel
 * @property integer                                   $afkTimeout                    afk timeout in seconds
 * @property null|bool                                 $embedEnabled                  is this guild embeddable (e.g. widget)
 * @property null|\Ollieread\Discord\Support\Snowflake $embedChannelId                id of embedded channel
 * @property integer                                   $verificationLevel             verification level required for the guild
 * @property integer                                   $defaultMessageNotifications   default message notifications level
 * @property integer                                   $explicitContentFilter         explicit content filter level
 * @property array                                     $roles                         roles in the guild
 * @property array                                     $emojis                        custom guild emojis
 * @property array                                     $features                      enabled guild features
 * @property integer                                   $mfaLevel                      required MFA level for the guild
 * @property null|\Ollieread\Discord\Support\Snowflake $applicationId                 application id of the guild creator if it is bot-created
 * @property null|bool                                 $widgetEnabled                 whether or not the server widget is enabled
 * @property null|\Ollieread\Discord\Support\Snowflake $widgetChannelId               the channel id for the server widget
 * @property null|\Ollieread\Discord\Support\Snowflake $systemChannelId               the id of the channel to which system messages are sent
 * @property null|\Carbon\Carbon                       $joinedAt                      when this guild was joined at
 * @property null|bool                                 $large                         whether this is considered a large guild
 * @property null|bool                                 $unavailable                   is this guild unavailable
 * @property null|integer                              $memberCount                   total number of members in this guild
 * @property null|array                                $voiceStates
 * @property null|array                                $members                       users in the guild
 * @property null|array                                $channels                      channels in the guild
 * @property null|array                                $presences                     presences of the users in the guild
 *
 * @package Ollieread\Discord\Entities
 */
class Guild extends Entity
{

}