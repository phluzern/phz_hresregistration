<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	$_EXTKEY,
	'Hresregistration',
	array(
		'Registration' => 'new, create, show, list, edit, update, delete',
		'RegistrationType' => 'show, list, new, create, edit, update, delete',
		'Workshop' => 'show, list, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Registration' => 'create, update, delete',
		'RegistrationType' => 'create, update, delete',
		'Workshop' => 'create, update, delete',
		
	)
);

?>