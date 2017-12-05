<?php

namespace Drupal\email_formatter\EmailFormatter;

use Drupal\Core\Plugin\PluginBase;

/**
 * Class EmailFormatterPluginBase.
 *
 * @package Drupal\email_formatter\EmailFormatter
 */
abstract class EmailFormatterPluginBase extends PluginBase implements PluginInspectionInterface {

  /**
   * An array of variables that is sent to the email templates.
   *
   * @var array
   */
  protected $emailVariables;

  /**
   * {@inheritdoc}
   */
  public function getKey() {
    return $this->pluginDefinition['key'];
  }

  /**
   * {@inheritdoc}
   */
  public function getThemeKey() {
    return $this->pluginDefinition['themeKey'];
  }

  /**
   * {@inheritdoc}
   */
  public function formatMessage(array $message) {
    $renderArray = [
      '#theme' => $this->getThemeKey(),
      '#email_variables' => $this->emailVariables,
    ];

    $message['body'] = [$this->renderer()->render($renderArray)];

    return $message;
  }

  /**
   * The renderer service.
   *
   * @return \Drupal\Core\Render\Renderer
   *   The renderer service.
   */
  private function renderer() {
    return \Drupal::service('renderer');
  }

}
