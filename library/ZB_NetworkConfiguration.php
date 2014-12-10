<?php

class ZB_NetworkConfiguration
{
    private $name = null;
    private $urlPattern = '';
    private $credential = '';

    public function __construct($networkName = null, $networkUrl)
    {
        $this->setName($networkName);
        $this->setNetworkUrlPattern($networkUrl);
    }

    private function verifyNetworkUrlPattern($url)
    {
        $regexUrl = "/((?:https\\:\\/\\/)|(?:http\\:\\/\\/)|(?:www\\.))?([a-zA-Z0-9\\-\\.]+\\.[a-zA-Z]{2,3}(?:\\??)[a-zA-Z0-9\\-\\._\\?\\,\\'\\/\\\\\\+&%\\$#\\=~]+)/i";
        if (preg_match_all($regexUrl, $url))
        {
            if (stripos($url, '{username}'))
            {
                return true;
            }
            else
            {
                throw new Exception('The url must include the "{username}" tag to replace with the user credential');
            }
        }
        else
        {
            throw new Exception('The url is not valid');
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setNetworkUrlPattern($urlPattern)
    {
        $this->verifyNetworkUrlPattern($urlPattern);
        $this->urlPattern = $urlPattern;
    }

    public function getNetworkUrlPattern()
    {
        return $this->urlPattern;
    }

    public function getCredential()
    {
        return $this->credential;
    }

    public function setCredential($credential)
    {
        $this->credential = $credential;
    }

    public function getUserUrl()
    {
        return str_ireplace('{username}', $this->credential, $this->urlPattern);
    }

    public function getNameSlug()
    {
        return ZerobasePlatform::slugify($this->name);
    }
}