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
class Tx_PhzHresregistration_Domain_Model_Registration extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Salutation
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $salutation;

	/**
	 * Last name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastname;

	/**
	 * First name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $firstname;

	/**
	 * Address
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $address1;

	/**
	 * Zusatz
	 *
	 * @var string
	 */
	protected $address2;

	/**
	 * ZIP code
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $zip;

	/**
	 * City
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $city;

	/**
	 * Country
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $country;

	/**
	 * Institution/School
	 *
	 * @var string
	 */
	protected $company;

	/**
	 * Phone
	 *
	 * @var string
	 */
	protected $phone;

	/**
	 * E-Mail
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $email;

	/**
	 * Comments
	 *
	 * @var string
	 */
	protected $comment;

	/**
	 * Registration type
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_RegistrationType
	 */
	protected $registrationType;

	/**
	 * Paid
	 *
	 * @var boolean
	 */
	protected $paid;

	/**
	 * Assignment sent
	 *
	 * @var boolean
	 */
	protected $assignmentSent;

	/**
	 * Block 1, 1st priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block1Pri1;

	/**
	 * Block 1, 2nd priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block1Pri2;

	/**
	 * Block 2, 1st priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block2Pri1;

	/**
	 * Block 2, 2nd priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block2Pri2;

	/**
	 * Block 3, 1st priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block3Pri1;

	/**
	 * Block 3, 2nd priority
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block3Pri2;

	/**
	 * Block 1, Workshop
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block1Workshop;

	/**
	 * Block 2, Workshop
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block2Workshop;

	/**
	 * Block 3, Workshop
	 *
	 * @var Tx_PhzHresregistration_Domain_Model_Workshop
	 */
	protected $block3Workshop;

	/**
	 * User \TYPO3\CMS\Lang\LanguageService
	 *
	 * @var integer
	 */
	protected $userLanguage;


	/**
	 * @return \Tx_PhzHresregistration_Domain_Model_Registration
	 */
	public function __construct() {
	}

	/**
	 * Returns the salutation
	 *
	 * @return integer $salutation
	 */
	public function getSalutation() {
		return $this->salutation;
	}

	/**
	 * Sets the salutation
	 *
	 * @param integer $salutation
	 * @return void
	 */
	public function setSalutation($salutation) {
		$this->salutation = $salutation;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the address1
	 *
	 * @return string $address1
	 */
	public function getAddress1() {
		return $this->address1;
	}

	/**
	 * Sets the address1
	 *
	 * @param string $address1
	 * @return void
	 */
	public function setAddress1($address1) {
		$this->address1 = $address1;
	}

	/**
	 * Returns the address2
	 *
	 * @return string $address2
	 */
	public function getAddress2() {
		return $this->address2;
	}

	/**
	 * Sets the address2
	 *
	 * @param string $address2
	 * @return void
	 */
	public function setAddress2($address2) {
		$this->address2 = $address2;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the company
	 *
	 * @return string $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * Sets the company
	 *
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the comment
	 *
	 * @return string $comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Sets the comment
	 *
	 * @param string $comment
	 * @return void
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * Returns the registrationType
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType
	 */
	public function getRegistrationType() {
		return $this->registrationType;
	}

	/**
	 * Sets the registrationType
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType
	 * @return void
	 */
	public function setRegistrationType(Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType) {
		$this->registrationType = $registrationType;
	}

	/**
	 * Returns the paid
	 *
	 * @return boolean $paid
	 */
	public function getPaid() {
		return $this->paid;
	}

	/**
	 * Sets the paid
	 *
	 * @param boolean $paid
	 * @return void
	 */
	public function setPaid($paid) {
		$this->paid = $paid;
	}

	/**
	 * Returns the boolean state of paid
	 *
	 * @return boolean
	 */
	public function isPaid() {
		return $this->getPaid();
	}

	/**
	 * Returns the assignmentSent
	 *
	 * @return boolean $assignmentSent
	 */
	public function getAssignmentSent() {
		return $this->assignmentSent;
	}

	/**
	 * Sets the assignmentSent
	 *
	 * @param boolean $assignmentSent
	 * @return void
	 */
	public function setAssignmentSent($assignmentSent) {
		$this->assignmentSent = $assignmentSent;
	}

	/**
	 * Returns the boolean state of assignmentSent
	 *
	 * @return boolean
	 */
	public function isAssignmentSent() {
		return $this->getAssignmentSent();
	}

	/**
	 * Returns the block1Pri1
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri1
	 */
	public function getBlock1Pri1() {
		return $this->block1Pri1;
	}

	/**
	 * Sets the block1Pri1
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri1
	 * @return void
	 */
	public function setBlock1Pri1(Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri1) {
		$this->block1Pri1 = $block1Pri1;
	}

	/**
	 * Returns the block1Pri2
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri2
	 */
	public function getBlock1Pri2() {
		return $this->block1Pri2;
	}

	/**
	 * Sets the block1Pri2
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri2
	 * @return void
	 */
	public function setBlock1Pri2(Tx_PhzHresregistration_Domain_Model_Workshop $block1Pri2) {
		$this->block1Pri2 = $block1Pri2;
	}

	/**
	 * Returns the block2Pri1
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri1
	 */
	public function getBlock2Pri1() {
		return $this->block2Pri1;
	}

	/**
	 * Sets the block2Pri1
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri1
	 * @return void
	 */
	public function setBlock2Pri1(Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri1) {
		$this->block2Pri1 = $block2Pri1;
	}

	/**
	 * Returns the block2Pri2
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri2
	 */
	public function getBlock2Pri2() {
		return $this->block2Pri2;
	}

	/**
	 * Sets the block2Pri2
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri2
	 * @return void
	 */
	public function setBlock2Pri2(Tx_PhzHresregistration_Domain_Model_Workshop $block2Pri2) {
		$this->block2Pri2 = $block2Pri2;
	}

	/**
	 * Returns the block3Pri1
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri1
	 */
	public function getBlock3Pri1() {
		return $this->block3Pri1;
	}

	/**
	 * Sets the block3Pri1
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri1
	 * @return void
	 */
	public function setBlock3Pri1(Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri1) {
		$this->block3Pri1 = $block3Pri1;
	}

	/**
	 * Returns the block3Pri2
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri2
	 */
	public function getBlock3Pri2() {
		return $this->block3Pri2;
	}

	/**
	 * Sets the block3Pri2
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri2
	 * @return void
	 */
	public function setBlock3Pri2(Tx_PhzHresregistration_Domain_Model_Workshop $block3Pri2) {
		$this->block3Pri2 = $block3Pri2;
	}

	/**
	 * Returns the block1Workshop
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block1Workshop
	 */
	public function getBlock1Workshop() {
		return $this->block1Workshop;
	}

	/**
	 * Sets the block1Workshop
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block1Workshop
	 * @return void
	 */
	public function setBlock1Workshop(Tx_PhzHresregistration_Domain_Model_Workshop $block1Workshop) {
		$this->block1Workshop = $block1Workshop;
	}

	/**
	 * Returns the block2Workshop
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block2Workshop
	 */
	public function getBlock2Workshop() {
		return $this->block2Workshop;
	}

	/**
	 * Sets the block2Workshop
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block2Workshop
	 * @return void
	 */
	public function setBlock2Workshop(Tx_PhzHresregistration_Domain_Model_Workshop $block2Workshop) {
		$this->block2Workshop = $block2Workshop;
	}

	/**
	 * Returns the block3Workshop
	 *
	 * @return Tx_PhzHresregistration_Domain_Model_Workshop $block3Workshop
	 */
	public function getBlock3Workshop() {
		return $this->block3Workshop;
	}

	/**
	 * Sets the block3Workshop
	 *
	 * @param Tx_PhzHresregistration_Domain_Model_Workshop $block3Workshop
	 * @return void
	 */
	public function setBlock3Workshop(Tx_PhzHresregistration_Domain_Model_Workshop $block3Workshop) {
		$this->block3Workshop = $block3Workshop;
	}

	/**
	 * Returns the user \TYPO3\CMS\Lang\LanguageService
	 *
	 * @return integer $userLanguage
	 */
	public function getUserLanguage() {
		return $this->userLanguage;
	}

	/**
	 * Sets the user \TYPO3\CMS\Lang\LanguageService
	 *
	 * @param integer $userLanguage
	 * @return void
	 */
	public function setUserLanguage($userLanguage) {
		$this->userLanguage = $userLanguage;
	}

/**
     * Generate object for create action
     *
    * @param string $key
    * @param  $value
    * @return void
     */
   public function setCustomProperty($key,$value) {
       $this->$key = $value;
   }



}
?>