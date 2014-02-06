<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_phzhresregistration_domain_model_workshop'] = array(
	'ctrl' => $TCA['tx_phzhresregistration_domain_model_workshop']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, datetime, title, description, speaker, tooltip, capacity, room',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, workshopdate, block, fromtime, totime, title, description, speaker, tooltip, capacity,room, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_phzhresregistration_domain_model_workshop',
				'foreign_table_where' => 'AND tx_phzhresregistration_domain_model_workshop.pid=###CURRENT_PID### AND tx_phzhresregistration_domain_model_workshop.sys_language_uid IN (-1,0)',
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
		'workshopdate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.workshopdate',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'date,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'block' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.block',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'trim,required'
			),
		),
		'fromtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.fromtime',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'time,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'totime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.totime',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'time,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required'
			),
		),
		'speaker' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.speaker',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'tooltip' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.tooltip',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'capacity' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.capacity',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'room' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:phz_hresregistration/Resources/Private/Language/locallang_db.xml:tx_phzhresregistration_domain_model_workshop.room',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);
?>