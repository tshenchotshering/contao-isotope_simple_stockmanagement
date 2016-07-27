<?php
/**
 * Isotope "simple stock management" for Contao Open Source CMS
 *
 * Copyright (c) 2016 Richard Henkenjohann
 *
 * @package Isotope
 * @author  Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 */


/** @noinspection PhpUndefinedMethodInspection */
$table = Isotope\Model\Product::getTable();


/**
 * Fields
 */
/** @noinspection PhpUndefinedMethodInspection */
$GLOBALS['TL_DCA'][$table]['fields']['stock'] = [
    'label'        => &$GLOBALS['TL_LANG'][$table]['stock'],
    'inputType'    => 'dcaWizard',
    'foreignTable' => Isotope\Model\Stock::getTable(),
    'params'       => [
        'mode' => 2,
        'pid'  => \Input::get('id'),
        'act'  => 'create',
    ],
    'eval'         => [
        'fields'          => ['quantity', 'source', 'product_collection_id', 'comment', 'tstamp'],
        'editButtonLabel' => $GLOBALS['TL_LANG'][$table]['stock_create_button'],
        'orderField'      => 'tstamp ASC',
        'showOperations'  => true,
        'operations'      => ['show'],
        'listCallback'    => ['Isotope\SimpleStockmanagement\Dca', 'generateWizardList'],
        'tl_class'        => 'clr',
    ],
    'attributes' => [
        'legend' => 'inventory_legend',
    ],
];