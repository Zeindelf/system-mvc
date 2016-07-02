<?php

namespace Core;

/**
 * Classe para setar configurações
 */
class Config
{
    //------------------------------------------------------------
    //  PROPERTIES
    //------------------------------------------------------------

    /**
     * Array contendo os valores
     *
     * @access protected
     * @var array
     */
    protected static $arr = [];

    //------------------------------------------------------------
    //  PUBLIC METHODS
    //------------------------------------------------------------

    /**
     * Seta o índice e o valor
     *
     * @access public
     * @param string    $key        Informe o nome do índice
     * @param mixed     $value      Informe o valor do índice
     * @return array
     */
    public static function set($key, $value)
    {
        return static::$arr[$key] = $value;
    }

    /**
     * Obtém o valor do índice informado
     * Separe por ponto '.' os índices do array para acessar seu valor
     *
     * @access public
     * @param string    $key        Informe o nome do índice para obtenção
     * @return mixed|null
     */
    public static function get($key)
    {
        if ( self::exists($key) ) {
            $key = explode('.', $key);
            $array = self::$arr[$key[0]];
            unset($key[0]);

            foreach ( $key as $k ) {
                $array = $array[$k];
            }

            return $array;
        } else {
            echo '<b>N&atilde;o existe o &iacute;ndice informado no array.</b>';
            return false;
        }
    }

    /**
     * Retorna true se existir o índice
     * Separe por ponto '.' os índices do array para a verificação
     *
     * @access public
     * @param string    $key        Informe o nome do índice para verificação
     * @return bool
     */
    public static function exists($key)
    {
        $key = explode('.', $key);
        $array = self::$arr[$key[0]];
        unset($key[0]);

        foreach ( $key as $k ) {
            if ( is_array(self::$arr) ) {
                $array = $array[$k];
            } else {
                return false;
            }
        }

        if ( !is_null($array) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Seta as mensagens pré-definidas em /app/Config/Message, trocando os coringas
     * %(número)% na ordem em que são passados
     *
     * O parâmetro $value pode ser passado como string única ou em forma de array
     * Se passado em forma de array, não defina seus índices, apenas monte-o como:
     * $value = [
     *      $coringaUm,
     *      $coringaDois,
     *      'Coringa três',
     *      12345,
     * ];
     *
     * Na ordem em que deseja que sejam substituídos
     *
     * @access public
     * @param string    $name   Índice do array que contém a mensagem
     * @param mix       $value  Strings a serem inseridas na mensagem
     * @return string
     */
    public static function message($name, $value = null)
    {
        $message = self::get($name);

        if ( isset($value) ) {
            if ( is_array($value) ) {
                for ( $i = 1; $i <= count($value); $i++ ) {
                    $message = str_replace('%' . $i . '%', $value[$i - 1], $message);
                }
            } else {
                $message = str_replace('%1%', $value, $message);
            }
        }

        return $message;
    }
}
