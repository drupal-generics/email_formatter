<?php

namespace Drupal\email_formatter\EmailFormatter;

/**
 * Interface PluginManagerInterface.
 *
 * @package Drupal\email_formatter\EmailFormatter
 */
interface PluginManagerInterface {

  /**
   * Returns the formatted message.
   *
   * @param string $key
   *   A key to identify the email sent. The final message ID for email altering
   *   will be {$module}_{$key}.
   *
   * @return mixed
   *   The formatted message.
   *
   * @see \Drupal\Core\Mail\MailManagerInterface::mail()
   *   See the $key parameter's description about the message ID's format.
   */
  public function getEmailFormatters(string $key);

}
