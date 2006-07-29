<?php

/**
 * Smarty {wordform} function plugin
 *
 * File:       function.wordform.php
 * Type:       function
 * Name:       wordform
 * Date:       Jul 29, 2006
 * Purpose:    Prints plural form for Russian word
 * Input:
 *        - n      (required) - number
 *        - one    (required) - '1' wordform
 *        - two    (required) - '2, 3 or 4' wordform
 *        - many   (required) - 'many' wordform
 *        - format (optional) - format of output: 'w', 'n w', 'w: n' etc. ('w' for word and 'n' for number), default: 'w'
 * Examples:
 *        {wordform n=$x one='запись' two='записи' many='записей'}
 *        {wordform n=$y one='огурец' two='огурца' many='огурцов' format='n w'}
 *
 * @author     Alex Olshansky <ao@crea.net.ua>
 * @version    1.0
 */

function smarty_function_wordform($params, &$smarty)
{
  $last_digit = substr($params['n'], -1);
  $last_two = substr($params['n'], -2);

  if ($last_two >= 11 && $last_two <= 14) {
    $w = $params['many'];
  } elseif ($last_digit == 1) {
    $w = $params['one'];
  } elseif ($last_digit == 2 || $last_digit == 3 || $last_digit == 4) {
    $w = $params['two'];
  } elseif ($last_digit == 0 || $last_digit > 4) {
    $w = $params['many'];
  }

  if (!$params['format']) {
    $params['format'] = 'w';
  }

  return str_replace('w', $w, str_replace('n', $params['n'], $params['format']));
}

?>