<?php
/**
 * Author: Vlad Shish <vladshish89@gmail.com>
 * Date: 20.07.2015
 * Format: http://book.cakephp.org/2.0/en/views/helpers.html
 */
App::uses('AppHelper', 'View/Helper');

/**
 * @package DOZO.User
 */
class AuthHelper extends AppHelper {

	/**
	 * {@inheritdoc}
	 *
	 * @var array
	 */
	public $helpers = array('Session');

	/**
	 * {@inheritdoc}
	 *
	 * @var array
	 */
	protected $_userData;

	/**
	 * Constructor
	 */
	public function __construct(View $view, $settings = array()) {
		parent::__construct($view, $settings);

		$this->_userData = $this->Session->read(AuthComponent::$sessionKey);
	}

	/**
	 * @return bool
	 */
	public function loggedIn() {
		return (bool)$this->user();
	}

	/**
	 * @param mix $key
	 * @return mixed
	 */
	public function user($key = null) {
		if (!is_null($key)) {
			return Hash::get($this->_userData, $key);
		}

		return $this->_userData;
	}

}