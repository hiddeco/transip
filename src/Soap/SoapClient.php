<?php

namespace HiddeCo\TransIP\Soap;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class SoapClient extends \SoapClient
{
    /**
     * Set the login cookie.
     *
     * @param string $login TransIP username
     */
    public function setLogin($login)
    {
        $this->__setCookie('login', $login);
    }

    /**
     * Set the mode cookie.
     *
     * @param string $mode Permission mode
     */
    public function setMode($mode)
    {
        $this->__setCookie('mode', $mode);
    }

    /**
     * Set the timestamp cookie.
     *
     * @param string $timestamp Timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->__setCookie('timestamp', $timestamp);
    }

    /**
     * Set the nonce cookie.
     *
     * @param string $nonce Nonce
     */
    public function setNonce($nonce)
    {
        $this->__setCookie('nonce', $nonce);
    }

    /**
     * Set the client version cookie.
     *
     * @param int $clientVersion TransIP client version
     */
    public function setClientVersion($clientVersion)
    {
        $this->__setCookie('clientVersion', $clientVersion);
    }

    /**
     * Create and set the signature cookie.
     *
     * @param array  $parameters Parameters to sign
     * @param string $privateKey Private key to sign the request with
     * @param string $service    WSDL service
     * @param string $endpoint   TransIP endpoint
     * @param string $timestamp  Timestamp
     * @param string $nonce      Nonce
     */
    public function setSignature($parameters, $privateKey, $service, $endpoint, $timestamp, $nonce)
    {
        $this->__setCookie('signature', rawurlencode($this->sign($privateKey, array_merge($parameters, [
            '__service'   => $service,
            '__hostname'  => $endpoint,
            '__timestamp' => $timestamp,
            '__nonce'     => $nonce,
        ]))));
    }

    /**
     * Calculate the hash to sign the request with based on the given parameters.
     *
     * @param string $privateKey Private key to sign the request with
     * @param array  $parameters Parameters to sign
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    protected function sign($privateKey, $parameters)
    {
        if (preg_match('/-----BEGIN (RSA )?PRIVATE KEY-----(.*)-----END (RSA )?PRIVATE KEY-----/si', $privateKey, $matches)) {
            $key = $matches[2];
            $key = preg_replace('/\s*/s', '', $key);
            $key = chunk_split($key, 64, "\n");

            $key = "-----BEGIN PRIVATE KEY-----\n".$key.'-----END PRIVATE KEY-----';

            $digest = $this->sha512Asn1($this->encodeParameters($parameters));

            if (@openssl_private_encrypt($digest, $signature, $key)) {
                return base64_encode($signature);
            }

            throw new \InvalidArgumentException('Unable to sign the request, this has to do with the provided (invalid) private key.');
        }

        throw new \InvalidArgumentException('Invalid private key.');
    }

    /**
     * Create a digest of the given data, with an asn1 header.
     *
     * @param string $data Data to create a digest of
     *
     * @return string
     */
    protected function sha512Asn1($data)
    {
        $digest = hash('sha512', $data, true);

        // this ASN1 header is sha512 specific
        $asn1 = chr(0x30).chr(0x51);
        $asn1 .= chr(0x30).chr(0x0d);
        $asn1 .= chr(0x06).chr(0x09);
        $asn1 .= chr(0x60).chr(0x86).chr(0x48).chr(0x01).chr(0x65);
        $asn1 .= chr(0x03).chr(0x04);
        $asn1 .= chr(0x02).chr(0x03);
        $asn1 .= chr(0x05).chr(0x00);
        $asn1 .= chr(0x04).chr(0x40);
        $asn1 .= $digest;

        return $asn1;
    }

    /**
     * Encode the given parameters into a url encoded string based upon RFC 3986.
     *
     * @param mixed       $parameters Parameters to encode
     * @param string|null $keyPrefix  Key prefix
     *
     * @return string
     */
    protected function encodeParameters($parameters, $keyPrefix = null)
    {
        if (!is_array($parameters) && !is_object($parameters)) {
            return rawurlencode($parameters);
        }

        $encodedData = [];

        foreach ($parameters as $key => $value) {
            $encodedKey = is_null($keyPrefix) ? rawurlencode($key) : $keyPrefix.'['.rawurlencode($key).']';

            if (is_array($value) || is_object($value)) {
                $encodedData[] = $this->encodeParameters($value, $encodedKey);
            } else {
                $encodedData[] = $encodedKey.'='.rawurlencode($value);
            }
        }

        return implode('&', $encodedData);
    }
}
