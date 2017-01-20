<?php

/**
 * the file for the sanitizer functions.
 *
 * @link       http://registration_magic.com
 * @since      1.0.0
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 */
class CM_Sanitizer
{

	/**
	 * Sanitizes the request variable
	 *
	 * @since    1.0.0
	 */
	public static function sanitize_request($req)
	{
            $request = CM_Utilities::trim_array($req); 
            if(isset($_GET['page']) && is_array($request) && is_string($_GET['page']))
                $request['page'] = trim(filter_var($_GET['page'], FILTER_SANITIZE_STRING));
            
            return $request;
	}



}
