<?php

namespace Helpers;

use Helpers\Message;

/**
 * Classe para manipular sessões
 * Pode ser usada com um array multidimensional de até duas posições
 * Em caso de uma sessão com dupla posição, acesse:
 *
 * $_SESSION['indiceUm']['indiceDois'];
 * Session::get('indiceUm.indiceDois');
 *
 * Válido para todos os métodos de manipulação
 */
class Session
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Inicia uma sessão
	 *
	 * @access public
	 * @return session
	 */
	public static function init()
	{
		session_start();
	}

	/**
	 * Verifica se uma sessão existe
	 *
	 * @access public
	 * @param string 	$name 		Nome da sessão
	 * @return booelan
	 */
	public static function exists($name)
	{
		if ( strpos($name, '.') ):
			$key = explode('.', $name);

			if ( isset($_SESSION[$key[0]][$key[1]]) ):
				return true;
			endif;
		else:
			if ( isset($_SESSION[$name]) ):
				return true;
			endif;
		endif;

		return false;
	}

	/**
	 * Cria uma nova sessão
	 *
	 * @access public
	 * @param string 		$name 		Nome da sessão
	 * @param string 		$value 		Valor da sessão
	 * @return session
	 */
	public static function set($name, $value)
	{
		if ( strpos($name, '.') ):
			$key = explode('.', $name);

			return $_SESSION[$key[0]][$key[1]] = $value;
		else:
			return $_SESSION[$name] = $value;
		endif;

		return null;
	}

	/**
	 * Obtém o valor de uma sessão
	 *
	 * @access public
	 * @param string 		$name 		Nome da sessão
	 * @return session
	 */
	public static function get($name)
	{
		if ( strpos($name, '.') ):
			$key = explode('.', $name);

			if ( isset($_SESSION[$key[0]][$key[1]]) ):
				return $_SESSION[$key[0]][$key[1]];
			endif;
		else:
			if ( self::exists($name) ):
				return $_SESSION[$name];
			endif;
		endif;

		return null;
	}

	/**
	 * Deleta uma sessão
	 *
	 * @access public
	 * @param string 		$name 		Nome da sessão
	 * @return void
	 */
	public static function delete($name)
	{
		if ( strpos($name, '.') ):
			$key = explode('.', $name);

			if ( isset($_SESSION[$key[0]][$key[1]]) ):
				unset($_SESSION[$key[0]][$key[1]]);
			endif;
		else:
			if ( self::exists($name) ):
				unset($_SESSION[$name]);
			endif;
		endif;

		return null;
	}

	public static function referer()
	{
		return self::set('url_referer', $_SERVER['PHP_SELF']);
	}

	/**
	 * Destrói as sessões
	 *
	 * @access public
	 * @return void
	 */
	public static function destroy()
	{
		session_destroy();
	}
}