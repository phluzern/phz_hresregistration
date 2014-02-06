<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Lorenz Ulrich <lorenz.ulrich@phz.ch>, PHZ Luzern Eduweb
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package phz_hresregistration
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_PhzHresregistration_Domain_Model_Workshop extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Workshop date
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $workshopdate;

	/**
	 * Block
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $block;

	/**
	 * l10n parent
	 *
	 * @var integer
	 */
	protected $l10nParent;

	/**
	 * Time from
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $fromtime;

	/**
	 * Time to
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $totime;

	/**
	 * Title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Description
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $description;

	/**
	 * Speaker
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $speaker;

	/**
	 * Tooltip
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $tooltip;

	/**
	 * Capacity
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $capacity;

	/**
	 * Room
	 *
	 * @var string
	 */
	protected $room;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the workshopdate
	 *
	 * @return date $workshopdate
	 */
	public function getWorkshopdate() {
		return $this->workshopdate;
	}

	/**
	 * Sets the workshopdate
	 *
	 * @param date $workshopdate
	 * @return void
	 */
	public function setWorkshopdate($workshopdate) {
		$this->workshopdate = $workshopdate;
	}

	/**
	 * Returns the block
	 *
	 * @return integer $block
	 */
	public function getBlock() {
		return $this->block;
	}

	/**
	 * Sets the block
	 *
	 * @param integer $block
	 * @return void
	 */
	public function setBlock($block) {
		$this->block = $block;
	}

	/**
	 * Returns the l10nParent
	 *
	 * @return integer $l10nParent
	 */
	public function getL10nParent() {
		return $this->l10nParent;
	}

	/**
	 * Sets the l10nParent
	 *
	 * @param integer $l10nParent
	 * @return void
	 */
	public function setL10nParent($l10nParent) {
		$this->l10nParent = $l10nParent;
	}

	/**
	 * Returns the fromtime
	 *
	 * @return integer $fromtime
	 */
	public function getFromtime() {
		return $this->fromtime;
	}

	/**
	 * Sets the fromtime
	 *
	 * @param integer $fromtime
	 * @return void
	 */
	public function setFromTime($fromtime) {
		$this->fromTime = $fromtime;
	}

	/**
	 * Returns the totime
	 *
	 * @return integer $totime
	 */
	public function getTotime() {
		return $this->totime;
	}

	/**
	 * Sets the totime
	 *
	 * @param integer $totime
	 * @return void
	 */
	public function setTotime($totime) {
		$this->totime = $totime;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the speaker
	 *
	 * @return string $speaker
	 */
	public function getSpeaker() {
		return $this->speaker;
	}

	/**
	 * Sets the speaker
	 *
	 * @param string $speaker
	 * @return void
	 */
	public function setSpeaker($speaker) {
		$this->speaker = $speaker;
	}

	/**
	 * Returns the tooltip
	 *
	 * @return string $tooltip
	 */
	public function getTooltip() {
		return $this->tooltip;
	}

	/**
	 * Sets the tooltip
	 *
	 * @param string $tooltip
	 * @return void
	 */
	public function setTooltip($tooltip) {
		$this->tooltip = $tooltip;
	}

	/**
	 * Returns the capacity
	 *
	 * @return string $capacity
	 */
	public function getCapacity() {
		return $this->capacity;
	}

	/**
	 * Sets the capacity
	 *
	 * @param string $capacity
	 * @return void
	 */
	public function setCapacity($capacity) {
		$this->capacity = $capacity;
	}

	/**
	 * Returns the room
	 *
	 * @return string $room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * Sets the room
	 *
	 * @param string $room
	 * @return void
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

}
?>