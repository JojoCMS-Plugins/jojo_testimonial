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
 * did not receive this file, see http:/* www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http:/* www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http:/* www.jojocms.org JojoCMS
 */



$table = 'testimonial';
$o = 1;

$default_td[$table]['td_displayfield'] = 'tm_name';
$default_td[$table]['td_parentfield'] = '';
$default_td[$table]['td_rolloverfield'] = 'tm_contact';
$default_td[$table]['td_orderbyfields'] = 'tm_order, tm_name';
$default_td[$table]['td_topsubmit'] = 'yes';
$default_td[$table]['td_filter'] = 'yes';
$default_td[$table]['td_deleteoption'] = 'yes';
$default_td[$table]['td_menutype'] = 'list';
$default_td[$table]['td_categoryfield'] = '';
$default_td[$table]['td_categorytable'] = '';
$default_td[$table]['td_group1'] = '';
$default_td[$table]['td_help'] = '';

/* Testimonial ID */
$field = 'testimonialid';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'ID';
$default_fd[$table][$field]['fd_type']     = 'readonly';
$default_fd[$table][$field]['fd_help']     = 'A unique ID, automatically assigned by the system';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Title */
$field = 'tm_name';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Name of the company giving the testimonial';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Contact */
$field = 'tm_contact';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Name of the person giving the testimonial';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Description */
$field = 'tm_url';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'url';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Web address of company giving testimonial (if available)';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* BB Body */
$field = 'tm_bbbody';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'texteditor';
$default_fd[$table][$field]['fd_options']  = 'tm_body';
$default_fd[$table][$field]['fd_rows']     = '10';
$default_fd[$table][$field]['fd_cols']     = '50';
$default_fd[$table][$field]['fd_help']     = '';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Body */
$field = 'tm_body';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'hidden';
$default_fd[$table][$field]['fd_options']  = '';
$default_fd[$table][$field]['fd_rows']     = '10';
$default_fd[$table][$field]['fd_cols']     = '50';
$default_fd[$table][$field]['fd_help']     = 'The body of the testimonial.';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Order */
$field = 'tm_order';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'order';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_help']     = 'Order in which the testimonial appears in the listing';
$default_fd[$table][$field]['fd_mode']     = 'standard';

/* Description */
$field = 'tm_desc';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'Description';
$default_fd[$table][$field]['fd_type']     = 'textarea';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_rows']     = '4';
$default_fd[$table][$field]['fd_cols']     = '40';
$default_fd[$table][$field]['fd_help']     = 'A brief excerpt from the testimonial used for snippets';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Location */
$field = 'tm_location';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Optional - the location of the person or company';
$default_fd[$table][$field]['fd_mode']     = 'standard';

/* Logo */
$field = 'tm_logo';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'fileupload';
$default_fd[$table][$field]['fd_help']     = 'Logo of the company giving the testimonial, if available';
$default_fd[$table][$field]['fd_mode']     = 'standard';