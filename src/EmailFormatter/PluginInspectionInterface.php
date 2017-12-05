<?php

namespace Drupal\email_formatter\EmailFormatter;

/**
 * Interface PluginInspectionInterface.
 *
 * @package Drupal\email_formatter\EmailFormatter
 */
interface PluginInspectionInterface {

  /**
   * Returns the email key.
   *
   * @return string
   *   The key.
   */
  public function getKey();

  /**
   * Gets the definition's theme key.
   *
   * @return string
   *   The string.
   */
  public function getThemeKey();

  /**
   * Formats the email message.
   *
   * @param array $message
   *   The email message.
   *
   * @return array
   *   The formatted message.
   */
  public function formatMessage(array $message);

}
