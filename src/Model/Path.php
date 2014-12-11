<?php

namespace ZFBrasil\RepositoryManager\Model;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Path
{
    private $url;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * return the url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
