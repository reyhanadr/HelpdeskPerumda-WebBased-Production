<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');
=======
defined('BASEPATH') OR exit('No direct script access allowed');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

/**
 * Loader Class
 *
 * Loads framework components.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Loader
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/libraries/loader.html
 */
<<<<<<< HEAD
#[\AllowDynamicProperties]

class CI_Loader
{
=======
class CI_Loader {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	// All these are set automatically. Don't mess with them.
	/**
	 * Nesting level of the output buffering mechanism
	 *
	 * @var	int
	 */
	protected $_ci_ob_level;

	/**
	 * List of paths to load views from
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_view_paths = array(VIEWPATH => TRUE);
=======
	protected $_ci_view_paths =	array(VIEWPATH	=> TRUE);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of paths to load libraries from
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_library_paths = array(APPPATH, BASEPATH);
=======
	protected $_ci_library_paths =	array(APPPATH, BASEPATH);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of paths to load models from
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_model_paths = array(APPPATH);
=======
	protected $_ci_model_paths =	array(APPPATH);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of paths to load helpers from
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_helper_paths = array(APPPATH, BASEPATH);
=======
	protected $_ci_helper_paths =	array(APPPATH, BASEPATH);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of cached variables
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_cached_vars = array();
=======
	protected $_ci_cached_vars =	array();
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of loaded classes
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_classes = array();
=======
	protected $_ci_classes =	array();
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of loaded models
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_models = array();
=======
	protected $_ci_models =	array();
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of loaded helpers
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_helpers = array();
=======
	protected $_ci_helpers =	array();
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

	/**
	 * List of class name mappings
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	protected $_ci_varmap = array(
=======
	protected $_ci_varmap =	array(
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		'unit_test' => 'unit',
		'user_agent' => 'agent'
	);

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * Sets component load paths, gets the initial output buffering level.
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->_ci_ob_level = ob_get_level();
		$this->_ci_classes =& is_loaded();

		log_message('info', 'Loader Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Initializer
	 *
	 * @todo	Figure out a way to move this to the constructor
	 *		without breaking *package_path*() methods.
	 * @uses	CI_Loader::_ci_autoloader()
	 * @used-by	CI_Controller::__construct()
	 * @return	void
	 */
	public function initialize()
	{
		$this->_ci_autoloader();
	}

	// --------------------------------------------------------------------

	/**
	 * Is Loaded
	 *
	 * A utility method to test if a class is in the self::$_ci_classes array.
	 *
	 * @used-by	Mainly used by Form Helper function _get_validation_object().
	 *
	 * @param 	string		$class	Class name to check for
	 * @return 	string|bool	Class object name if loaded or FALSE
	 */
	public function is_loaded($class)
	{
		return array_search(ucfirst($class), $this->_ci_classes, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Library Loader
	 *
	 * Loads and instantiates libraries.
	 * Designed to be called from application controllers.
	 *
	 * @param	mixed	$library	Library name
	 * @param	array	$params		Optional parameters to pass to the library class constructor
	 * @param	string	$object_name	An optional object name to assign to
	 * @return	object
	 */
	public function library($library, $params = NULL, $object_name = NULL)
	{
<<<<<<< HEAD
		if (empty($library)) {
			return $this;
		} elseif (is_array($library)) {
			foreach ($library as $key => $value) {
				if (is_int($key)) {
					$this->library($value, $params);
				} else {
=======
		if (empty($library))
		{
			return $this;
		}
		elseif (is_array($library))
		{
			foreach ($library as $key => $value)
			{
				if (is_int($key))
				{
					$this->library($value, $params);
				}
				else
				{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					$this->library($key, $params, $value);
				}
			}

			return $this;
		}

<<<<<<< HEAD
		if ($params !== NULL && !is_array($params)) {
=======
		if ($params !== NULL && ! is_array($params))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$params = NULL;
		}

		$this->_ci_load_library($library, $params, $object_name);
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Model Loader
	 *
	 * Loads and instantiates models.
	 *
	 * @param	mixed	$model		Model name
	 * @param	string	$name		An optional object name to assign to
	 * @param	bool	$db_conn	An optional database connection configuration to initialize
	 * @return	object
	 */
	public function model($model, $name = '', $db_conn = FALSE)
	{
<<<<<<< HEAD
		if (empty($model)) {
			return $this;
		} elseif (is_array($model)) {
			foreach ($model as $key => $value) {
=======
		if (empty($model))
		{
			return $this;
		}
		elseif (is_array($model))
		{
			foreach ($model as $key => $value)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				is_int($key) ? $this->model($value, '', $db_conn) : $this->model($key, $value, $db_conn);
			}

			return $this;
		}

		$path = '';

		// Is the model in a sub-folder? If so, parse out the filename and path.
<<<<<<< HEAD
		if (($last_slash = strrpos($model, '/')) !== FALSE) {
=======
		if (($last_slash = strrpos($model, '/')) !== FALSE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			// The path is in front of the last slash
			$path = substr($model, 0, ++$last_slash);

			// And the model name behind it
			$model = substr($model, $last_slash);
		}

<<<<<<< HEAD
		if (empty($name)) {
			$name = $model;
		}

		if (in_array($name, $this->_ci_models, TRUE)) {
=======
		if (empty($name))
		{
			$name = $model;
		}

		if (in_array($name, $this->_ci_models, TRUE))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return $this;
		}

		$CI =& get_instance();
<<<<<<< HEAD
		if (isset($CI->$name)) {
			throw new RuntimeException('The model name you are loading is the name of a resource that is already being used: ' . $name);
		}

		if ($db_conn !== FALSE && !class_exists('CI_DB', FALSE)) {
			if ($db_conn === TRUE) {
=======
		if (isset($CI->$name))
		{
			throw new RuntimeException('The model name you are loading is the name of a resource that is already being used: '.$name);
		}

		if ($db_conn !== FALSE && ! class_exists('CI_DB', FALSE))
		{
			if ($db_conn === TRUE)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$db_conn = '';
			}

			$this->database($db_conn, FALSE, TRUE);
		}

		// Note: All of the code under this condition used to be just:
		//
		//       load_class('Model', 'core');
		//
		//       However, load_class() instantiates classes
		//       to cache them for later use and that prevents
		//       MY_Model from being an abstract class and is
		//       sub-optimal otherwise anyway.
<<<<<<< HEAD
		if (!class_exists('CI_Model', FALSE)) {
			$app_path = APPPATH . 'core' . DIRECTORY_SEPARATOR;
			if (file_exists($app_path . 'Model.php')) {
				require_once($app_path . 'Model.php');
				if (!class_exists('CI_Model', FALSE)) {
					throw new RuntimeException($app_path . "Model.php exists, but doesn't declare class CI_Model");
				}

				log_message('info', 'CI_Model class loaded');
			} elseif (!class_exists('CI_Model', FALSE)) {
				require_once(BASEPATH . 'core' . DIRECTORY_SEPARATOR . 'Model.php');
			}

			$class = config_item('subclass_prefix') . 'Model';
			if (file_exists($app_path . $class . '.php')) {
				require_once($app_path . $class . '.php');
				if (!class_exists($class, FALSE)) {
					throw new RuntimeException($app_path . $class . ".php exists, but doesn't declare class " . $class);
				}

				log_message('info', config_item('subclass_prefix') . 'Model class loaded');
=======
		if ( ! class_exists('CI_Model', FALSE))
		{
			$app_path = APPPATH.'core'.DIRECTORY_SEPARATOR;
			if (file_exists($app_path.'Model.php'))
			{
				require_once($app_path.'Model.php');
				if ( ! class_exists('CI_Model', FALSE))
				{
					throw new RuntimeException($app_path."Model.php exists, but doesn't declare class CI_Model");
				}

				log_message('info', 'CI_Model class loaded');
			}
			elseif ( ! class_exists('CI_Model', FALSE))
			{
				require_once(BASEPATH.'core'.DIRECTORY_SEPARATOR.'Model.php');
			}

			$class = config_item('subclass_prefix').'Model';
			if (file_exists($app_path.$class.'.php'))
			{
				require_once($app_path.$class.'.php');
				if ( ! class_exists($class, FALSE))
				{
					throw new RuntimeException($app_path.$class.".php exists, but doesn't declare class ".$class);
				}

				log_message('info', config_item('subclass_prefix').'Model class loaded');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			}
		}

		$model = ucfirst($model);
<<<<<<< HEAD
		if (!class_exists($model, FALSE)) {
			foreach ($this->_ci_model_paths as $mod_path) {
				if (!file_exists($mod_path . 'models/' . $path . $model . '.php')) {
					continue;
				}

				require_once($mod_path . 'models/' . $path . $model . '.php');
				if (!class_exists($model, FALSE)) {
					throw new RuntimeException($mod_path . "models/" . $path . $model . ".php exists, but doesn't declare class " . $model);
=======
		if ( ! class_exists($model, FALSE))
		{
			foreach ($this->_ci_model_paths as $mod_path)
			{
				if ( ! file_exists($mod_path.'models/'.$path.$model.'.php'))
				{
					continue;
				}

				require_once($mod_path.'models/'.$path.$model.'.php');
				if ( ! class_exists($model, FALSE))
				{
					throw new RuntimeException($mod_path."models/".$path.$model.".php exists, but doesn't declare class ".$model);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				}

				break;
			}

<<<<<<< HEAD
			if (!class_exists($model, FALSE)) {
				throw new RuntimeException('Unable to locate the model you have specified: ' . $model);
			}
		} elseif (!is_subclass_of($model, 'CI_Model')) {
			throw new RuntimeException("Class " . $model . " already exists and doesn't extend CI_Model");
=======
			if ( ! class_exists($model, FALSE))
			{
				throw new RuntimeException('Unable to locate the model you have specified: '.$model);
			}
		}
		elseif ( ! is_subclass_of($model, 'CI_Model'))
		{
			throw new RuntimeException("Class ".$model." already exists and doesn't extend CI_Model");
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		$this->_ci_models[] = $name;
		$model = new $model();
		$CI->$name = $model;
<<<<<<< HEAD
		log_message('info', 'Model "' . get_class($model) . '" initialized');
=======
		log_message('info', 'Model "'.get_class($model).'" initialized');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Database Loader
	 *
	 * @param	mixed	$params		Database configuration options
	 * @param	bool	$return 	Whether to return the database object
	 * @param	bool	$query_builder	Whether to enable Query Builder
	 *					(overrides the configuration setting)
	 *
	 * @return	object|bool	Database object if $return is set to TRUE,
	 *					FALSE on failure, CI_Loader instance in any other case
	 */
	public function database($params = '', $return = FALSE, $query_builder = NULL)
	{
		// Grab the super object
		$CI =& get_instance();

		// Do we even need to load the database class?
<<<<<<< HEAD
		if ($return === FALSE && $query_builder === NULL && isset($CI->db) && is_object($CI->db) && !empty($CI->db->conn_id)) {
			return FALSE;
		}

		require_once(BASEPATH . 'database/DB.php');

		if ($return === TRUE) {
=======
		if ($return === FALSE && $query_builder === NULL && isset($CI->db) && is_object($CI->db) && ! empty($CI->db->conn_id))
		{
			return FALSE;
		}

		require_once(BASEPATH.'database/DB.php');

		if ($return === TRUE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return DB($params, $query_builder);
		}

		// Initialize the db variable. Needed to prevent
		// reference errors with some configurations
		$CI->db = '';

		// Load the DB class
		$CI->db =& DB($params, $query_builder);
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Load the Database Utilities Class
	 *
	 * @param	object	$db	Database object
	 * @param	bool	$return	Whether to return the DB Utilities class object or not
	 * @return	object
	 */
	public function dbutil($db = NULL, $return = FALSE)
	{
		$CI =& get_instance();

<<<<<<< HEAD
		if (!is_object($db) or !($db instanceof CI_DB)) {
			class_exists('CI_DB', FALSE) or $this->database();
			$db =& $CI->db;
		}

		require_once(BASEPATH . 'database/DB_utility.php');
		require_once(BASEPATH . 'database/drivers/' . $db->dbdriver . '/' . $db->dbdriver . '_utility.php');
		$class = 'CI_DB_' . $db->dbdriver . '_utility';

		if ($return === TRUE) {
=======
		if ( ! is_object($db) OR ! ($db instanceof CI_DB))
		{
			class_exists('CI_DB', FALSE) OR $this->database();
			$db =& $CI->db;
		}

		require_once(BASEPATH.'database/DB_utility.php');
		require_once(BASEPATH.'database/drivers/'.$db->dbdriver.'/'.$db->dbdriver.'_utility.php');
		$class = 'CI_DB_'.$db->dbdriver.'_utility';

		if ($return === TRUE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return new $class($db);
		}

		$CI->dbutil = new $class($db);
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Load the Database Forge Class
	 *
	 * @param	object	$db	Database object
	 * @param	bool	$return	Whether to return the DB Forge class object or not
	 * @return	object
	 */
	public function dbforge($db = NULL, $return = FALSE)
	{
		$CI =& get_instance();
<<<<<<< HEAD
		if (!is_object($db) or !($db instanceof CI_DB)) {
			class_exists('CI_DB', FALSE) or $this->database();
			$db =& $CI->db;
		}

		require_once(BASEPATH . 'database/DB_forge.php');
		require_once(BASEPATH . 'database/drivers/' . $db->dbdriver . '/' . $db->dbdriver . '_forge.php');

		if (!empty($db->subdriver)) {
			$driver_path = BASEPATH . 'database/drivers/' . $db->dbdriver . '/subdrivers/' . $db->dbdriver . '_' . $db->subdriver . '_forge.php';
			if (file_exists($driver_path)) {
				require_once($driver_path);
				$class = 'CI_DB_' . $db->dbdriver . '_' . $db->subdriver . '_forge';
			}
		} else {
			$class = 'CI_DB_' . $db->dbdriver . '_forge';
		}

		if ($return === TRUE) {
=======
		if ( ! is_object($db) OR ! ($db instanceof CI_DB))
		{
			class_exists('CI_DB', FALSE) OR $this->database();
			$db =& $CI->db;
		}

		require_once(BASEPATH.'database/DB_forge.php');
		require_once(BASEPATH.'database/drivers/'.$db->dbdriver.'/'.$db->dbdriver.'_forge.php');

		if ( ! empty($db->subdriver))
		{
			$driver_path = BASEPATH.'database/drivers/'.$db->dbdriver.'/subdrivers/'.$db->dbdriver.'_'.$db->subdriver.'_forge.php';
			if (file_exists($driver_path))
			{
				require_once($driver_path);
				$class = 'CI_DB_'.$db->dbdriver.'_'.$db->subdriver.'_forge';
			}
		}
		else
		{
			$class = 'CI_DB_'.$db->dbdriver.'_forge';
		}

		if ($return === TRUE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return new $class($db);
		}

		$CI->dbforge = new $class($db);
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * View Loader
	 *
	 * Loads "view" files.
	 *
	 * @param	string	$view	View name
	 * @param	array	$vars	An associative array of data
	 *				to be extracted for use in the view
	 * @param	bool	$return	Whether to return the view output
	 *				or leave it to the Output class
	 * @return	object|string
	 */
	public function view($view, $vars = array(), $return = FALSE)
	{
		return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_prepare_view_vars($vars), '_ci_return' => $return));
	}

	// --------------------------------------------------------------------

	/**
	 * Generic File Loader
	 *
	 * @param	string	$path	File path
	 * @param	bool	$return	Whether to return the file output
	 * @return	object|string
	 */
	public function file($path, $return = FALSE)
	{
		return $this->_ci_load(array('_ci_path' => $path, '_ci_return' => $return));
	}

	// --------------------------------------------------------------------

	/**
	 * Set Variables
	 *
	 * Once variables are set they become available within
	 * the controller class and its "view" files.
	 *
	 * @param	array|object|string	$vars
	 *					An associative array or object containing values
	 *					to be set, or a value's name if string
	 * @param 	string	$val	Value to set, only used if $vars is a string
	 * @return	object
	 */
	public function vars($vars, $val = '')
	{
		$vars = is_string($vars)
			? array($vars => $val)
			: $this->_ci_prepare_view_vars($vars);

<<<<<<< HEAD
		foreach ($vars as $key => $val) {
=======
		foreach ($vars as $key => $val)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$this->_ci_cached_vars[$key] = $val;
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Clear Cached Variables
	 *
	 * Clears the cached variables.
	 *
	 * @return	CI_Loader
	 */
	public function clear_vars()
	{
		$this->_ci_cached_vars = array();
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Variable
	 *
	 * Check if a variable is set and retrieve it.
	 *
	 * @param	string	$key	Variable name
	 * @return	mixed	The variable or NULL if not found
	 */
	public function get_var($key)
	{
		return isset($this->_ci_cached_vars[$key]) ? $this->_ci_cached_vars[$key] : NULL;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Variables
	 *
	 * Retrieves all loaded variables.
	 *
	 * @return	array
	 */
	public function get_vars()
	{
		return $this->_ci_cached_vars;
	}

	// --------------------------------------------------------------------

	/**
	 * Helper Loader
	 *
	 * @param	string|string[]	$helpers	Helper name(s)
	 * @return	object
	 */
	public function helper($helpers = array())
	{
<<<<<<< HEAD
		is_array($helpers) or $helpers = array($helpers);
		foreach ($helpers as &$helper) {
			$filename = basename($helper);
			$filepath = ($filename === $helper) ? '' : substr($helper, 0, strlen($helper) - strlen($filename));
			$filename = strtolower(preg_replace('#(_helper)?(\.php)?$#i', '', $filename)) . '_helper';
			$helper = $filepath . $filename;

			if (isset($this->_ci_helpers[$helper])) {
=======
		is_array($helpers) OR $helpers = array($helpers);
		foreach ($helpers as &$helper)
		{
			$filename = basename($helper);
			$filepath = ($filename === $helper) ? '' : substr($helper, 0, strlen($helper) - strlen($filename));
			$filename = strtolower(preg_replace('#(_helper)?(\.php)?$#i', '', $filename)).'_helper';
			$helper   = $filepath.$filename;

			if (isset($this->_ci_helpers[$helper]))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				continue;
			}

			// Is this a helper extension request?
<<<<<<< HEAD
			$ext_helper = config_item('subclass_prefix') . $filename;
			$ext_loaded = FALSE;
			foreach ($this->_ci_helper_paths as $path) {
				if (file_exists($path . 'helpers/' . $ext_helper . '.php')) {
					include_once($path . 'helpers/' . $ext_helper . '.php');
=======
			$ext_helper = config_item('subclass_prefix').$filename;
			$ext_loaded = FALSE;
			foreach ($this->_ci_helper_paths as $path)
			{
				if (file_exists($path.'helpers/'.$ext_helper.'.php'))
				{
					include_once($path.'helpers/'.$ext_helper.'.php');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					$ext_loaded = TRUE;
				}
			}

			// If we have loaded extensions - check if the base one is here
<<<<<<< HEAD
			if ($ext_loaded === TRUE) {
				$base_helper = BASEPATH . 'helpers/' . $helper . '.php';
				if (!file_exists($base_helper)) {
					show_error('Unable to load the requested file: helpers/' . $helper . '.php');
=======
			if ($ext_loaded === TRUE)
			{
				$base_helper = BASEPATH.'helpers/'.$helper.'.php';
				if ( ! file_exists($base_helper))
				{
					show_error('Unable to load the requested file: helpers/'.$helper.'.php');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				}

				include_once($base_helper);
				$this->_ci_helpers[$helper] = TRUE;
<<<<<<< HEAD
				log_message('info', 'Helper loaded: ' . $helper);
=======
				log_message('info', 'Helper loaded: '.$helper);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				continue;
			}

			// No extensions found ... try loading regular helpers and/or overrides
<<<<<<< HEAD
			foreach ($this->_ci_helper_paths as $path) {
				if (file_exists($path . 'helpers/' . $helper . '.php')) {
					include_once($path . 'helpers/' . $helper . '.php');

					$this->_ci_helpers[$helper] = TRUE;
					log_message('info', 'Helper loaded: ' . $helper);
=======
			foreach ($this->_ci_helper_paths as $path)
			{
				if (file_exists($path.'helpers/'.$helper.'.php'))
				{
					include_once($path.'helpers/'.$helper.'.php');

					$this->_ci_helpers[$helper] = TRUE;
					log_message('info', 'Helper loaded: '.$helper);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					break;
				}
			}

			// unable to load the helper
<<<<<<< HEAD
			if (!isset($this->_ci_helpers[$helper])) {
				show_error('Unable to load the requested file: helpers/' . $helper . '.php');
=======
			if ( ! isset($this->_ci_helpers[$helper]))
			{
				show_error('Unable to load the requested file: helpers/'.$helper.'.php');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			}
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Load Helpers
	 *
	 * An alias for the helper() method in case the developer has
	 * written the plural form of it.
	 *
	 * @uses	CI_Loader::helper()
	 * @param	string|string[]	$helpers	Helper name(s)
	 * @return	object
	 */
	public function helpers($helpers = array())
	{
		return $this->helper($helpers);
	}

	// --------------------------------------------------------------------

	/**
	 * Language Loader
	 *
	 * Loads language files.
	 *
	 * @param	string|string[]	$files	List of language file names to load
	 * @param	string		Language name
	 * @return	object
	 */
	public function language($files, $lang = '')
	{
		get_instance()->lang->load($files, $lang);
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Config Loader
	 *
	 * Loads a config file (an alias for CI_Config::load()).
	 *
	 * @uses	CI_Config::load()
	 * @param	string	$file			Configuration file name
	 * @param	bool	$use_sections		Whether configuration values should be loaded into their own section
	 * @param	bool	$fail_gracefully	Whether to just return FALSE or display an error message
	 * @return	bool	TRUE if the file was loaded correctly or FALSE on failure
	 */
	public function config($file, $use_sections = FALSE, $fail_gracefully = FALSE)
	{
		return get_instance()->config->load($file, $use_sections, $fail_gracefully);
	}

	// --------------------------------------------------------------------

	/**
	 * Driver Loader
	 *
	 * Loads a driver library.
	 *
	 * @param	string|string[]	$library	Driver name(s)
	 * @param	array		$params		Optional parameters to pass to the driver
	 * @param	string		$object_name	An optional object name to assign to
	 *
	 * @return	object|bool	Object or FALSE on failure if $library is a string
	 *				and $object_name is set. CI_Loader instance otherwise.
	 */
	public function driver($library, $params = NULL, $object_name = NULL)
	{
<<<<<<< HEAD
		if (is_array($library)) {
			foreach ($library as $key => $value) {
				if (is_int($key)) {
					$this->driver($value, $params);
				} else {
=======
		if (is_array($library))
		{
			foreach ($library as $key => $value)
			{
				if (is_int($key))
				{
					$this->driver($value, $params);
				}
				else
				{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					$this->driver($key, $params, $value);
				}
			}

			return $this;
<<<<<<< HEAD
		} elseif (empty($library)) {
			return FALSE;
		}

		if (!class_exists('CI_Driver_Library', FALSE)) {
			// We aren't instantiating an object here, just making the base class available
			require BASEPATH . 'libraries/Driver.php';
=======
		}
		elseif (empty($library))
		{
			return FALSE;
		}

		if ( ! class_exists('CI_Driver_Library', FALSE))
		{
			// We aren't instantiating an object here, just making the base class available
			require BASEPATH.'libraries/Driver.php';
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		// We can save the loader some time since Drivers will *always* be in a subfolder,
		// and typically identically named to the library
<<<<<<< HEAD
		if (!strpos($library, '/')) {
			$library = ucfirst($library) . '/' . $library;
=======
		if ( ! strpos($library, '/'))
		{
			$library = ucfirst($library).'/'.$library;
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		return $this->library($library, $params, $object_name);
	}

	// --------------------------------------------------------------------

	/**
	 * Add Package Path
	 *
	 * Prepends a parent path to the library, model, helper and config
	 * path arrays.
	 *
	 * @see	CI_Loader::$_ci_library_paths
	 * @see	CI_Loader::$_ci_model_paths
	 * @see CI_Loader::$_ci_helper_paths
	 * @see CI_Config::$_config_paths
	 *
	 * @param	string	$path		Path to add
	 * @param 	bool	$view_cascade	(default: TRUE)
	 * @return	object
	 */
	public function add_package_path($path, $view_cascade = TRUE)
	{
<<<<<<< HEAD
		$path = rtrim($path, '/') . '/';
=======
		$path = rtrim($path, '/').'/';
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

		array_unshift($this->_ci_library_paths, $path);
		array_unshift($this->_ci_model_paths, $path);
		array_unshift($this->_ci_helper_paths, $path);

<<<<<<< HEAD
		$this->_ci_view_paths = array($path . 'views/' => $view_cascade) + $this->_ci_view_paths;
=======
		$this->_ci_view_paths = array($path.'views/' => $view_cascade) + $this->_ci_view_paths;
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

		// Add config file path
		$config =& $this->_ci_get_component('config');
		$config->_config_paths[] = $path;

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Package Paths
	 *
	 * Return a list of all package paths.
	 *
	 * @param	bool	$include_base	Whether to include BASEPATH (default: FALSE)
	 * @return	array
	 */
	public function get_package_paths($include_base = FALSE)
	{
		return ($include_base === TRUE) ? $this->_ci_library_paths : $this->_ci_model_paths;
	}

	// --------------------------------------------------------------------

	/**
	 * Remove Package Path
	 *
	 * Remove a path from the library, model, helper and/or config
	 * path arrays if it exists. If no path is provided, the most recently
	 * added path will be removed removed.
	 *
	 * @param	string	$path	Path to remove
	 * @return	object
	 */
	public function remove_package_path($path = '')
	{
		$config =& $this->_ci_get_component('config');

<<<<<<< HEAD
		if ($path === '') {
=======
		if ($path === '')
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			array_shift($this->_ci_library_paths);
			array_shift($this->_ci_model_paths);
			array_shift($this->_ci_helper_paths);
			array_shift($this->_ci_view_paths);
			array_pop($config->_config_paths);
<<<<<<< HEAD
		} else {
			$path = rtrim($path, '/') . '/';
			foreach (array('_ci_library_paths', '_ci_model_paths', '_ci_helper_paths') as $var) {
				if (($key = array_search($path, $this->{$var})) !== FALSE) {
=======
		}
		else
		{
			$path = rtrim($path, '/').'/';
			foreach (array('_ci_library_paths', '_ci_model_paths', '_ci_helper_paths') as $var)
			{
				if (($key = array_search($path, $this->{$var})) !== FALSE)
				{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					unset($this->{$var}[$key]);
				}
			}

<<<<<<< HEAD
			if (isset($this->_ci_view_paths[$path . 'views/'])) {
				unset($this->_ci_view_paths[$path . 'views/']);
			}

			if (($key = array_search($path, $config->_config_paths)) !== FALSE) {
=======
			if (isset($this->_ci_view_paths[$path.'views/']))
			{
				unset($this->_ci_view_paths[$path.'views/']);
			}

			if (($key = array_search($path, $config->_config_paths)) !== FALSE)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				unset($config->_config_paths[$key]);
			}
		}

		// make sure the application default paths are still in the array
		$this->_ci_library_paths = array_unique(array_merge($this->_ci_library_paths, array(APPPATH, BASEPATH)));
		$this->_ci_helper_paths = array_unique(array_merge($this->_ci_helper_paths, array(APPPATH, BASEPATH)));
		$this->_ci_model_paths = array_unique(array_merge($this->_ci_model_paths, array(APPPATH)));
<<<<<<< HEAD
		$this->_ci_view_paths = array_merge($this->_ci_view_paths, array(APPPATH . 'views/' => TRUE));
=======
		$this->_ci_view_paths = array_merge($this->_ci_view_paths, array(APPPATH.'views/' => TRUE));
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		$config->_config_paths = array_unique(array_merge($config->_config_paths, array(APPPATH)));

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Internal CI Data Loader
	 *
	 * Used to load views and files.
	 *
	 * Variables are prefixed with _ci_ to avoid symbol collision with
	 * variables made available to view files.
	 *
	 * @used-by	CI_Loader::view()
	 * @used-by	CI_Loader::file()
	 * @param	array	$_ci_data	Data to load
	 * @return	object
	 */
	protected function _ci_load($_ci_data)
	{
		// Set the default data variables
<<<<<<< HEAD
		foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val) {
=======
		foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$$_ci_val = isset($_ci_data[$_ci_val]) ? $_ci_data[$_ci_val] : FALSE;
		}

		$file_exists = FALSE;

		// Set the path to the requested file
<<<<<<< HEAD
		if (is_string($_ci_path) && $_ci_path !== '') {
			$_ci_x = explode('/', $_ci_path);
			$_ci_file = end($_ci_x);
		} else {
			$_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
			$_ci_file = ($_ci_ext === '') ? $_ci_view . '.php' : $_ci_view;

			foreach ($this->_ci_view_paths as $_ci_view_file => $cascade) {
				if (file_exists($_ci_view_file . $_ci_file)) {
					$_ci_path = $_ci_view_file . $_ci_file;
=======
		if (is_string($_ci_path) && $_ci_path !== '')
		{
			$_ci_x = explode('/', $_ci_path);
			$_ci_file = end($_ci_x);
		}
		else
		{
			$_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
			$_ci_file = ($_ci_ext === '') ? $_ci_view.'.php' : $_ci_view;

			foreach ($this->_ci_view_paths as $_ci_view_file => $cascade)
			{
				if (file_exists($_ci_view_file.$_ci_file))
				{
					$_ci_path = $_ci_view_file.$_ci_file;
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					$file_exists = TRUE;
					break;
				}

<<<<<<< HEAD
				if (!$cascade) {
=======
				if ( ! $cascade)
				{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					break;
				}
			}
		}

<<<<<<< HEAD
		if (!$file_exists && !file_exists($_ci_path)) {
			show_error('Unable to load the requested file: ' . $_ci_file);
=======
		if ( ! $file_exists && ! file_exists($_ci_path))
		{
			show_error('Unable to load the requested file: '.$_ci_file);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		// This allows anything loaded using $this->load (views, files, etc.)
		// to become accessible from within the Controller and Model functions.
		$_ci_CI =& get_instance();
<<<<<<< HEAD
		foreach (get_object_vars($_ci_CI) as $_ci_key => $_ci_var) {
			if (!isset($this->$_ci_key)) {
=======
		foreach (get_object_vars($_ci_CI) as $_ci_key => $_ci_var)
		{
			if ( ! isset($this->$_ci_key))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$this->$_ci_key =& $_ci_CI->$_ci_key;
			}
		}

		/*
		 * Extract and cache variables
		 *
		 * You can either set variables using the dedicated $this->load->vars()
		 * function or via the second parameter of this function. We'll merge
		 * the two types and cache them so that views that are embedded within
		 * other views can have access to these variables.
		 */
<<<<<<< HEAD
		empty($_ci_vars) or $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $_ci_vars);
=======
		empty($_ci_vars) OR $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $_ci_vars);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		extract($this->_ci_cached_vars);

		/*
		 * Buffer the output
		 *
		 * We buffer the output for two reasons:
		 * 1. Speed. You get a significant speed boost.
		 * 2. So that the final rendered template can be post-processed by
		 *	the output class. Why do we need post processing? For one thing,
		 *	in order to show the elapsed page load time. Unless we can
		 *	intercept the content right before it's sent to the browser and
		 *	then stop the timer it won't be accurate.
		 */
		ob_start();

		// If the PHP installation does not support short tags we'll
		// do a little string replacement, changing the short tags
		// to standard PHP echo statements.
<<<<<<< HEAD
		if (!is_php('5.4') && !ini_get('short_open_tag') && config_item('rewrite_short_tags') === TRUE) {
			echo eval('?>' . preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($_ci_path))));
		} else {
			include($_ci_path); // include() vs include_once() allows for multiple views with the same name
		}

		log_message('info', 'File loaded: ' . $_ci_path);

		// Return the file data if requested
		if ($_ci_return === TRUE) {
=======
		if ( ! is_php('5.4') && ! ini_get('short_open_tag') && config_item('rewrite_short_tags') === TRUE)
		{
			echo eval('?>'.preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($_ci_path))));
		}
		else
		{
			include($_ci_path); // include() vs include_once() allows for multiple views with the same name
		}

		log_message('info', 'File loaded: '.$_ci_path);

		// Return the file data if requested
		if ($_ci_return === TRUE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$buffer = ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}

		/*
		 * Flush the buffer... or buff the flusher?
		 *
		 * In order to permit views to be nested within
		 * other views, we need to flush the content back out whenever
		 * we are beyond the first level of output buffering so that
		 * it can be seen and included properly by the first included
		 * template and any subsequent ones. Oy!
		 */
<<<<<<< HEAD
		if (ob_get_level() > $this->_ci_ob_level + 1) {
			ob_end_flush();
		} else {
=======
		if (ob_get_level() > $this->_ci_ob_level + 1)
		{
			ob_end_flush();
		}
		else
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$_ci_CI->output->append_output(ob_get_contents());
			@ob_end_clean();
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Internal CI Library Loader
	 *
	 * @used-by	CI_Loader::library()
	 * @uses	CI_Loader::_ci_init_library()
	 *
	 * @param	string	$class		Class name to load
	 * @param	mixed	$params		Optional parameters to pass to the class constructor
	 * @param	string	$object_name	Optional object name to assign to
	 * @return	void
	 */
	protected function _ci_load_library($class, $params = NULL, $object_name = NULL)
	{
		// Get the class name, and while we're at it trim any slashes.
		// The directory path can be included as part of the class name,
		// but we don't want a leading slash
		$class = str_replace('.php', '', trim($class, '/'));

		// Was the path included with the class name?
		// We look for a slash to determine this
<<<<<<< HEAD
		if (($last_slash = strrpos($class, '/')) !== FALSE) {
=======
		if (($last_slash = strrpos($class, '/')) !== FALSE)
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			// Extract the path
			$subdir = substr($class, 0, ++$last_slash);

			// Get the filename from the path
			$class = substr($class, $last_slash);
<<<<<<< HEAD
		} else {
=======
		}
		else
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$subdir = '';
		}

		$class = ucfirst($class);

		// Is this a stock library? There are a few special conditions if so ...
<<<<<<< HEAD
		if (file_exists(BASEPATH . 'libraries/' . $subdir . $class . '.php')) {
=======
		if (file_exists(BASEPATH.'libraries/'.$subdir.$class.'.php'))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return $this->_ci_load_stock_library($class, $subdir, $params, $object_name);
		}

		// Safety: Was the class already loaded by a previous call?
<<<<<<< HEAD
		if (class_exists($class, FALSE)) {
			$property = $object_name;
			if (empty($property)) {
=======
		if (class_exists($class, FALSE))
		{
			$property = $object_name;
			if (empty($property))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$property = strtolower($class);
				isset($this->_ci_varmap[$property]) && $property = $this->_ci_varmap[$property];
			}

			$CI =& get_instance();
<<<<<<< HEAD
			if (isset($CI->$property)) {
				log_message('debug', $class . ' class already loaded. Second attempt ignored.');
=======
			if (isset($CI->$property))
			{
				log_message('debug', $class.' class already loaded. Second attempt ignored.');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				return;
			}

			return $this->_ci_init_library($class, '', $params, $object_name);
		}

		// Let's search for the requested library file and load it.
<<<<<<< HEAD
		foreach ($this->_ci_library_paths as $path) {
			// BASEPATH has already been checked for
			if ($path === BASEPATH) {
				continue;
			}

			$filepath = $path . 'libraries/' . $subdir . $class . '.php';
			// Does the file exist? No? Bummer...
			if (!file_exists($filepath)) {
=======
		foreach ($this->_ci_library_paths as $path)
		{
			// BASEPATH has already been checked for
			if ($path === BASEPATH)
			{
				continue;
			}

			$filepath = $path.'libraries/'.$subdir.$class.'.php';
			// Does the file exist? No? Bummer...
			if ( ! file_exists($filepath))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				continue;
			}

			include_once($filepath);
			return $this->_ci_init_library($class, '', $params, $object_name);
		}

		// One last attempt. Maybe the library is in a subdirectory, but it wasn't specified?
<<<<<<< HEAD
		if ($subdir === '') {
			return $this->_ci_load_library($class . '/' . $class, $params, $object_name);
		}

		// If we got this far we were unable to find the requested class.
		log_message('error', 'Unable to load the requested class: ' . $class);
		show_error('Unable to load the requested class: ' . $class);
=======
		if ($subdir === '')
		{
			return $this->_ci_load_library($class.'/'.$class, $params, $object_name);
		}

		// If we got this far we were unable to find the requested class.
		log_message('error', 'Unable to load the requested class: '.$class);
		show_error('Unable to load the requested class: '.$class);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
	}

	// --------------------------------------------------------------------

	/**
	 * Internal CI Stock Library Loader
	 *
	 * @used-by	CI_Loader::_ci_load_library()
	 * @uses	CI_Loader::_ci_init_library()
	 *
	 * @param	string	$library_name	Library name to load
	 * @param	string	$file_path	Path to the library filename, relative to libraries/
	 * @param	mixed	$params		Optional parameters to pass to the class constructor
	 * @param	string	$object_name	Optional object name to assign to
	 * @return	void
	 */
	protected function _ci_load_stock_library($library_name, $file_path, $params, $object_name)
	{
		$prefix = 'CI_';

<<<<<<< HEAD
		if (class_exists($prefix . $library_name, FALSE)) {
			if (class_exists(config_item('subclass_prefix') . $library_name, FALSE)) {
=======
		if (class_exists($prefix.$library_name, FALSE))
		{
			if (class_exists(config_item('subclass_prefix').$library_name, FALSE))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$prefix = config_item('subclass_prefix');
			}

			$property = $object_name;
<<<<<<< HEAD
			if (empty($property)) {
=======
			if (empty($property))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$property = strtolower($library_name);
				isset($this->_ci_varmap[$property]) && $property = $this->_ci_varmap[$property];
			}

			$CI =& get_instance();
<<<<<<< HEAD
			if (!isset($CI->$property)) {
				return $this->_ci_init_library($library_name, $prefix, $params, $object_name);
			}

			log_message('debug', $library_name . ' class already loaded. Second attempt ignored.');
=======
			if ( ! isset($CI->$property))
			{
				return $this->_ci_init_library($library_name, $prefix, $params, $object_name);
			}

			log_message('debug', $library_name.' class already loaded. Second attempt ignored.');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return;
		}

		$paths = $this->_ci_library_paths;
		array_pop($paths); // BASEPATH
		array_pop($paths); // APPPATH (needs to be the first path checked)
		array_unshift($paths, APPPATH);

<<<<<<< HEAD
		foreach ($paths as $path) {
			if (file_exists($path = $path . 'libraries/' . $file_path . $library_name . '.php')) {
				// Override
				include_once($path);
				if (class_exists($prefix . $library_name, FALSE)) {
					return $this->_ci_init_library($library_name, $prefix, $params, $object_name);
				}

				log_message('debug', $path . ' exists, but does not declare ' . $prefix . $library_name);
			}
		}

		include_once(BASEPATH . 'libraries/' . $file_path . $library_name . '.php');

		// Check for extensions
		$subclass = config_item('subclass_prefix') . $library_name;
		foreach ($paths as $path) {
			if (file_exists($path = $path . 'libraries/' . $file_path . $subclass . '.php')) {
				include_once($path);
				if (class_exists($subclass, FALSE)) {
=======
		foreach ($paths as $path)
		{
			if (file_exists($path = $path.'libraries/'.$file_path.$library_name.'.php'))
			{
				// Override
				include_once($path);
				if (class_exists($prefix.$library_name, FALSE))
				{
					return $this->_ci_init_library($library_name, $prefix, $params, $object_name);
				}

				log_message('debug', $path.' exists, but does not declare '.$prefix.$library_name);
			}
		}

		include_once(BASEPATH.'libraries/'.$file_path.$library_name.'.php');

		// Check for extensions
		$subclass = config_item('subclass_prefix').$library_name;
		foreach ($paths as $path)
		{
			if (file_exists($path = $path.'libraries/'.$file_path.$subclass.'.php'))
			{
				include_once($path);
				if (class_exists($subclass, FALSE))
				{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
					$prefix = config_item('subclass_prefix');
					break;
				}

<<<<<<< HEAD
				log_message('debug', $path . ' exists, but does not declare ' . $subclass);
=======
				log_message('debug', $path.' exists, but does not declare '.$subclass);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			}
		}

		return $this->_ci_init_library($library_name, $prefix, $params, $object_name);
	}

	// --------------------------------------------------------------------

	/**
	 * Internal CI Library Instantiator
	 *
	 * @used-by	CI_Loader::_ci_load_stock_library()
	 * @used-by	CI_Loader::_ci_load_library()
	 *
	 * @param	string		$class		Class name
	 * @param	string		$prefix		Class name prefix
	 * @param	array|null|bool	$config		Optional configuration to pass to the class constructor:
	 *						FALSE to skip;
	 *						NULL to search in config paths;
	 *						array containing configuration data
	 * @param	string		$object_name	Optional object name to assign to
	 * @return	void
	 */
	protected function _ci_init_library($class, $prefix, $config = FALSE, $object_name = NULL)
	{
		// Is there an associated config file for this class? Note: these should always be lowercase
<<<<<<< HEAD
		if ($config === NULL) {
			// Fetch the config paths containing any package paths
			$config_component = $this->_ci_get_component('config');

			if (is_array($config_component->_config_paths)) {
				$found = FALSE;
				foreach ($config_component->_config_paths as $path) {
					// We test for both uppercase and lowercase, for servers that
					// are case-sensitive with regard to file names. Load global first,
					// override with environment next
					if (file_exists($path . 'config/' . strtolower($class) . '.php')) {
						include($path . 'config/' . strtolower($class) . '.php');
						$found = TRUE;
					} elseif (file_exists($path . 'config/' . ucfirst(strtolower($class)) . '.php')) {
						include($path . 'config/' . ucfirst(strtolower($class)) . '.php');
						$found = TRUE;
					}

					if (file_exists($path . 'config/' . ENVIRONMENT . '/' . strtolower($class) . '.php')) {
						include($path . 'config/' . ENVIRONMENT . '/' . strtolower($class) . '.php');
						$found = TRUE;
					} elseif (file_exists($path . 'config/' . ENVIRONMENT . '/' . ucfirst(strtolower($class)) . '.php')) {
						include($path . 'config/' . ENVIRONMENT . '/' . ucfirst(strtolower($class)) . '.php');
=======
		if ($config === NULL)
		{
			// Fetch the config paths containing any package paths
			$config_component = $this->_ci_get_component('config');

			if (is_array($config_component->_config_paths))
			{
				$found = FALSE;
				foreach ($config_component->_config_paths as $path)
				{
					// We test for both uppercase and lowercase, for servers that
					// are case-sensitive with regard to file names. Load global first,
					// override with environment next
					if (file_exists($path.'config/'.strtolower($class).'.php'))
					{
						include($path.'config/'.strtolower($class).'.php');
						$found = TRUE;
					}
					elseif (file_exists($path.'config/'.ucfirst(strtolower($class)).'.php'))
					{
						include($path.'config/'.ucfirst(strtolower($class)).'.php');
						$found = TRUE;
					}

					if (file_exists($path.'config/'.ENVIRONMENT.'/'.strtolower($class).'.php'))
					{
						include($path.'config/'.ENVIRONMENT.'/'.strtolower($class).'.php');
						$found = TRUE;
					}
					elseif (file_exists($path.'config/'.ENVIRONMENT.'/'.ucfirst(strtolower($class)).'.php'))
					{
						include($path.'config/'.ENVIRONMENT.'/'.ucfirst(strtolower($class)).'.php');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
						$found = TRUE;
					}

					// Break on the first found configuration, thus package
					// files are not overridden by default paths
<<<<<<< HEAD
					if ($found === TRUE) {
=======
					if ($found === TRUE)
					{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
						break;
					}
				}
			}
		}

<<<<<<< HEAD
		$class_name = $prefix . $class;

		// Is the class name valid?
		if (!class_exists($class_name, FALSE)) {
			log_message('error', 'Non-existent class: ' . $class_name);
			show_error('Non-existent class: ' . $class_name);
=======
		$class_name = $prefix.$class;

		// Is the class name valid?
		if ( ! class_exists($class_name, FALSE))
		{
			log_message('error', 'Non-existent class: '.$class_name);
			show_error('Non-existent class: '.$class_name);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		// Set the variable name we will assign the class to
		// Was a custom class name supplied? If so we'll use it
<<<<<<< HEAD
		if (empty($object_name)) {
			$object_name = strtolower($class);
			if (isset($this->_ci_varmap[$object_name])) {
=======
		if (empty($object_name))
		{
			$object_name = strtolower($class);
			if (isset($this->_ci_varmap[$object_name]))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$object_name = $this->_ci_varmap[$object_name];
			}
		}

		// Don't overwrite existing properties
		$CI =& get_instance();
<<<<<<< HEAD
		if (isset($CI->$object_name)) {
			if ($CI->$object_name instanceof $class_name) {
				log_message('debug', $class_name . " has already been instantiated as '" . $object_name . "'. Second attempt aborted.");
				return;
			}

			show_error("Resource '" . $object_name . "' already exists and is not a " . $class_name . " instance.");
=======
		if (isset($CI->$object_name))
		{
			if ($CI->$object_name instanceof $class_name)
			{
				log_message('debug', $class_name." has already been instantiated as '".$object_name."'. Second attempt aborted.");
				return;
			}

			show_error("Resource '".$object_name."' already exists and is not a ".$class_name." instance.");
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		}

		// Save the class name and object name
		$this->_ci_classes[$object_name] = $class;

		// Instantiate the class
		$CI->$object_name = isset($config)
			? new $class_name($config)
			: new $class_name();
	}

	// --------------------------------------------------------------------

	/**
	 * CI Autoloader
	 *
	 * Loads component listed in the config/autoload.php file.
	 *
	 * @used-by	CI_Loader::initialize()
	 * @return	void
	 */
	protected function _ci_autoloader()
	{
<<<<<<< HEAD
		if (file_exists(APPPATH . 'config/autoload.php')) {
			include(APPPATH . 'config/autoload.php');
		}

		if (file_exists(APPPATH . 'config/' . ENVIRONMENT . '/autoload.php')) {
			include(APPPATH . 'config/' . ENVIRONMENT . '/autoload.php');
		}

		if (!isset($autoload)) {
=======
		if (file_exists(APPPATH.'config/autoload.php'))
		{
			include(APPPATH.'config/autoload.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/autoload.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/autoload.php');
		}

		if ( ! isset($autoload))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			return;
		}

		// Autoload packages
<<<<<<< HEAD
		if (isset($autoload['packages'])) {
			foreach ($autoload['packages'] as $package_path) {
=======
		if (isset($autoload['packages']))
		{
			foreach ($autoload['packages'] as $package_path)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$this->add_package_path($package_path);
			}
		}

		// Load any custom config file
<<<<<<< HEAD
		if (count($autoload['config']) > 0) {
			foreach ($autoload['config'] as $val) {
=======
		if (count($autoload['config']) > 0)
		{
			foreach ($autoload['config'] as $val)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$this->config($val);
			}
		}

		// Autoload helpers and languages
<<<<<<< HEAD
		foreach (array('helper', 'language') as $type) {
			if (isset($autoload[$type]) && count($autoload[$type]) > 0) {
=======
		foreach (array('helper', 'language') as $type)
		{
			if (isset($autoload[$type]) && count($autoload[$type]) > 0)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$this->$type($autoload[$type]);
			}
		}

		// Autoload drivers
<<<<<<< HEAD
		if (isset($autoload['drivers'])) {
=======
		if (isset($autoload['drivers']))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$this->driver($autoload['drivers']);
		}

		// Load libraries
<<<<<<< HEAD
		if (isset($autoload['libraries']) && count($autoload['libraries']) > 0) {
			// Load the database driver.
			if (in_array('database', $autoload['libraries'])) {
=======
		if (isset($autoload['libraries']) && count($autoload['libraries']) > 0)
		{
			// Load the database driver.
			if (in_array('database', $autoload['libraries']))
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				$this->database();
				$autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
			}

			// Load all other libraries
			$this->library($autoload['libraries']);
		}

		// Autoload models
<<<<<<< HEAD
		if (isset($autoload['model'])) {
=======
		if (isset($autoload['model']))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$this->model($autoload['model']);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Prepare variables for _ci_vars, to be later extract()-ed inside views
	 *
	 * Converts objects to associative arrays and filters-out internal
	 * variable names (i.e. keys prefixed with '_ci_').
	 *
	 * @param	mixed	$vars
	 * @return	array
	 */
	protected function _ci_prepare_view_vars($vars)
	{
<<<<<<< HEAD
		if (!is_array($vars)) {
=======
		if ( ! is_array($vars))
		{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			$vars = is_object($vars)
				? get_object_vars($vars)
				: array();
		}

<<<<<<< HEAD
		foreach (array_keys($vars) as $key) {
			if (strncmp($key, '_ci_', 4) === 0) {
=======
		foreach (array_keys($vars) as $key)
		{
			if (strncmp($key, '_ci_', 4) === 0)
			{
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
				unset($vars[$key]);
			}
		}

		return $vars;
	}

	// --------------------------------------------------------------------

	/**
	 * CI Component getter
	 *
	 * Get a reference to a specific library or model.
	 *
	 * @param 	string	$component	Component name
	 * @return	bool
	 */
	protected function &_ci_get_component($component)
	{
		$CI =& get_instance();
		return $CI->$component;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
