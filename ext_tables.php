<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
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
	Tx_Extbase_Utility_Extension::registerModule(
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


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PHZ HRES Registration');


t3lib_extMgm::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_registration', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_registration.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_phzhresregistration_domain_model_registration');
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
		'languageField' => 'user_language',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Registration.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_registration.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_registrationtype', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_registrationtype.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_phzhresregistration_domain_model_registrationtype');
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/RegistrationType.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_registrationtype.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_phzhresregistration_domain_model_workshop', 'EXT:phz_hresregistration/Resources/Private/Language/locallang_csh_tx_phzhresregistration_domain_model_workshop.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_phzhresregistration_domain_model_workshop');
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Workshop.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_phzhresregistration_domain_model_workshop.gif'
	),
);

?>