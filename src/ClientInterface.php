<?php

namespace Yuzu\Awin;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Yuzu\Awin\Http\Response;

interface ClientInterface
{
    public function getClient(): GuzzleClientInterface;
    public function getAccounts(array $options = []): Response;

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmes
     * @param int $publisherId
     * @param array $options
     * @return Http\Response
     */
    public function getProgrammes($publisherId, array $options = []): Response;

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmedetails
     * @param int $publisherId
     * @param array $options
     * @return Response
     */
    public function getProgrammeDetail($publisherId, array $options = []): Response;

    /**
     * @doc http://wiki.awin.com/index.php/API_get_commissiongroups
     * @param int $publisherId
     * @param array $options
     * @return Response
     */
    public function getCommissionGroups($publisherId, array $options = []): Response;

    /**
     * @doc http://wiki.awin.com/index.php/API_get_transactions_list
     * @param int $publisherId
     * @param array $options
     * @return Http\Response
     */
    public function getTransactions($publisherId, array $options = []): Response;
}
