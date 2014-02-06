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
class Tx_PhzHresregistration_Domain_Model_RegistrationType extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * l10n parent
	 *
	 * @var integer
	 */
	protected $l10nParent;

	/**
	 * Caption
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $caption;

	/**
	 * Price
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $price;

	/**
	 * @return \Tx_PhzHresregistration_Domain_Model_RegistrationType
	 */
	public function __construct() {

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
	 * Returns the caption
	 *
	 * @return string $caption
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Sets the caption
	 *
	 * @param string $caption
	 * @return void
	 */
	public function setCaption($caption) {
		$this->caption = $caption;
	}

	/**
	 * Returns the price
	 *
	 * @return integer $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 *
	 * @param integer $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

}
?>