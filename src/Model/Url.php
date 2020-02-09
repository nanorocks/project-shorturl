<?php

namespace App\Model;

class Url
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $customDomain;

    /**
     * @var int
     */
    private $user;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $count
     * @return Url
     */
    public function setCount(int $count) : Url
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param string $domain
     * @return Url
     */
    public function setDomain(string $domain) : Url
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @param string $customDomain
     * @return Url
     */
    public function setCustomDomain(string $customDomain) : Url
    {
        $this->customDomain = $customDomain;
        return $this;
    }

    /**
     * @param int $user
     * @return Url
     */
    public function setUser(int $user) : Url
    {
        $this->user = $user;
        return $this;
    }
}