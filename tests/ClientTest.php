<?php

namespace HiddeCo\TransIP\tests;

use HiddeCo\TransIP\Client;

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
            ['colocation', 'HiddeCo\TransIP\Api\Colocation'],
            ['colocation_service', 'HiddeCo\TransIP\Api\Colocation'],
            ['colocationService', 'HiddeCo\TransIP\Api\Colocation'],

            ['domain', 'HiddeCo\TransIP\Api\Domain'],
            ['domain_service', 'HiddeCo\TransIP\Api\Domain'],
            ['domainService', 'HiddeCo\TransIP\Api\Domain'],

            ['forward', 'HiddeCo\TransIP\Api\Forward'],
            ['forward_service', 'HiddeCo\TransIP\Api\Forward'],
            ['forwardService', 'HiddeCo\TransIP\Api\Forward'],

            ['vps', 'HiddeCo\TransIP\Api\Vps'],
            ['vps_service', 'HiddeCo\TransIP\Api\Vps'],
            ['vpsService', 'HiddeCo\TransIP\Api\Vps'],

            ['hosting', 'HiddeCo\TransIP\Api\WebHosting'],
            ['web_hosting', 'HiddeCo\TransIP\Api\WebHosting'],
            ['webHosting', 'HiddeCo\TransIP\Api\WebHosting'],
            ['web_hosting_service', 'HiddeCo\TransIP\Api\WebHosting'],
            ['webHostingService', 'HiddeCo\TransIP\Api\WebHosting'],
        ];
    }
}
