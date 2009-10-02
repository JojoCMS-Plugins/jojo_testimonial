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