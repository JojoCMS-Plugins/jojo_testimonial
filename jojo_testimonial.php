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
        global $smarty, $page;

        $content = array();
        $id = Util::getFormData('id', false);
        $url = Util::getFormData('url', false);
        if ($id || $url) {
            if ($id) {
                $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE testimonialid = ?", $id);
            } else  {
                $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE tm_url = ?", $url);
                $id = $testimonial['testimonialid'];
            }
            $testimonial['name'] = htmlspecialchars($testimonial['tm_name'], ENT_COMPAT, 'UTF-8', false);
            $testimonial['contact'] = htmlspecialchars($testimonial['tm_contact'], ENT_COMPAT, 'UTF-8', false);
            $smarty->assign('testimonial', $testimonial);

            /* add testimonial breadcrumb */
            $breadcrumbs                      = $this->_getBreadCrumbs();
            $breadcrumb                       = array();
            $breadcrumb['name']               = $testimonial['name'];
            $breadcrumb['rollover']           = $testimonial['name'];
            $breadcrumb['url']                = !empty($testimonial['tm_url']) ? _SITEURL . '/testimonials/' . $testimonial['tm_url'] . '/'  : _SITEURL . '/' .  Jojo::rewrite('testimonials', $id, $testimonial['tm_name'], '');
            $breadcrumbs[count($breadcrumbs)] = $breadcrumb;

            $content['title']       = $testimonial['name'];
            $content['seotitle']    = $testimonial['name'] . ' | Client Testimonials';
            $content['breadcrumbs'] = $breadcrumbs;
            $content['metadescription'] = substr('The testimonial of '.$testimonial['name'].' for '.Jojo::getOption('sitetitle').'. '.strip_tags($testimonial['tm_body']),0,165); //keeping it longer than 155 so Google cuts it off using words

        } else {
            $language='';
            $languagePrefix='';
            if (_MULTILANGUAGE) {
              $language = !empty($page->page['pg_language']) ? $page->page['pg_language'] : Jojo::getOption('multilanguage-default', 'en');
              $languagePrefix = Jojo::getMultiLanguageString ( $language );
            }
            $orderby = 'tm_order, tm_name';
            $orderby = Jojo::applyFilter('jojo_testimonial:orderby', $orderby);
            $query  = "SELECT * FROM {testimonial} WHERE 1 ";
            //if it is the default language, show all
            $query .= (_MULTILANGUAGE and $languagePrefix) ? " AND tm_language = '$language'" : '';
            $query.=" ORDER BY $orderby";
            $maintestimonials = Jojo::selectQuery($query);

            foreach ($maintestimonials as &$mt) {
                if(_MULTILANGUAGE){
                  $mt['tm_language']=($mt['tm_language']) ? $mt['tm_language'] : Jojo::getOption('multilanguage-default', 'en');
                  if (!$languagePrefix and ($mt['tm_language']==Jojo::getOption('multilanguage-default', 'en'))) $languagePre='';
                  else $languagePre= ($languagePrefix) ? $languagePrefix : $mt['tm_language']."/";
                } else $languagePre='';

                $mt['url'] =  !empty($mt['tm_url']) ? $languagePre . 'testimonials/' . $mt['tm_url'] . '/'  :  $languagePre . Jojo::rewrite('testimonials', $mt['testimonialid'], $mt['tm_name'], '');
                $mt['name'] = htmlspecialchars($mt['tm_name'], ENT_COMPAT, 'UTF-8', false);
                $mt['contact'] = htmlspecialchars($mt['tm_contact'], ENT_COMPAT, 'UTF-8', false);
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
        global $page;
        $id = Jojo::getFormData('id', false);
        $url = Util::getFormData('url', false);
        if($id or $url) {
            $language_query='';
            $languagePrefix='';
            if (_MULTILANGUAGE) {
              $language = !empty($page->page['pg_language']) ? $page->page['pg_language'] : Jojo::getOption('multilanguage-default', 'en');
              $languagePrefix = Jojo::getMultiLanguageString ( $language );
              $language_query='and tm_language = \''.$language.'\'';
            }
            if ($id) {
                $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE testimonialid = ? $language_query", $id);
                $correcturl = !empty($testimonial['tm_url']) ? _SITEURL . $languagePrefix . '/testimonials/' . $testimonial['tm_url'] . '/'  : _SITEURL . '/' . $languagePrefix . Jojo::rewrite('testimonials', $id, $testimonial['tm_name'], '');
                return $correcturl;
            } elseif ($url) {
                $testimonial = Jojo::selectRow("SELECT * FROM {testimonial} WHERE tm_url = ? $language_query", $url);
                $correcturl =  _SITEURL . $languagePrefix . '/testimonials/' . $testimonial['tm_url'] . '/';
                return $correcturl;
            }
        }
        return parent::getCorrectUrl();
    }
}