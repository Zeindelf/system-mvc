<?php

namespace Helpers;

use Core\Config;

use Database\Read;

use Helpers\Session;

/**
 * Classe de validações de dados informados pelo usuário
 */
class Validate
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Variável que decide as validações
	 *
	 * @access private
	 * @var boolean
	 */
	private $checked = false;

	/**
	 * Armazena as mensagens de erro
	 *
	 * @access private
	 * @var array
	 */
	private $errors = [];

	/**
	 * Armazena a lista de erros
	 *
	 * @var string
	 */
	private $listMessages;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Realiza a validação de todos os dados informados
	 *
	 * @access public
	 * @param mix 		$data 		Dados a serem validados
	 * @param array 	$items 		Itens da validação
	 * @return void
	 */
	public function check($data, array $items)
	{
		foreach ( $items as $item => $rules ):
			foreach ( $rules as $rule => $ruleVal ):

				$value = $data[$item];
				$name = $items[$item]['name'];

				if ( $rule === 'required' && empty($value) ):
					$this->setError("O campo <b>{$name}</b> não pode ser vazio.");

				elseif ( !empty($value) ):
					switch ( $rule ):
						case 'email':
							if ( !$this->email($value) ):
								$this->setError("Este formato de e-mail não é válido.");
							endif;
							break;

						case 'filter':
							$value = $this->doubleChar($value);

							foreach ( Config::get('filter') as $filter ):
								if ( is_int(strripos($value, $filter)) ):
									$this->setError("Não utilize nomes ofensivos");
								endif;
							endforeach;
							break;

						case 'matches':
							if ( $value != $data[$ruleVal] ):
								$this->setError("O campo <b>{$name}</b> não confere.");
							endif;
							break;

						case 'max':
							if ( strlen($value) > $ruleVal ):
								$this->setError("O campo <b>{$name}</b> requer o máximo de <b>{$ruleVal}</b> caracteres.");
							endif;
							break;

						case 'min':
							if ( strlen($value) < $ruleVal ):
								$this->setError("O campo <b>{$name}</b> requer o mínimo de <b>{$ruleVal}</b> caracteres.");
							endif;
							break;

						case 'unique':
							$value = strtolower($value);
							$value = $this->numToStr($value);

							$check = new Read();
							$check->executeRead($ruleVal, "WHERE {$item} = :item", "item={$value}");

							// Realizar a checagem se o campo informado como único já pertence ao usuário
							$userLogged = Session::get(Config::get('session.user'))[$item];

							if ( $check->getResult() && $userLogged !== $value):
								$this->setError("<b>{$name}</b> já cadastrado.");
							endif;
							break;

						case 'username':
							if ( !preg_match("/^([a-zA-Z0-9]+)$/", $value) ):
								$this->setError("O campo <b>{$name}</b> não pode conter caracteres especias e/ou espaços.");
							endif;
							break;
					endswitch;
				endif;

			endforeach;
		endforeach;

		if ( empty($this->errors) ):
			$this->checked = true;
		endif;
	}

	/**
	 * Cria uma lista pre-definida com os erros gerados, já
	 * formatada para ser gerada na view pelo helper Flash
	 *
	 * @return string
	 */
	public function listMessages()
	{
		$this->listMessages = '<h3>Por favor, corrija o(s) erro(s) abaixo:</h3>
								<ul class="message-errors">';

		foreach ( $this->errors() as $error ):
			$this->listMessages .= '<li>' . $error . '</li>';
		endforeach;

		$this->listMessages .= '</ul>';

		return $this->listMessages;
	}

	/**
	 * Faz a checagem das validações
	 *
	 * @access public
	 * @return boolean
	 */
	public function checked()
	{
		return $this->checked;
	}

	/**
	 * Retorna as mensagens de erro
	 *
	 * @access public
	 * @return array
	 */
	public function errors()
	{
		return $this->errors;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Verifica se o e-mail informado é válido
	 *
	 * @access private
	 * @param string 	$email 		Formato de e-mail
	 * @return boolean
	 */
	private function email($email)
	{
        $format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match($format, $email)):
            return true;
        else:
            return false;
        endif;
	}

	/**
	 * Retira ocorrências de caracteres rapetidos na string para verificação
	 *
	 * @param string 	$string 	String para verificação
	 * @return string 	String sem caracteres repetidos
	 */
	private function doubleChar($string)
	{
		$string = $this->numToStr($string);

		$letter = range('a', 'z');
		$qntChar = 5;

		for ( $i = 0; $i < count($letter); $i++ ):
			for ( $j = 0; $j < $qntChar; $j++ ):
				$repeat = str_repeat($letter[$i], $j);
				$arrString = str_split($repeat);
			endfor;

			$arr[] = $arrString;
		endfor;

		for ( $i = 0; $i < count($arr); $i++ ):
			for ( $j = 0; $j < count($arr[$i]); $j++ ):
				$newRepeat[] = str_repeat($arr[$i][$j], $j + 1);
			endfor;
		endfor;

		$doubleChar = array_chunk($newRepeat, $qntChar - 1);

		for ( $i = 0; $i < count($doubleChar); $i++ ):
			for ( $j = 1; $j <= 5; $j++ ):
				$string = str_replace($doubleChar[$i], $letter[$i], $string);
			endfor;
		endfor;

		return $string;
	}

	/**
	 * Converte números contido na string em letras associadas
	 * 'z31nd3lf' é convertido para 'zeindelf'
	 *
	 * @param string 	$string 	String para ser convertida
	 * @return string
	 */
	private function numToStr($string)
	{
		$arrString['number'] = '0123456789';
		$arrString['letters'] ='oizeasbtbg';

		// Converte números em letras para verificação
		$string = strtr($string, $arrString['number'], $arrString['letters']);

		return $string;
	}

	/**
	 * Seta as mensagens de erros
	 *
	 * @access private
	 * @param string 	$error 		Mensagem a ser informada
	 * @return void
	 */
	private function setError($error)
	{
		$this->errors[] = $error;
	}
}