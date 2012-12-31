<?php
/**
 * Novutec Domain Tools
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * @namespace Novutec\TypoSquatting
 */
namespace Novutec\TypoSquatting;

/**
 * Mapping for english keyboards
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2013 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Mapping_En extends AbstractMapping
{

    /**
	 * Keyboard layout mapping
	 * 
	 * @var array
	 * @access protected
	 */
    protected $map = array('q' => array(1, 2, 'w', 'a'), 'w' => array(2, 3, 'e', 's', 'a', 'q'), 
            'e' => array(3, 4, 'r', 'd', 's', 'w'), 'r' => array(4, 5, 't', 'f', 'd', 'e'), 
            't' => array(5, 6, 'y', 'g', 'f', 'r'), 'y' => array(6, 7, 'u', 'h', 'g', 't'), 
            'u' => array(7, 8, 'i', 'j', 'h', 'y'), 'i' => array(8, 9, 'o', 'k', 'j', 'u'), 
            'o' => array(9, 0, 'p', 'l', 'k', 'i'), 'p' => array(0, '-', 'l', 'o'), 
            'a' => array('q', 'w', 's', 'z'), 's' => array('w', 'e', 'd', 'x', 'z', 'a'), 
            'd' => array('e', 'r', 'f', 'c', 'x', 's'), 'f' => array('r', 't', 'g', 'v', 'c', 'd'), 
            'g' => array('t', 'y', 'h', 'b', 'v', 'f'), 'h' => array('y', 'u', 'j', 'n', 'b', 'g'), 
            'j' => array('u', 'i', 'k', 'm', 'n', 'h'), 'k' => array('i', 'o', 'l', 'm', 'j'), 
            'l' => array('o', 'p', 'k'), 'z' => array('a', 's', 'x'), 
            'x' => array('s', 'd', 'c', 'z'), 'c' => array('d', 'f', 'v', 'x'), 
            'v' => array('f', 'g', 'b', 'c'), 'b' => array('g', 'h', 'n', 'v'), 
            'n' => array('h', 'j', 'm', 'b'), 'm' => array('j', 'k', 'n'), '1' => array(2, 'q'), 
            '2' => array(1, 3, 'w', 'q'), '3' => array(2, 4, 'e', 'w'), '4' => array(3, 5, 'r', 'e'), 
            '5' => array(4, 6, 't', 'r'), '6' => array(5, 7, 'y', 't'), '7' => array(6, 8, 'u', 'y'), 
            '8' => array(7, 9, 'i', 'u'), '9' => array(8, 0, 'o', 'i'), 
            '0' => array(9, 'p', 'o', '-'), '-' => array(0, 'p'));

    /**
     * Double hit mapping
     * 
     * @var array
     * @access protected
     */
    protected $double = array('q' => array('w'), 'w' => array('q', 'e'), 'e' => array('w', 'r'), 
            'r' => array('e', 't'), 't' => array('r', 'y'), 'y' => array('t', 'u'), 
            'u' => array('y', 'i'), 'o' => array('i', 'p'), 'p' => array('o'), 'a' => array('s'), 
            's' => array('a', 'd'), 'd' => array('s', 'f'), 'f' => array('d', 'g'), 
            'g' => array('f', 'h'), 'h' => array('g', 'j'), 'j' => array('h', 'k'), 
            'k' => array('j', 'l'), 'l' => array('k'), 'z' => array('x'), 'x' => array('z', 'c'), 
            'c' => array('x', 'v'), 'v' => array('c', 'b'), 'b' => array('v', 'n'), 
            'n' => array('b', 'm'), 'm' => array('n'), '1' => array(2), '2' => array(1, 3), 
            '3' => array(2, 4), '4' => array(3, 5), '5' => array(4, 6), '6' => array(5, 7), 
            '7' => array(6, 8), '8' => array(7, 9), '9' => array(8, 0), '0' => array(9, '-'), 
            '-' => array(0));
}