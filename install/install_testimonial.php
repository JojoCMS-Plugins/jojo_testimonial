<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */


$table = 'testimonial';
$query = "
    CREATE TABLE {testimonial} (
        `testimonialid` int(11) NOT NULL auto_increment,
        `tm_name` varchar(255) NOT NULL default '',
        `tm_contact` varchar(255) NOT NULL default '',
        `tm_logo` varchar(255) NOT NULL default '',
        `tm_body` text NOT NULL,
        `tm_bbbody` text NOT NULL,
        `tm_url` varchar(255) NOT NULL default '',
        `tm_order` int(11) NOT NULL default '0',
        `tm_desc` varchar(255) NOT NULL default '',
        `tm_location` text NOT NULL,
        `tm_language` varchar(100) NOT NULL default 'en',
        `tm_htmllang` varchar(100) NOT NULL,
        PRIMARY KEY  (`testimonialid`)
        ) ENGINE=MyISAM  ;
    ";


/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jojo_article: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jojo_testimonial: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table, $result['different']);
