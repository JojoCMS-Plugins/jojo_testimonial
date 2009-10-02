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
$testimonials = Jojo::selectquery("SELECT * FROM {testimonial} WHERE 1 ORDER BY RAND() LIMIT 1");
if(!empty($testimonials[0]['url']))
{
  $testimonials[0]['url'] =  Jojo::rewrite('testimonials', $testimonials[0]['testimonialid'], $testimonials[0]['tm_name'], '');
  $smarty->assign('testimonial', $testimonials[0]);
  $smarty->assign('random_testimonial', $smarty->fetch('jojo_testimonial_sidebar.tpl'));
}
