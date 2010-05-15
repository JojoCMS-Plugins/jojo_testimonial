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



/* grabs a random testimonial from the database, for use in a sitewide snippet */
$testimonials = Jojo::selectQuery("SELECT * FROM {testimonial}");
shuffle($testimonials);
$testimonial = array_pop($testimonials);
$testimonial['url'] =  !empty($testimonial['tm_url']) ? "testimonials/".$testimonial['tm_url']."/" : Jojo::rewrite('testimonials', $testimonial['testimonialid'], $testimonial['tm_name'], '');
$smarty->assign('testimonial', $testimonial);
$smarty->assign('random_testimonial', $smarty->fetch('jojo_testimonial_sidebar.tpl'));
