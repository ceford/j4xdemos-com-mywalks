<?php
/**
 * @package     Mywalks.Administrator
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterFactoryInterface;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\Extension\Service\Provider\CategoryFactory;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\Extension\Service\Provider\RouterFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use J4xdemos\Component\Mywalks\Administrator\Extension\MywalksComponent;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The mywalks service provider.
 *
 * @since  4.0.0
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function register(Container $container)
	{
		$container->registerServiceProvider(new CategoryFactory('\\J4xdemos\\Component\\Mywalks'));
		$container->registerServiceProvider(new MVCFactory('\\J4xdemos\\Component\\Mywalks'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\J4xdemos\\Component\\Mywalks'));
		$container->registerServiceProvider(new RouterFactory('\\J4xdemos\\Component\\Mywalks'));
		$container->set(
				ComponentInterface::class,
				function (Container $container)
				{
					$component = new MywalksComponent($container->get(ComponentDispatcherFactoryInterface::class));

					$component->setRegistry($container->get(Registry::class));
					$component->setMVCFactory($container->get(MVCFactoryInterface::class));
//					$component->setCategoryFactory($container->get(CategoryFactoryInterface::class));
					$component->setRouterFactory($container->get(RouterFactoryInterface::class));

					return $component;
		}
		);
	}
};
