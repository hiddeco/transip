<?php

namespace TransIP\tests;

use TransIP\Client;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new Client('username', 'privateKey');
    }

    /**
     * @dataProvider apiClassesProvider
     */
    public function testGetApiInstance($apiName, $class)
    {
        $this->assertInstanceOf($class, $this->client->api($apiName));
    }

    /**
     * @dataProvider apiClassesProvider
     */
    public function testGetMagicApiInstance($apiName, $class)
    {
        $this->assertInstanceOf($class, $this->client->$apiName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUndefinedApiInstanceError()
    {
        $this->client->api('error');
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testUndefinedMagicApiInstanceError()
    {
        $this->client->error();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUndefinedModeError()
    {
        new Client('username', 'privateKey', 'invalidMode');
    }

    public function apiClassesProvider()
    {
        return [
            ['colocation', 'TransIP\Api\Colocation'],
            ['colocation_service', 'TransIP\Api\Colocation'],
            ['colocationService', 'TransIP\Api\Colocation'],

            ['domain', 'TransIP\Api\Domain'],
            ['domain_service', 'TransIP\Api\Domain'],
            ['domainService', 'TransIP\Api\Domain'],

            ['forward', 'TransIP\Api\Forward'],
            ['forward_service', 'TransIP\Api\Forward'],
            ['forwardService', 'TransIP\Api\Forward'],

            ['vps', 'TransIP\Api\Vps'],
            ['vps_service', 'TransIP\Api\Vps'],
            ['vpsService', 'TransIP\Api\Vps'],

            ['hosting', 'TransIP\Api\WebHosting'],
            ['web_hosting', 'TransIP\Api\WebHosting'],
            ['webHosting', 'TransIP\Api\WebHosting'],
            ['web_hosting_service', 'TransIP\Api\WebHosting'],
            ['webHostingService', 'TransIP\Api\WebHosting'],
        ];
    }
}
