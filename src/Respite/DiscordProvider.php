<?php

namespace Ollieread\Discord\Respite;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Sprocketbox\Respite\Providers\OAuth2Provider;
use Sprocketbox\Respite\Request\Builder;

class DiscordProvider extends OAuth2Provider
{
    /**
     * Return a fresh HTTP client.
     *
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return new Client([
            'base_uri' => $this->config['base_url'] ?? '',
        ]);
    }

    /**
     * Return an array of headers for the HTTP requests.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        $headers = [
            'User-Agent'    => 'DiscordAPI (https://github.com/ollieread/api-discord, 1)',
            'Content-Type'  => 'application/json',
        ];

        if ($this->config['bot'] ?? false) {
            $prefix = 'Bot';
        } else {
            $prefix = 'Bearer';
        }

        $headers['Authorization'] = $prefix . ' ' . $this->accessToken;

        return $headers;
    }
}