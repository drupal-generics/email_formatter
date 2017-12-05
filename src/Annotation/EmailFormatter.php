<?php

namespace Drupal\email_formatter\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Class EmailFormatter.
 *
 * Annotation for plugin that perform sending emails split by type.
 *
 * @package Drupal\email_formatter\Annotation
 *
 * @Annotation
 */
class EmailFormatter extends Plugin {

  /**
   * The id of the plugin.
   *
   * @var string
   */
  public $id;

  /**
   * The key on which the plugin will split emails.
   *
   * @var string
   */
  public $key;

  /**
   * The theme key.
   *
   * @var string
   */
  public $themeKey;

}
