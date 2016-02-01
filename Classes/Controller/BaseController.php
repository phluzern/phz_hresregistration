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
class Tx_PhzHresregistration_Controller_BaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
	 * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
	 * @param array $cc
	 * @param string $subject subject of the email
	 * @param string $templateName \TYPO3\CMS\Backend\Template\DocumentTemplate name (UpperCamelCase)
	 * @param array $variables variables to be passed to the Fluid view
	 * @param array $attachments variables to be passed to the SwiftMailer
	 * @param string $embeddedFile
	 * @return boolean TRUE on success, otherwise false
	 */
	protected function sendTemplateEmail(array $recipient, array $sender, array $cc, $subject, $templateName, array $variables = array(), array $attachments = array(), $embeddedFile = '') {

		$emailView = $this->objectManager->create('\TYPO3\CMS\Fluid\View\StandaloneView');
		$emailView->setFormat('html');
		$extensionName = $this->request->getControllerExtensionName();
		$emailView->getRequest()->setControllerExtensionName($extensionName);
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
		$templatePathAndFilename = $templateRootPath . 'Email/' . $templateName . '.html';

		$message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_mail_Message');


		if (!empty($embeddedFile)) {
			$variables['embeddedPicture'] = $message->embed(Swift_Image::fromPath($embeddedFile));
		}

		$emailView->setTemplatePathAndFilename($templatePathAndFilename);


		$emailView->assignMultiple($variables);
		$emailBody = $emailView->render();
		$message->setTo($recipient)
		      ->setFrom($sender)
		 	  ->setCc($cc)
		 	  ->setSubject($subject);

		foreach ($attachments as $attachment) {
			$message->attach($attachment);
		}

		// HTML Email
		$message->setBody($emailBody, 'text/html');

		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($variables);
		//exit;

		$message->send();
		return $message->isSent();
	}

}
?>