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
class Tx_PhzHresregistration_Controller_WorkshopController extends Tx_PhzHresregistration_Controller_BaseController {

	/**
	 * workshopRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_WorkshopRepository
	 */
	protected $workshopRepository;

	/**
	 * injectWorkshopRepository
	 *
	 * @param Tx_PhzHresregistration_Domain_Repository_WorkshopRepository $workshopRepository
	 * @return void
	 */
	public function injectWorkshopRepository(Tx_PhzHresregistration_Domain_Repository_WorkshopRepository $workshopRepository) {
		$this->workshopRepository = $workshopRepository;
	}

	/**
	 * registrationRepository
	 *
	 * @var Tx_PhzHresregistration_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;

	/**
	 * injectRegistrationRepository
	 *
	 * @param Tx_PhzHresregistration_Domain_Repository_RegistrationRepository $registrationRepository
	 * @return void
	 */
	public function injectRegistrationRepository(Tx_PhzHresregistration_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$workshops = $this->workshopRepository->findAll();
		$this->view->assign('workshops', $workshops);
	}

	/**
	 * action display statistics
	 * TODO: ugly ugly ugly ugly
	 *
	 * @return void
	 */
	public function displayStatsAction() {

		$workshops = $this->workshopRepository->findAll();

		$content = array();

		foreach($workshops as $workshop) {

			$workshopAssignment['workshop'] = $this->registrationRepository->findByWorkshopInterestAndBlockAndFieldSuffix($workshop->getUid(), $workshop->getBlock(), 'workshop');
			$workshopAssignment['pri1'] = $this->registrationRepository->findByWorkshopInterestAndBlockAndFieldSuffix($workshop->getUid(), $workshop->getBlock(), 'pri1');
			$workshopAssignment['pri2'] = $this->registrationRepository->findByWorkshopInterestAndBlockAndFieldSuffix($workshop->getUid(), $workshop->getBlock(), 'pri2');

			$content[] = '<h3>Block ' . $workshop->getBlock() . ': ' . $workshop->getTitle() . '</h3>';
			$content[] = '<table width="100%">
								<thead>
									<tr>
										<th width="33%">Eingeteilte Personen</th>
										<th width="33%">Einteilungswunsch Priorität 1</th>
										<th width="33%">Einteilungswunsch Priorität 2</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<ul>';
												foreach($workshopAssignment['workshop'] as $assignedPerson) {
													$content[] = '<li>';
													$content[] = '<a onclick="window.location.href=\'alt_doc.php?returnUrl=\'+T3_THIS_LOCATION+\'&amp;edit[tx_phzhresregistration_domain_model_registration][' . $assignedPerson->getUid() . ']=edit\'; return false;" href="#">';
													$content[] = $assignedPerson->getLastName() . ', ' . $assignedPerson->getFirstName();
													$content[] = '</a>';
													$content[] = '</li>';
												}

			$content[] = '
											</ul>
										</td>
										<td>
											<ul>';
												foreach($workshopAssignment['pri1'] as $assignedPerson) {
													$content[] = '<li>';
													$content[] = '<a onclick="window.location.href=\'alt_doc.php?returnUrl=\'+T3_THIS_LOCATION+\'&amp;edit[tx_phzhresregistration_domain_model_registration][' . $assignedPerson->getUid() . ']=edit\'; return false;" href="#">';
													$content[] = $assignedPerson->getLastName() . ', ' . $assignedPerson->getFirstName();
													$content[] = '</a>';
													$content[] = '</li>';												}
			$content[] = '
											</ul>
										</td>
										<td>
											<ul>';
												foreach($workshopAssignment['pri2'] as $assignedPerson) {
													$content[] = '<li>';
													$content[] = '<a onclick="window.location.href=\'alt_doc.php?returnUrl=\'+T3_THIS_LOCATION+\'&amp;edit[tx_phzhresregistration_domain_model_registration][' . $assignedPerson->getUid() . ']=edit\'; return false;" href="#">';
													$content[] = $assignedPerson->getLastName() . ', ' . $assignedPerson->getFirstName();
													$content[] = '</a>';
													$content[] = '</li>';												}

			$content[] = '
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
							<hr style="height: 1px; "/>';
		}
		
	$this->view->assign('content', implode($content));


	}

	/**
	 * action show
	 *
	 * @param $workshop
	 * @return void
	 */
	public function showAction(Tx_PhzHresregistration_Domain_Model_Workshop $workshop) {
		$this->view->assign('workshop', $workshop);
	}

	/**
	 * action new
	 *
	 * @param $newWorkshop
	 * @dontvalidate $newWorkshop
	 * @return void
	 */
	public function newAction(Tx_PhzHresregistration_Domain_Model_Workshop $newWorkshop = NULL) {
		$this->view->assign('newWorkshop', $newWorkshop);
	}

	/**
	 * action create
	 *
	 * @param $newWorkshop
	 * @return void
	 */
	public function createAction(Tx_PhzHresregistration_Domain_Model_Workshop $newWorkshop) {
		$this->workshopRepository->add($newWorkshop);
		$this->flashMessageContainer->add('Your new Workshop was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $workshop
	 * @return void
	 */
	public function editAction(Tx_PhzHresregistration_Domain_Model_Workshop $workshop) {
		$this->view->assign('workshop', $workshop);
	}

	/**
	 * action update
	 *
	 * @param $workshop
	 * @return void
	 */
	public function updateAction(Tx_PhzHresregistration_Domain_Model_Workshop $workshop) {
		$this->workshopRepository->update($workshop);
		$this->flashMessageContainer->add('Your Workshop was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $workshop
	 * @return void
	 */
	public function deleteAction(Tx_PhzHresregistration_Domain_Model_Workshop $workshop) {
		$this->workshopRepository->remove($workshop);
		$this->flashMessageContainer->add('Your Workshop was removed.');
		$this->redirect('list');
	}

}
?>