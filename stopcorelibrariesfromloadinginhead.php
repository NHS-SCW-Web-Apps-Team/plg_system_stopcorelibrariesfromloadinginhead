<?php
/**
 * @copyright	Copyright (c) 2021 Stop Core Library Load. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * System - Stop Core Libraries From Loading in Head Plugin
 *
 * @package		Joomla.Plugin
 * @subpakage	StopCoreLibraryLoad.StopCoreLibrariesFromLoadinginHead
 */
class plgSystemStopCoreLibrariesFromLoadinginHead extends JPlugin {

	/**
	 * Constructor.
	 *
	 * @param 	$subject
	 * @param	array $config
	 */
	function __construct(&$subject, $config = array()) {
		// call parent constructor
		parent::__construct($subject, $config);
	}
	public function onBeforeCompileHead()
    {
        // Application Object
        $app = JFactory::getApplication();

        // Front only
        if( $app instanceof JApplicationSite )
        {
            $doc = JFactory::getDocument();
			//JS
			unset($doc->_scripts[$this->baseurl.'/media/jui/js/bootstrap.min.js']); //Don't want the core bootstrap js 
			unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);//don't need this jquery plugin for image captions
			//CSS    
			unset($doc->_stylesheets[$this->baseurl.'/media/jui/js/bootstrap.css']);//Don't need the core bootstrap css
        }
    }
	
}