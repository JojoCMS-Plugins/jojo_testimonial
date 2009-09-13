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

class JOJO_Plugin_Jojo_testimonial extends JOJO_Plugin
{
    function _getContent()
    {
        global $smarty;

        $content = array();
        $id = Util::getFormData('id', false);
        if ($id) {
            $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE testimonialid = ?", $id);
            $smarty->assign('testimonial', $testimonial);

            /* add testimonial breadcrumb */
            $breadcrumbs                      = $this->_getBreadCrumbs();
            $breadcrumb                       = array();
            $breadcrumb['name']               = $testimonial['tm_name'];
            $breadcrumb['rollover']           = $testimonial['tm_name'];
            $breadcrumb['url']                = Jojo::rewrite('testimonial', $testimonial['testimonialid'], $testimonial['tm_name']);
            $breadcrumbs[count($breadcrumbs)] = $breadcrumb;

            $content['title']       = $testimonials[0]['tm_name'];
            $content['seotitle']    = $testimonials[0]['tm_name'].' | Client Testimonials';
            $content['breadcrumbs'] = $breadcrumbs;

        } else {
            $orderby = 'tm_order, tm_name';
            $orderby = Jojo::applyFilter('jojo_testimonial:orderby', $orderby);
            $maintestimonials = Jojo::selectQuery("SELECT * FROM {testimonial} WHERE 1 ORDER BY $orderby");
            $n = count($maintestimonials);
            for ($i=0; $i<$n; $i++) {
                $maintestimonials[$i]['url'] =  Jojo::rewrite('testimonials', $maintestimonials[$i]['testimonialid'], $maintestimonials[$i]['tm_name'], '');
            }
            $smarty->assign('testimonial', '');
            $smarty->assign('maintestimonials', $maintestimonials);
            $smarty->assign('content', $this->page['pg_body']);
        }
        $content['content'] = $smarty->fetch('jojo_testimonial.tpl');
        return $content;
    }

    function getCorrectUrl()
    {
        $id = Jojo::getFormData('id', false);
        if ($id) {
            $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE testimonialid = ?", $id);
            return _SITEURL . '/' .  Jojo::rewrite('testimonials', $id, $testimonial['tm_name'], '');
        }
        return parent::getCorrectUrl();
    }
}