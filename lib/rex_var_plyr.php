<?php 
/**
 * This file is part of the video package.
 *
 * @author (c) Friends Of REDAXO
 * @author <friendsof@redaxo.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class rex_var_plyr extends rex_var 
{
   protected function getOutput() 
   {
	$id = $this->getArg('id', 0, true);
        if (!in_array($this->getContext(), ['module', 'action']) || !is_numeric($id) || $id < 1 || $id > 20) {
            return false;
        }
    $value = $this->getContextData()->getValue('value' . $id);
    $out = '';   
       if($value) {
       $out = rex_plyr::outputVideo($value);
       }
	// Reine Textausgaben müssen mit 'self::quote()' als String maskiert werden.
	return self::quote($out);
   }
}