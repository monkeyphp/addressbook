<?php
/**
 * module.config.php
 *
 * LICENSE: Copyright David White [monkeyphp] <david@monkeyphp.com> http://www.monkeyphp.com/
 *
 * PHP Version 5.3.6
 *
 * @category   AddressBook
 * @package    AddressBook
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Revision: ##VERSION##
 * @link       http://www.monkeyphp.com/
 */
return array(

    // controllers
    'controllers' => array(),

    // router
    'router' => array(),

    // views
    'view_manager'=> array(
        'template_path_stack' => array(
            'address-book' => __DIR__ . '/../view'
        )
    ),
);