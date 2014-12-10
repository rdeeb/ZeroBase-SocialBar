<?php

class ZB_SocialBar extends ZB_Singleton
{
    private $networks = array();

    /**
     * @param ZB_NetworkConfiguration $network
     */
    public function addSocialNetwork(ZB_NetworkConfiguration $network)
    {
        $this->networks[$network->getNameSlug()] = $network;
    }

    /**
     * @return array
     */
    public function getSupportedNetworksLists()
    {
        $networkList = array();
        foreach($this->networks as $slug => $network)
        {
            /** @var $network ZB_NetworkConfiguration */
            $networkList[$network->getNameSlug()] = $network->getName();
        }
        return $networkList;
    }

    /**
     * @param string $networkName
     * @return bool
     */
    public function isNetworkSupported($networkName)
    {
        return array_key_exists(ZerobasePlatform::slugify($networkName), $this->networks);
    }

    /**
     * @param string $network
     * @param string $credentials
     * @throws Exception
     */
    public function addNetworkCredentials($network, $credentials)
    {
        $object = $this->retreiveNetwork($network);
        $object->setCredential($credentials);
    }

    /**
     * @param string $network
     * @return string
     * @throws Exception
     */
    public function getNetworkCredentials($network)
    {
        $object = $this->retreiveNetwork($network);
        return $object->getCredential();
    }

    /**
     * @param string $network string
     * @throws Exception
     * @return ZB_NetworkConfiguration
     */
    private function retreiveNetwork($network)
    {
        if ($this->isNetworkSupported($network))
        {
            $object = $this->networks[$network];
            /** @var $object ZB_NetworkConfiguration */
            return $object;
        }
        else
        {
            throw new Exception("Network \"$network\" not supoorted.");
        }
    }
}

