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



if (!Jojo::tableexists('testimonial')) {
    echo "Table <b>testimonial</b> Does not exist - creating empty table<br />";
    $query = "
        CREATE TABLE {testimonial} (
        `testimonialid` int(11) NOT NULL auto_increment,
        `tm_name` varchar(255) NOT NULL default '',
        `tm_contact` varchar(255) NOT NULL default '',
        `tm_logo` varchar(255) NOT NULL default '',
        `tm_body` text NOT NULL,
        `tm_url` varchar(255) NOT NULL default '',
        `tm_order` int(11) NOT NULL default '0',
        `tm_desc` varchar(255) NOT NULL default '',
        PRIMARY KEY  (`testimonialid`)
        ) ENGINE=MyISAM  ;
    ";
    Jojo::updateQuery($query);
}

/* add bbcode field */
if (!Jojo::fieldexists('testimonial','tm_bbbody')) { //BBCode Body text - should be optional
    echo "Add <b>tm_bbbody</b> to <b>testimonial</b><br />";
    Jojo::structureQuery("ALTER TABLE {testimonial} ADD `tm_bbbody` TEXT NOT NULL  AFTER `tm_body` ;");
}

/* add location field */
if (!Jojo::fieldexists('testimonial','tm_location')) { //BBCode Body text - should be optional
    echo "Add <b>tm_location</b> to <b>testimonial</b><br />";
    Jojo::structureQuery("ALTER TABLE {testimonial} ADD `tm_location` TEXT NOT NULL  AFTER `tm_desc` ;");
}

/* testimonials page for menu */
Jojo::updateQuery("UPDATE {page} SET pg_link='JOJO_Plugin_Jojo_testimonial' WHERE pg_link='jojo_testimonial.php'");
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_link='JOJO_Plugin_Jojo_testimonial'");
if (!count($data)) {
    echo "Adding <b>Testimonials</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Testimonials', pg_link='jojo_testimonial.php', pg_url='testimonials'");
}

/* Edit testimonials */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/testimonial'");
if (!count($data)) {
    echo "Adding <b>Edit testimonial</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Edit Testimonials', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/testimonial', pg_parent=?, pg_order=3", array($_ADMIN_CONTENT_ID));
}