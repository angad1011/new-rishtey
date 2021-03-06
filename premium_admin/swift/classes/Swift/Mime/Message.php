<?php

/*
 Message Interface in Swift Mailer.
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 */

//@require 'Swift/Mime/MimeEntity.php';

/**
 * A Message (RFC 2822) object.
 * @package Swift
 * @subpackage Mime
 * @author Chris Corbyn
 */
interface Swift_Mime_Message extends Swift_Mime_MimeEntity
{
  
  /**
   * Generates a valid Message-ID and switches to it.
   * @return string
   */
  public function generateId();
  
  /**
   * Set the subject of the message.
   * @param string $subject
   */
  public function setSubject($subject);
  
  /**
   * Get the subject of the message.
   * @return string
   */
  public function getSubject();
  
  /**
   * Set the origination date of the message as a UNIX timestamp.
   * @param int $date
   */
  public function setDate($date);
  
  /**
   * Get the origination date of the message as a UNIX timestamp.
   * @return int
   */
  public function getDate();
  
  /**
   * Set the return-path (bounce-detect) address.
   * @param string $address
   */
  public function setReturnPath($address);
  
  /**
   * Get the return-path (bounce-detect) address.
   * @return string
   */
  public function getReturnPath();
  
  /**
   * Set the sender of this message.
   * If multiple addresses are present in the From field, this SHOULD be set.
   * According to RFC 2822 it is a requirement when there are multiple From
   * addresses, but Swift itself does not require it directly.
   * An associative array (with one element!) can be used to provide a display-
   * name: i.e. array('email@address' => 'Real Name').
   * @param mixed $address
   */
  public function setSender($address);
  
  /**
   * Get the sender address for this message.
   * This has a higher significance than the From address.
   * @return string
   */
  public function getSender();
  
  /**
   * Set the From address of this message.
   * It is permissible for multiple From addresses to be set using an array.
   * If multiple From addresses are used, you SHOULD set the Sender address and
   * according to RFC 2822, MUST set the sender address.
   * An array can be used if display names are to be provided: i.e.
   * array('email@address.com' => 'Real Name').
   * @param mixed $addresses
   */
  public function setFrom($addresses);
  
  /**
   * Get the From address(es) of this message.
   * This method always returns an associative array where the keys are the addresses.
   * @return string[]
   */
  public function getFrom();
  
  /**
   * Set the Reply-To address(es).
   * Any replies from the receiver will be sent to this address.
   * It is permissible for multiple reply-to addresses to be set using an array.
   * This method has the same synopsis as {@link setFrom()} and {@link setTo()}.
   * @param mixed $addresses
   */
  public function setReplyTo($addresses);
  
  /**
   * Get the Reply-To addresses for this message.
   * This method always returns an associative array where the keys provide the
   * email addresses.
   * @return string[]
   */
  public function getReplyTo();
  
  /**
   * Set the To address(es).
   * Recipients set in this field will receive a copy of this message.
   * This method has the same synopsis as {@link setFrom()} and {@link setCc()}.
   * @param mixed $addresses
   */
  public function setTo($addresses);
  
  /**
   * Get the To addresses for this message.
   * This method always returns an associative array, whereby the keys provide
   * the actual email addresses.
   * @return string[]
   */
  public function getTo();
  
  /**
   * Set the Cc address(es).
   * Recipients set in this field will receive a 'carbon-copy' of this message.
   * This method has the same synopsis as {@link setFrom()} and {@link setTo()}.
   * @param mixed $addresses
   */
  public function setCc($addresses);
  
  /**
   * Get the Cc addresses for this message.
   * This method always returns an associative array, whereby the keys provide
   * the actual email addresses.
   * @return string[]
   */
  public function getCc();
  
  /**
   * Set the Bcc address(es).
   * Recipients set in this field will receive a 'blind-carbon-copy' of this message.
   * In other words, they will get the message, but any other recipients of the
   * message will have no such knowledge of their receipt of it.
   * This method has the same synopsis as {@link setFrom()} and {@link setTo()}.
   * @param mixed $addresses
   */
  public function setBcc($addresses);
  
  /**
   * Get the Bcc addresses for this message.
   * This method always returns an associative array, whereby the keys provide
   * the actual email addresses.
   * @return string[]
   */
  public function getBcc();
  
}
