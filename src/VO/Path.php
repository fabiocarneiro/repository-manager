<?php

namespace ZFBrasil\RepositoryManager\VO;

use Assert\Assertion;

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
        Assertion::url($url);
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
