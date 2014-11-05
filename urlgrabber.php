<?php
// no direct access
defined ( '_JEXEC' ) or die ( 'Restricted access' );
require_once('simple_html_dom.php');
require_once('grabber_functions.php');

global $html_dom;
$html_dom = new simple_html_dom();
class plgContentUrlgrabber extends JPlugin {
        /**
         * Load the language file on instantiation.
         * Note this is only available in Joomla 3.1 and higher.
         * If you want to support 3.0 series you must override the constructor
         *
         * @var boolean
         * @since 3.1
         */
        protected $autoloadLanguage = true;
        function onContentPrepareForm($form, $data) {
                $app = JFactory::getApplication();
                $option = $app->input->get('option');
                $isEnabled = $this->params->get('is_urlgrabber_enabled');
                $category = $this->params->get('urlgrabber_category');
                
                switch($option) {
                    case 'com_content':
                        if($isEnabled && $category){
                            if($app->isAdmin()) {
                                JForm::addFormPath(__DIR__ . '/forms');
                                $form->loadFile('grabber', false);
                            }
                        }
                        return true;
                }
                return true;
        }
        

        function onContentPrepare($context, &$article, &$params, $page) {
            $isEnabled = $this->params->get('is_urlgrabber_enabled');
            $category = $this->params->get('urlgrabber_category');

            if ($isEnabled && $category == $article->catid) {
                $attribs = new JRegistry($article->attribs);
                $url = $attribs['grabber_url'];

                if ($url && $url != "") {
                    $html = file_get_html($url);
                    $full_content = $this->params->get('full_content');

                    $grabber_title_tag = $this->params->get('grabber_title');
                    $grabber_title = "";
                    if ($grabber_title_tag && $grabber_title_tag != "") {
                        $grabber_title = getItemTitle($html, $grabber_title_tag);
                    }

                    $output = "";
                    /*
                    * This customizes the URL content with relevant tags
                    */
                    $grabber_items = ["grabber_item1",
                                "grabber_item2",
                                "grabber_item3",
                                "grabber_item4",
                                "grabber_item5",
                                "grabber_item6",
                                "grabber_item7",
                                "grabber_item8",
                                "grabber_item9",
                                "grabber_item10"];

                    foreach ($grabber_items as $item) {
                        $item_tag = $this->params->get($item);
                        $output .= getItemCommon($item, $html, $item_tag);                        
                    }                                

                    if ($full_content && $full_content != "") {
                        $output = "<div class='urlgrabber'>" . $output . "</div>";
                        $html = str_get_html($output);
                        
                        // eval($full_content);
                        $evalResult = @eval('return true;' . $full_content);
                        if ($evalResult) {
                           $output = customizeFinal($html);
                        }
                        
                    }else {
                        $output = "<div class='urlgrabber'>" . $output . "</div>";
                    }
                    
                    $output_facilities = "";
                    $grabber_facilities = ["grabber_facility1",
                                "grabber_facility2",
                                "grabber_facility3",
                                "grabber_facility4",
                                "grabber_facility5",
                                "grabber_facility6",
                                "grabber_facility7"];
                    foreach ($grabber_facilities as $facility) {
                        $facility_code = $this->params->get($facility);
                        $content_facility = $attribs[$facility];
                        if ($content_facility && $facility_code && "" != $facility_code) {
                            $output_facilities .= "<div class='" .$facility. "'>" .$facility_code. "</div>";
                        }
                    }

                    if ($grabber_title && "" != $grabber_title) {
                        $article->title = $grabber_title;
                    }

                    $output = $output_facilities . $output;

                    $article->text = $output;
                }
            }
        }
}
?>