<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_phzhresregistration_domain_model_registration'] = array(
	'ctrl' => $TCA['tx_phzhresregistration_domain_model_registration']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, salutation, lastname, firstname, address1, address2, zip, city, country, company, phone, email, comment, paid, assignment_sent, registration_type, block1_pri1, block1_pri2, block2_pri1, block2_pri2, block3_pri1, block3_pri2, block1_workshop, block2_workshop, block3_workshop',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, salutation, lastname, firstname, address1, address2, zip, city, country, company, phone, email, comment, paid, assignment_sent, user_language, registration_type, block1_pri1, block1_pri2, block2_pri1, block2_pri2, block3_pri1, block3_pri2, block1_workshop, block2_workshop, block3_workshop,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_phzhresregistration_domain_model_registration',
				'foreign_table_where' => 'AND tx_phzhresregistration_domain_model_registration.pid=###CURRENT_PID### AND tx_phzhresregistration_domain_model_registration.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'salutation' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.salutation',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang.xml:tx_phzhresregistration_domain_model_registration.salutation.female', 0),
					array('LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang.xml:tx_phzhresregistration_domain_model_registration.salutation.male', 1),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'address1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.address1',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'address2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.address2',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.zip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'country' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'company' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'comment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.comment',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'paid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.paid',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'assignment_sent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.assignment_sent',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'registration_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.registration_type',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_registrationtype',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block1_pri1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block1_pri1',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 1',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block1_pri2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block1_pri2',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 1',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block2_pri1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block2_pri1',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 2',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block2_pri2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block2_pri2',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 2',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block3_pri1' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block3_pri1',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 3',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block3_pri2' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block3_pri2',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 3',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'block1_workshop' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block1_workshop',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 1',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block_workshop.0','0'),
				),
			),
		),
		'block2_workshop' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block2_workshop',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 2',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block_workshop.0','0'),
				),
			),
		),
		'block3_workshop' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block3_workshop',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND sys_language_uid = 0 AND block = 3',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.block_workshop.0','0'),
				),
			),
		),
		'user_language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_registration.user_language',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('deutsch', 0),
					array('english', 3),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required'
			),
		),
	),
);
?>