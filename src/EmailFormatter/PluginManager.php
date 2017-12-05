<?php

namespace Drupal\email_formatter\EmailFormatter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Class PluginManager.
 *
 * @package Drupal\email_formatter\EmailFormatter
 */
class PluginManager extends DefaultPluginManager implements PluginManagerInterface {

  /**
   * PluginManager constructor.
   *
   * @param \Traversable $namespaces
   *   The namespaces.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   The cache backend.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler) {
    parent::__construct(
      'Plugin/EmailFormatter',
      $namespaces,
      $module_handler,
      'Drupal\email_formatter\EmailFormatter\PluginInspectionInterface',
      'Drupal\email_formatter\Annotation\EmailFormatter'
      );

    $this->alterInfo('email_formatter');
    $this->setCacheBackend($cache_backend, 'email_formatter');
  }

  /**
   * {@inheritdoc}
   */
  public function getEmailFormatters(string $key) {
    $definitions = $this->getDefinitions();
    $fieldSaverDefinitions = [];
    foreach ($definitions as $definition) {
      if ($definition['key'] == $key) {
        $fieldSaverDefinitions[] = $this->createInstance($definition['id']);
      }
    }
    return $fieldSaverDefinitions;
  }

}
