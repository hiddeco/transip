<?php

namespace HiddeCo\TransIP\tests\Soap;

use HiddeCo\TransIP\Soap\Builder\ColocationSoapClientBuilder;
use HiddeCo\TransIP\Soap\Builder\DomainSoapClientBuilder;
use HiddeCo\TransIP\Soap\Builder\ForwardSoapClientBuilder;
use HiddeCo\TransIP\Soap\Builder\SoapClientBuilderInterface;
use HiddeCo\TransIP\Soap\Builder\VpsSoapClientBuilder;
use HiddeCo\TransIP\Soap\Builder\WebHostingSoapClientBuilder;
use HiddeCo\TransIP\Soap\SoapClientDirector;

class SoapClientDirectorTest extends \PHPUnit_Framework_TestCase
{
    protected $director;

    protected function setUp()
    {
        $this->director = new SoapClientDirector('username', 'privateKey', 'api.transip.nl');
    }

    /**
     * @dataProvider buildersProvider
     */
    public function testBuild(SoapClientBuilderInterface $builder)
    {
        $soapClient = $this->director->build($builder);

        $this->assertInstanceOf('HiddeCo\TransIP\Soap\SoapClient', $soapClient);
    }

    public function buildersProvider()
    {
        return [
            [new ColocationSoapClientBuilder()],
            [new DomainSoapClientBuilder()],
            [new ForwardSoapClientBuilder()],
            [new VpsSoapClientBuilder()],
            [new WebHostingSoapClientBuilder()],
        ];
    }
}
