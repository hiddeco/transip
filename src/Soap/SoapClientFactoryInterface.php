<?php

namespace TransIP\Soap;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
interface SoapClientFactoryInterface
{
    public function make($wsdl, array $classMap = []);
}
