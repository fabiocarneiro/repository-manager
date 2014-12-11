<?php

namespace ZFBrasil\Proxposer;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license proprietary
 */
class Module implements ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return require __DIR__ . "/../config/module.config.php";
    }
}