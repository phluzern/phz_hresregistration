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
class Tx_PhzHresregistration_Controller_RegistrationTypeController extends Tx_PhzHresregistration_Controller_BaseController {

	/**
	 * registrationTypeRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_RegistrationTypeRepository
	 * @inject
	 */
	protected $registrationTypeRepository;

	/**
	 * action show
	 *
	 * @param $registrationType
	 * @return void
	 */
	public function showAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType) {
		$this->view->assign('registrationType', $registrationType);
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$registrationTypes = $this->registrationTypeRepository->findAll();
		$this->view->assign('registrationTypes', $registrationTypes);
	}

	/**
	 * action new
	 *
	 * @param $newRegistrationType
	 * @dontvalidate $newRegistrationType
	 * @return void
	 */
	public function newAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $newRegistrationType = NULL) {
		$this->view->assign('newRegistrationType', $newRegistrationType);
	}

	/**
	 * action create
	 *
	 * @param $newRegistrationType
	 * @return void
	 */
	public function createAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $newRegistrationType) {
		$this->registrationTypeRepository->add($newRegistrationType);
		$this->flashMessageContainer->add('Your new RegistrationType was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $registrationType
	 * @return void
	 */
	public function editAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType) {
		$this->view->assign('registrationType', $registrationType);
	}

	/**
	 * action update
	 *
	 * @param $registrationType
	 * @return void
	 */
	public function updateAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType) {
		$this->registrationTypeRepository->update($registrationType);
		$this->flashMessageContainer->add('Your RegistrationType was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $registrationType
	 * @return void
	 */
	public function deleteAction(Tx_PhzHresregistration_Domain_Model_RegistrationType $registrationType) {
		$this->registrationTypeRepository->remove($registrationType);
		$this->flashMessageContainer->add('Your RegistrationType was removed.');
		$this->redirect('list');
	}

}
?>