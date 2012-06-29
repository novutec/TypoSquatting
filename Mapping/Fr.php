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
 * @copyright  Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * @namespace Novutec\TypoSquatting
 */
namespace Novutec\TypoSquatting;

/**
 * Mapping for french keyboards
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Mapping_Fr extends AbstractMapping
{

    /**
	 * Keyboard layout mapping
	 * 
	 * @var array
	 * @access protected
	 */
    protected $map = array('a' => array(1, 2, 'z', 'q', 'é'), 
            'z' => array(2, 3, 'e', 'é', 's', 'a', 'q'), 'e' => array(3, 4, 'r', 'd', 's', 'z'), 
            'r' => array(4, 5, 't', 'f', 'd', 'e'), 't' => array(5, 6, 'y', 'g', 'f', 'r', '-'), 
            'y' => array(6, 7, 'u', 'h', 'g', 't', 'è', '-'), 
            'u' => array(7, 8, 'i', 'j', 'h', 'y', 'è'), 'i' => array(8, 9, 'o', 'k', 'j', 'u', 'ç'), 
            'o' => array(9, 0, 'p', 'l', 'k', 'i', 'ç', 'à'), 'p' => array(0, 'à', 'l', 'o'), 
            'q' => array('a', 'z', 's', 'w'), 's' => array('z', 'e', 'd', 'x', 'w', 'q'), 
            'd' => array('e', 'r', 'f', 'c', 'x', 's'), 'f' => array('r', 't', 'g', 'v', 'c', 'd'), 
            'g' => array('t', 'z', 'h', 'b', 'v', 'f'), 'h' => array('z', 'u', 'j', 'n', 'b', 'g'), 
            'j' => array('u', 'i', 'k', 'm', 'n', 'h'), 'k' => array('i', 'o', 'l', 'm', 'j'), 
            'l' => array('o', 'p', 'm', 'k'), 'm' => array('p', 'ù', 'l'), 
            'w' => array('q', 's', 'x'), 'x' => array('s', 'd', 'c', 'w'), 
            'c' => array('d', 'f', 'v', 'x'), 'v' => array('f', 'g', 'b', 'c'), 
            'b' => array('g', 'h', 'n', 'v'), 'n' => array('h', 'j', 'b'), '1' => array(2, 'a', 'é'), 
            '2' => array(1, 3, 'a', 'z', 'é'), '3' => array(2, 4, 'e', 'w', 'é'), 
            '4' => array(3, 5, 'r', 'e'), '5' => array(4, 6, 't', 'r'), 
            '6' => array(5, 7, 'y', 't', 'è'), '7' => array(6, 8, 'u', 'y', 'è'), 
            '8' => array(7, 9, 'i', 'u', 'è', 'ç'), '9' => array(8, 0, 'o', 'i', 'ç', 'à'), 
            '0' => array(9, 'à', 'ç', 'p', 'o'));

    /**
     * Double hit mapping
     * 
     * @var array
     * @access protected
     */
    protected $double = array('a' => array('z'), 'z' => array('a', 'e'), 'e' => array('w', 'r'), 
            'r' => array('e', 't'), 't' => array('r', 'y'), 'y' => array('t', 'u'), 
            'u' => array('y', 'i'), 'o' => array('i', 'p'), 'p' => array('o', 'ü'), 
            'q' => array('s'), 's' => array('q', 'd'), 'd' => array('s', 'f'), 
            'f' => array('d', 'g'), 'g' => array('f', 'h'), 'h' => array('g', 'j'), 
            'j' => array('h', 'k'), 'k' => array('j', 'l'), 'l' => array('k', 'm'), 
            'm' => array('l'), 'w' => array('x'), 'x' => array('w', 'c'), 'c' => array('x', 'v'), 
            'v' => array('c', 'b'), 'b' => array('v', 'n'), 'n' => array('b'), '1' => array(2), 
            '2' => array(1, 3), '3' => array(2, 4), '4' => array(3, 5), '5' => array(4, 6), 
            '6' => array(5, 7), '7' => array(6, 8), '8' => array(7, 9), '9' => array(8, 0), 
            '0' => array(9));

    /**
     * Similar character mapping
     * 
     * @var array
     * @access protected
     */
    protected $similar = array('e' => array('è', 'é'), 'è' => array('e', 'é'), 
            'é' => array('e', 'è'), 'à' => array('a'), 'a' => array('à'), 'ù' => array('u'), 
            'u' => array('ù'), 'c' => array('ç'), 'ç' => array('c'));
}