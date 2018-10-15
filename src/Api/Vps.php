<?php

namespace TransIP\Api;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Vps extends AbstractApi
{
    const SERVICE = 'VpsService';

    /**
     * Get available VPS products.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Product[]
     */
    public function getAvailableProducts()
    {
        return $this->call(self::SERVICE, 'getAvailableProducts');
    }

    /**
     * Get available VPS add-ons.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Product[]
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
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Product[]
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
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Product[]
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
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Product[]
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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function orderVps($productName, array $addons, $operatingSystemName, $hostname)
    {
        return $this->call(self::SERVICE, 'orderVps', [$productName, $addons, $operatingSystemName, $hostname]);
    }
    
    /**
     * Order a VPS with optional add-ons.
     *
     * @param string   $productName         Name of the product
     * @param string[] $addons              Array with additional add-ons
     * @param string   $operatingSystemName Name of the operating system to install
     * @param string   $hostname            Hostname for the VPS
     * @param string   $availabilityZone    Availability zone for the VPS
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function orderVpsInAvailabilityZone($productName, array $addons, $operatingSystemName, $hostname, $availabilityZone)
    {
        return $this->call(self::SERVICE, 'orderVps', [$productName, $addons, $operatingSystemName, $hostname, $availabilityZone]);
    }

    /**
     * Clone a VPS.
     *
     * @param string $vpsName The vps name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cloneVps($vpsName)
    {
        return $this->call(self::SERVICE, 'cloneVps', [$vpsName]);
    }
    
    /**
     * Clone a VPS to AvailabilityZone.
     *
     * @param string $vpsName The vps name
     * @param string $availabilityZone Availability zone for the VPS
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cloneVpsToAvailabilityZone($vpsName, $availabilityZone)
    {
        return $this->call(self::SERVICE, 'cloneVps', [$vpsName, $availabilityZone]);
    }

    /**
     * Order add-ons for a VPS.
     *
     * @param string   $vpsName Name of the VPS
     * @param string[] $addons  Array with addons
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function orderAddon($vpsName, array $addons)
    {
        return $this->call(self::SERVICE, 'orderAddon', [$vpsName, $addons]);
    }

    /**
     * Order a private network.
     *
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return \TransIP\Model\PrivateNetwork
     */
    public function getPrivateNetworksByVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getPrivateNetworksByVps', [$vpsName]);
    }

    /**
     * Get all private networks.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\PrivateNetwork[]
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return array
     */
    public function getTrafficInformationForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getTrafficInformationForVps', [$vpsName]);
    }

    /**
     * Get pooled traffic information for the account.
     *
     * @throws \SoapFault
     *
     * @return array
     */
    public function getPooledTrafficInformation()
    {
        return $this->call(self::SERVICE, 'getPooledTrafficInformation');
    }

    /**
     * Start a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function start($vpsName)
    {
        return $this->call(self::SERVICE, 'start', [$vpsName]);
    }

    /**
     * Stop a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function revertSnapshot($vpsName, $snapshotName)
    {
        return $this->call(self::SERVICE, 'revertSnapshot', [$vpsName, $snapshotName]);
    }

    /**
     * Revert a snapshot to another VPS.
     *
     * @param string $sourceVpsName      The name of the VPS where the snapshot is made
     * @param string $snapshotName       The snapshot name
     * @param string $destinationVpsName The name of the VPS where the snapshot should be reverted to
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function revertSnapshotToOtherVps($sourceVpsName, $snapshotName, $destinationVpsName)
    {
        return $this->call(self::SERVICE, 'revertSnapshotToOtherVps', [$sourceVpsName, $snapshotName, $destinationVpsName]);
    }

    /**
     * Remove a snapshot.
     *
     * @param string $vpsName      Name of the VPS
     * @param string $snapshotName Name of the snapshot
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function removeSnapshot($vpsName, $snapshotName)
    {
        return $this->call(self::SERVICE, 'removeSnapshot', [$vpsName, $snapshotName]);
    }

    /**
     * Revert a vps backup.
     *
     * @param string $vpsName     The vps name
     * @param int    $vpsBackupId The backup id
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function revertVpsBackup($vpsName, $vpsBackupId)
    {
        return $this->call(self::SERVICE, 'revertVpsBackup', [$vpsName, $vpsBackupId]);
    }

    /**
     * Get a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Vps
     */
    public function getVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getVps', [$vpsName]);
    }

    /**
     * Get all VPSes.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Vps[]
     */
    public function getVpses()
    {
        return $this->call(self::SERVICE, 'getVpses');
    }

    /**
     * Get all snapshots for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Snapshot[]
     */
    public function getSnapshotsByVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getSnapshotsByVps', [$vpsName]);
    }

    /**
     * Get all operating systems.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\OperatingSystem[]
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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function installOperatingSystem($vpsName, $operatingSystemName, $hostname)
    {
        return $this->call(self::SERVICE, 'installOperatingSystem', [$vpsName, $operatingSystemName, $hostname]);
    }

    /**
     * Install an operating system on a vps with a unattended install file.
     *
     * @param string $vpsName             The name of the VPS
     * @param string $operatingSystemName The name of the operating to install
     * @param string $base64InstallText   base64_encoded preseed/kickstart text
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function installOperatingSystemUnattended($vpsName, $operatingSystemName, $base64InstallText)
    {
        return $this->call(self::SERVICE, 'installOperatingSystemUnattended', [$vpsName, $operatingSystemName, $base64InstallText]);
    }

    /**
     * Get IP addresses for a VPS.
     *
     * @param string $vpsName Name of the VPS
     *
     * @throws \SoapFault
     *
     * @return string[]
     */
    public function getIpsForVps($vpsName)
    {
        return $this->call(self::SERVICE, 'getIpsForVps', [$vpsName]);
    }

    /**
     * Get all IP addresses.
     *
     * @throws \SoapFault
     *
     * @return string[]
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function handoverVps($vpsName, $targetAccountName)
    {
        $this->call(self::SERVICE, 'handoverVps', [$vpsName, $targetAccountName]);
    }
    
    /**
     * Get all available availability zones.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\AvailabilityZone[]
     */
    public function getAvailableAvailabilityZones()
    {
        return $this->call(self::SERVICE, 'getAvailableAvailabilityZones');
    }
}
