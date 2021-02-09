<?php

namespace Yuzu\Awin;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Yuzu\Awin\Http\Response;
use Yuzu\Awin\Request\GetAccountDefinition;
use Yuzu\Awin\Request\GetCommissionGroupsDefinition;
use Yuzu\Awin\Request\GetProgrammeDetailDefinition;
use Yuzu\Awin\Request\GetProgrammesDefinition;
use Yuzu\Awin\Request\GetTransactionsDefinition;
use Yuzu\Awin\Request\RequestDefinitionInterface;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class Client implements ClientInterface
{
    public const AWIN_API_ENDPOINT = 'https://api.awin.com';

    /** @var string $apiToken */
    private $apiToken;

    protected $httpClient;

    /**
     * Constructor.
     * @param string $apiToken
     */
    public function __construct(string $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function getClient(): GuzzleClientInterface
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new GuzzleClient([
                'base_uri' => self::AWIN_API_ENDPOINT,
                'headers' => ['Authorization' => sprintf('Bearer %s', $this->apiToken)]
            ]);
        }

        return $this->httpClient;
    }

    private function send(RequestDefinitionInterface $definition): Response
    {
        $response = $this->getClient()->request(
            $definition->getMethod(),
            $definition->getUrl(),
            [
                'body' => json_encode($definition->getBody())
            ]
        );

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_accounts
     * @param array $options
     * @return Response
     */
    public function getAccounts(array $options = []): Response
    {
        return $this->send(new GetAccountDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmes
     * @param int $publisherId
     * @param array $options
     * @return Http\Response
     */
    public function getProgrammes($publisherId, array $options = []): Response
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetProgrammesDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmedetails
     * @param int $publisherId
     * @param array $options
     * @return Response
     */
    public function getProgrammeDetail($publisherId, array $options = []): Response
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetProgrammeDetailDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_commissiongroups
     * @param int $publisherId
     * @param array $options
     * @return Response
     */
    public function getCommissionGroups($publisherId, array $options = []): Response
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetCommissionGroupsDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_transactions_list
     * @param int $publisherId
     * @param array $options
     * @return Http\Response
     */
    public function getTransactions($publisherId, array $options = []): Response
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetTransactionsDefinition($options));
    }
}
