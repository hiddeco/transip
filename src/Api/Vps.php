<?php

namespace HiddeCo\TransIP\Api;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Vps extends AbstractApi
{
    const SERVICE = 'VpsService';

    /**
     * Get available VPS products.
     *
     * @return \HiddeCo\TransIP\Model\Product[]
     *
     * @throws \SoapFault
     */
    public function getAvailableProducts()
    {
        return $this->call(self::SERVICE, 'getAvailableProducts');
    }

    /**
     * Get available VPS add-ons.
     *
     * @return \HiddeCo\TransIP\Model\Product[]
     *
     * @throws \SoapFault
     */
    public function getAvailableAddons()
    {
        return $this->call(self::SERVICE, 'getAvailableAddons');
    }

    /**
     * Get all the active add-ons for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\Product[]
     *
     * @throws \SoapFault
     */
    public function getActiveAddonsForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getActiveAddonsForVps', [$vpsName]);
    }

    /**
     * Get available upgrades for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\Product[]
     *
     * @throws \SoapFault
     */
    public function getAvailableUpgrades($vpsName)
    {
        return $this->call(self::SERVICE, 'getAvailableUpgrades', [$vpsName]);
    }


    /**
     * Get cancellable add-ons for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\Product[]
     *
     * @throws \SoapFault
     */
    public function getCancellableAddonsForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getCancellableAddonsForVps', [$vpsName]);
    }

    /**
     * Order a VPS with optional add-ons.
     *
     * @param string   $productName         Name of the product
     * @param string[] $addons              Array with additional add-ons
     * @param string   $operatingSystemName Name of the operating system to install
     * @param string   $hostname            Hostname for the VPS
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function orderVps($productName, array $addons, $operatingSystemName, $hostname)
    {
        return $this->call(self::SERVICE, 'orderVps', [$productName, $addons, $operatingSystemName, $hostname]);
    }

    /**
     * Order add-ons for a VPS.
     *
     * @param string   $vpsName Name of the VPS
     * @param string[] $addons  Array with addons
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function orderAddon($vpsName, array $addons)
    {
        return $this->call(self::SERVICE, 'orderAddon', [$vpsName, $addons]);
    }

    /**
     * Order a private network.
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function orderPrivateNetwork()
    {
        return $this->call(self::SERVICE, 'orderPrivateNetwork');
    }

    /**
     * Upgrade a VPS.
     *
     * @param string $vpsName              Name of the VPS
     * @param string $upgradeToProductName Name of the product to upgrade to
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function upgradeVps($vpsName, $upgradeToProductName)
    {
        return $this->call(self::SERVICE, 'upgradeVps', [$vpsName, $upgradeToProductName]);
    }

    /**
     * Cancel a VPS.
     *
     * @param string $vpsName Name of the VPS
     * @param string $endTime Time to cancel the VPS
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function cancelVps($vpsName, $endTime)
    {
        return $this->call(self::SERVICE, 'cancelVps', [$vpsName, $endTime]);
    }

    /**
     * Cancel a VPS add-on.
     *
     * @param string $vpsName   Name of the VPS
     * @param string $addonName Name of the add-on
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function cancelAddon($vpsName, $addonName)
    {
        return $this->call(self::SERVICE, 'cancelAddon', [$vpsName, $addonName]);
    }

    /**
     * Cancel a private network.
     *
     * @param string $privateNetworkName Name of the private network
     * @param string $endTime            Time to cancel the private network
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function cancelPrivateNetwork($privateNetworkName, $endTime)
    {
        return $this->call(self::SERVICE, 'cancelPrivateNetwork', [$privateNetworkName, $endTime]);
    }

    /**
     * Get private networks for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\PrivateNetwork
     *
     * @throws \SoapFault
     */
    public function getPrivateNetworksByVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getPrivateNetworksByVps', [$vpsName]);
    }

    /**
     * Get all private networks.
     *
     * @return \HiddeCo\TransIP\Model\PrivateNetwork[]
     *
     * @throws \SoapFault
     */
    public function getAllPrivateNetworks()
    {
        return $this->call(self::SERVICE, 'getAllPrivateNetworks');
    }

    /**
     * Add VPS to a private network.
     *
     * @param string $vpsName            Name of the VPS
     * @param string $privateNetworkName Name of the private network
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function addVpsToPrivateNetwork($vpsName, $privateNetworkName)
    {
        return $this->call(self::SERVICE, 'addVpsToPrivateNetwork', [$vpsName, $privateNetworkName]);
    }

    /**
     * Remove VPS from a private network.
     *
     * @param string $vpsName            Name of the VPS
     * @param string $privateNetworkName Name of the private network
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function removeVpsFromPrivateNetwork($vpsName, $privateNetworkName)
    {
        return $this->call(self::SERVICE, 'removeVpsFromPrivateNetwork', [$vpsName, $privateNetworkName]);
    }

    /**
     * Get traffic information for a VPS for this contract period.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return array
     *
     * @throws \SoapFault
     */
    public function getTrafficInformationForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getTrafficInformationForVps', [$vpsName]);
    }

    /**
     * Start a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function start($vpsName)
    {
        return $this->call(self::SERVICE. 'start', [$vpsName]);
    }

    /**
     * Stop a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function stop($vpsName)
    {
        return $this->call(self::SERVICE, 'stop', [$vpsName]);
    }

    /**
     * Reset a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function reset($vpsName)
    {
        return $this->call(self::SERVICE, 'reset', [$vpsName]);
    }

    /**
     * Create a snapshot of a VPS.
     *
     * @param string $vpsName     Name of the VPS
     * @param string $description Snapshot description
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function createSnapshot($vpsName, $description)
    {
        return $this->call(self::SERVICE, 'createSnapshot', [$vpsName, $description]);
    }

    /**
     * Revert a snapshot.
     *
     * @param string $vpsName      Name of the VPS
     * @param string $snapshotName Name of the snapshot
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function revertSnapshot($vpsName, $snapshotName)
    {
        return $this->call(self::SERVICE, 'revertSnapshot', [$vpsName, $snapshotName]);
    }

    /**
     * Remove a snapshot.
     *
     * @param string $vpsName      Name of the VPS
     * @param string $snapshotName Name of the snapshot
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function removeSnapshot($vpsName, $snapshotName)
    {
        return $this->call(self::SERVICE, 'removeSnapshot', [$vpsName, $snapshotName]);
    }

    /**
     * Get a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\Vps
     *
     * @throws \SoapFault
     */
    public function getVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getVps', [$vpsName]);
    }

    /**
     * Get all VPSes.
     *
     * @return \HiddeCo\TransIP\Model\Vps[]
     *
     * @throws \SoapFault
     */
    public function getVpses()
    {
        return $this->call(self::SERVICE, 'getVpses');
    }

    /**
     * Get all snapshots for a VPS
     *
     * @param string $vpsName Name of the VPS
     *
     * @return \HiddeCo\TransIP\Model\Snapshot[]
     *
     * @throws \SoapFault
     */
    public function getSnapshotsByVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getSnapshotsByVps', [$vpsName]);
    }

    /**
     * Get all operating systems.
     *
     * @return \HiddeCo\TransIP\Model\OperatingSystem[]
     *
     * @throws \SoapFault
     */
    public function getOperatingSystems()
    {
        return $this->call(self::SERVICE, 'getOperatingSystems');
    }

    /**
     * Install an operating system on a VPS.
     *
     * @param string $vpsName             Name of the VPS
     * @param string $operatingSystemName Name of the operating system
     * @param string $hostname            Hostname
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function installOperatingSystem($vpsName, $operatingSystemName, $hostname)
    {
        return $this->call(self::SERVICE, 'installOperatingSystem', [$vpsName, $operatingSystemName, $hostname]);
    }

    /**
     * Get IP addresses for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @return string[]
     *
     * @throws \SoapFault
     */
    public function getIpsForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getIpsForVps', [$vpsName]);
    }

    /**
     * Get all IP addresses.
     *
     * @return string[]
     *
     * @throws \SoapFault
     */
    public function getAllIps()
    {
        return $this->call(self::SERVICE, 'getAllIps');
    }

    /**
     * Add ipv6 address to a VPS.
     *
     * @param string $vpsName     Name of the VPS
     * @param string $ipv6Address ipv6 address
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function addIpv6ToVps($vpsName, $ipv6Address)
    {
        return $this->call(self::SERVICE, 'addIpv6ToVps', [$vpsName, $ipv6Address]);
    }

    /**
     * Update PTR record (reverse DNS) for an IP address.
     *
     * @param string $ipAddress IP address to update, can be ipv4 or ipv6
     * @param string $ptrRecord PTR record to update to
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function updatePtrRecord($ipAddress, $ptrRecord)
    {
        return $this->call(self::SERVICE, 'updatePtrRecord', [$ipAddress, $ptrRecord]);
    }

    /**
     * Enable or disable a customer lock for a VPS.
     *
     * @param string $vpsName Name of the VPS
     * @param bool   $enabled Status of the lock
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function setCustomerLock($vpsName, $enabled)
    {
        return $this->call(self::SERVICE, 'setCustomerLock', [$vpsName, $enabled]);
    }

    /**
     * Handover a VPS to another TransIP user.
     *
     * @param string $vpsName           Name of the VPS
     * @param string $targetAccountName TransIP username of the other user
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function handoverVps($vpsName, $targetAccountName)
    {
        $this->call(self::SERVICE, 'handoverVps', [$vpsName, $targetAccountName]);
    }
}