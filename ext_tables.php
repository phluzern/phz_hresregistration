<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Hresregistration',
	'PHZ HRES Registration'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . hresregistration;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .hresregistration. '.xml');





if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		$_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'hresmanagement',	// Submodule key
		'',						// Position
		array(
			'Registration' => 'confirmationMail, sendConfirmationMail, show, list, new, create, edit, update, delete',
			//'RegistrationType' => 'show, list, new, create, edit, update, delete',
			'Workshop' => 'displayStats, show, list, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_hresmanagement.xml',
		)
	);

}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PHZ HRES Registration');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_registration', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_registration.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_phzhresregistration_domain_model_registration');
$TCA['tx_phzhresregistration_domain_model_registration'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration',
		'label' => 'lastname',
		'label_alt' => 'firstname,email',
		'label_alt_force' => 1,
		'searchFields' => 'lastname,firstname,email',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		//'languageField' => 'sys_language_uid',
		//'transOrigPointerField' => 'l10n_parent',
		//'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Registration.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_registration.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_registrationtype', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_registrationtype.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_phzhresregistration_domain_model_registrationtype');
$TCA['tx_phzhresregistration_domain_model_registrationtype'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registrationtype',
		'label' => 'caption',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/RegistrationType.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_registrationtype.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_workshop', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_workshop.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_phzhresregistration_domain_model_workshop');
$TCA['tx_phzhresregistration_domain_model_workshop'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
        'sortby' => 'sorting',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Workshop.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_workshop.gif'
	),
);

?>