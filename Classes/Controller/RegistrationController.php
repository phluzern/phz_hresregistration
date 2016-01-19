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
class Tx_PhzHresregistration_Controller_RegistrationController extends Tx_PhzHresregistration_Controller_BaseController {

	/**
	 * registrationRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_RegistrationRepository
	 * @inject
	 */
	protected $registrationRepository;

	/**
	 * registrationTypeRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_RegistrationTypeRepository
	 * @inject
	 */
	protected $registrationTypeRepository;

	/**
	 * workshopRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_WorkshopRepository
	 * @inject
	 */
	protected $workshopRepository;

	/**
	 * action show
	 *
	 * @param $registration
	 * @return void
	 */
	public function showAction(Tx_PhzHresregistration_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function confirmationMailAction() {
		$registrations = $this->registrationRepository->findAllAssigned();
		$this->view->assign('registrations', $registrations);
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function sendConfirmationMailAction() {
		$registrations = $this->registrationRepository->findAllAssigned();

		foreach($registrations as $registration) {

			$userLanguage = $registration->getUserLanguage();

			if ($userLanguage === 0) {
				// german
				$sender = array($this->settings['mailSender'] => 'Fachtagung Menschenrechtsbildung (HRES)');
				$subject = 'Reminder und Workshop-Einteilung';
				$templateName = 'AssignmentGerman';
				$registrationType = $this->registrationTypeRepository->findOneByUid($registration->getRegistrationType()->getUid());
				$block1Workshop = $this->workshopRepository->findOneByUid($registration->getBlock1Workshop()->getUid());
				$block2Workshop = $this->workshopRepository->findOneByUid($registration->getBlock2Workshop()->getUid());
				$block3Workshop = $this->workshopRepository->findOneByUid($registration->getBlock3Workshop()->getUid());
			} elseif ($userLanguage === 3) {
				// english
				$sender = array($this->settings['mailSender'] => 'Human Rights Education Symposium (HRES)');
				$subject = 'Reminder and workshop schedule';
				$templateName = 'AssignmentEnglish';
				$registrationType = $this->registrationTypeRepository->findOneByL10nParent($registration->getRegistrationType()->getUid());
				$block1Workshop = $this->workshopRepository->findOneByL10nParent($registration->getBlock1Workshop()->getUid());
				$block2Workshop = $this->workshopRepository->findOneByL10nParent($registration->getBlock2Workshop()->getUid());
				$block3Workshop = $this->workshopRepository->findOneByL10nParent($registration->getBlock3Workshop()->getUid());
			}

			// send cc to hres-contact and billing office
            $cc = array();
            $cc[] = $this->settings['mailSender'];
            $cc[] = $this->settings['mailCcReceipient'];

			$recipientName = $registration->getFirstname() . ' ' . $registration->getLastname();
			$recipient = array($registration->getEmail() => $recipientName);

			$embeddedPicture = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('typo3conf/ext/phz_hresregistration/Resources/Private/Backend/Templates/Email/map.jpg');

			$variables = array(
				'registration' => $registration,
				'registrationType' => $registrationType,
				'block1Workshop' => $block1Workshop,
				'block2Workshop' => $block2Workshop,
				'block3Workshop' => $block3Workshop
			);

			$messageSent = $this->sendTemplateEmail($recipient, $sender, $cc, $subject, $templateName, $variables, array(), $embeddedPicture);
			if ($messageSent) {
				$registration->setAssignmentSent(1);
				$this->flashMessageContainer->add('E-Mail versendet an ' . $registration->getEmail());
			} else {
				$this->flashMessageContainer->add('Fehler: E-Mail nicht versendet an ' . $registration->getEmail());
			}
			$this->redirect('sendConfirmationMail');
		}

	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$registrations = $this->registrationRepository->findAll();
		//$this->view->assign('registrations', $registrations);
	}

	/**
	 * action new
	 *
	 * @param $newRegistration
	 * @dontvalidate $newRegistration
	 * @return void
	 */
	public function newAction(Tx_PhzHresregistration_Domain_Model_Registration $newRegistration = NULL) {
		$newRegistration = new Tx_PhzHresregistration_Domain_Model_Registration;
		$registrationTypes = $this->registrationTypeRepository->findAll();
		$workshops = $this->workshopRepository->findAll();
		$this->view->assign('registrationTypes', $registrationTypes);
		$this->view->assign('workshops', $workshops);
		$this->view->assign('newRegistration', $newRegistration);
		$this->view->assign('baseUri', $_SERVER['REQUEST_URI']);
	}

	/**
	 * action create
	 *
	 * @param $newRegistration
	 * @dontvalidate $newRegistration
	 * @return void
	 */
	public function createAction(Tx_PhzHresregistration_Domain_Model_Registration $newRegistration) {

$userLanguage = (int)$GLOBALS['TSFE']->sys_language_uid;
$newRegistration->setUserLanguage($userLanguage);
$this->registrationRepository->add($newRegistration);

		if ($userLanguage === 0) {
			// german
			$sender = array($this->settings['mailSender'] => 'Fachtagung Menschenrechtsbildung (HRES)');
		} elseif ($userLanguage === 3) {
			// english
			$sender = array($this->settings['mailSender'] => 'Human Rights Education Symposium (HRES)');
		}

        // send cc to hres-contact and billing office
        $cc = array();
        $cc[] = $this->settings['mailSender'];
		$cc[] = $this->settings['mailCcReceipient'];

		$subject = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_phzhresregistration_domain_model_registration.confirmationMail.subject', $this->extensionName);
		$recipientName = $newRegistration->getFirstname() . ' ' . $newRegistration->getLastname();
		$recipient = array($newRegistration->getEmail() => $recipientName);
		$templateName = 'ConfirmationMail';




$newRegistration->setBlock1Pri1($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block1Pri1']));
$newRegistration->setBlock1Pri2($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block1Pri2']));
$newRegistration->setBlock2Pri1($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block2Pri1']));
$newRegistration->setBlock2Pri2($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block2Pri2']));
$newRegistration->setBlock3Pri1($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block3Pri1']));
$newRegistration->setBlock3Pri2($this->workshopRepository->findOneByUid($_POST['tx_phzhresregistration']['block3Pri2']));


//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newRegistration);
//exit;

		$this->sendTemplateEmail($recipient, $sender, $cc, $subject, $templateName, array('newRegistration' => $newRegistration));

		$this->redirect('list');

	}

	/**
	 * action edit
	 *
	 * @param $registration
	 * @return void
	 */
	public function editAction(Tx_PhzHresregistration_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
	}

	/**
	 * action update
	 *
	 * @param $registration
	 * @return void
	 */
	public function updateAction(Tx_PhzHresregistration_Domain_Model_Registration $registration) {
		$this->registrationRepository->update($registration);
		$this->flashMessageContainer->add('Your Registration was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $registration
	 * @return void
	 */
	public function deleteAction(Tx_PhzHresregistration_Domain_Model_Registration $registration) {
		$this->registrationRepository->remove($registration);
		$this->flashMessageContainer->add('Your Registration was removed.');
		$this->redirect('list');
	}

}
?>
