<?php
/**
 *
 * kahana library
 * Created by PhpStorm.
 * User: starsea
 * Date: 16/3/7
 * Time: 11:18
 */

namespace App\Helper;

class Arr
{

    /**
     * Retrieve a single key from an array. If the key does not exist in the
     * array, the default value will be returned instead.
     *
     *     // Get the value "username" from $_POST, if it exists
     *     $username = Arr::get($_POST, 'username');
     *
     *     // Get the value "sorting" from $_GET, if it exists
     *     $sorting = Arr::get($_GET, 'sorting');
     *
     * @param   array   array to extract from
     * @param   string $key name
     * @param   mixed $default value
     * @return  mixed
     */
    public static function get(Array $array, $key, $default = NULL)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
    
    /**
	 * Retrieves multiple keys from an array. If the key does not exist in the
	 * array, the default value will be added instead.
	 *
	 *     // Get the values "username", "password" from $_POST
	 *     $auth = Arr::extract($_POST, array('username', 'password'));
	 *
	 * @param   array   array to extract keys from
	 * @param   array   list of key names
	 * @param   mixed   default value
	 * @return  array
	 */
	public static function extract($array, array $keys, $default = NULL)
	{
		$found = array();
		foreach ($keys as $key)
		{
			$found[$key] = isset($array[$key]) ? $array[$key] : $default;
		}

		return $found;
	} 
}

