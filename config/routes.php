<?php
use ishop\Router;

// Router::add('^(.*)$', ['controller' => 'Main', 'action' => 'closed']);

Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);
Router::add('^category/?$', ['controller' => 'Category', 'action' => 'index']);
Router::add('^sale/?$', ['controller' => 'Page', 'action' => 'sale']);
Router::add('^contacts/?$', ['controller' => 'Page', 'action' => 'contacts']);
Router::add('^page/(?P<alias>[a-z0-9-]+)?$', ['controller' => 'Page', 'action' => 'page']);
// default routes
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^sitemap.xml$', ['controller' => 'Main', 'action' => 'sitemap']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
