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
class Tx_PhzHresregistration_Domain_Repository_RegistrationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	 protected $defaultOrderings = array(
         'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
     );

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findAllAssigned() {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
		return $query->matching(
			$query->logicalAnd(
				$query->greaterThanOrEqual('block1_workshop', 1),
				$query->greaterThanOrEqual('block2_workshop', 1),
				$query->greaterThanOrEqual('block3_workshop', 1),
				$query->equals('assignmentSent', 0)
			)
		)->execute();
	}

	/**
	 * @param $workshop
	 * @param $block
	 * @param $suffix
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findByWorkshopInterestAndBlockAndFieldSuffix($workshop, $block, $suffix) {
		$fieldName = 'block' . $block . '_' . $suffix;
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
			// if a person is already enrolled in a workshop, don't show her/his interest
		if ($suffix !== 'workshop') {
			$constraints = $query->logicalAnd(
				$query->equals($fieldName, $workshop),
				$query->equals('block' . $block . '_workshop', 0)
			);
		} else {
			$constraints = $query->equals($fieldName, $workshop);
		}
		return $query->matching($constraints)->execute();
	}

}
?>