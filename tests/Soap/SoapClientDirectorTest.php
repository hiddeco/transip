<?php

namespace TransIP\tests\Soap;

use TransIP\Soap\Builder\ColocationSoapClientBuilder;
use TransIP\Soap\Builder\DomainSoapClientBuilder;
use TransIP\Soap\Builder\ForwardSoapClientBuilder;
use TransIP\Soap\Builder\SoapClientBuilderInterface;
use TransIP\Soap\Builder\VpsSoapClientBuilder;
use TransIP\Soap\Builder\WebHostingSoapClientBuilder;
use TransIP\Soap\SoapClientDirector;

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

        $this->assertInstanceOf('TransIP\Soap\SoapClient', $soapClient);
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
