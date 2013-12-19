<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
	/**
	 * Alpha-space with spaces and spanish chars
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function alpha_space($str)
	{
		return ( ! preg_match("/^([a-záéíóúñ. ])+$/i", $str)) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Alpha
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function alpha($str)
	{
		return ( ! preg_match("/^([a-záéíóúñ])+$/i", $str)) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Alpha-numeric
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function alpha_numeric($str)
	{
		return ( ! preg_match("/^([a-záéíóúñ0-9-])+$/i", $str)) ? FALSE : TRUE;
	}

}