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
 * AbstractMapping
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
abstract class AbstractMapping
{

    /**
     * Keyboard layout mapping
     *
     * @var array
     * @access protected
     */
    protected $map = array();

    /**
     * Double hitted button mapping
     * 
     * @var array
     * @access protected
     */
    protected $double = array();

    /**
     * Similiar characters mapping
     * 
     * @var array
     * @access protected
     */
    protected $similar = array();

    /**
     * Returns the mapping of a possible tpyo by a given character if present
     * 
     * @param  mixed $character
     * @return array
     */
    public function getMapping($character)
    {
        if (isset($this->map[$character])) {
            return $this->map[$character];
        } else {
            return array();
        }
    }

    /**
     * Returns the mapping of the double hitted button by a given character if present
     * 
     * @param  mixed $character
     * @return array
     */
    public function getDouble($character)
    {
        if (isset($this->double[$character])) {
            return $this->double[$character];
        } else {
            return array();
        }
    }

    /**
     * Returns the mapping of similar characters by a given character if present
     *
     * @param  mixed $character
     * @return array
     */
    public function getSimilar($character)
    {
        if (isset($this->similar[$character])) {
            return $this->similar[$character];
        } else {
            return array();
        }
    }

    /**
     * Load Mapping
     * 
     * Returns a mapping object, if not null.
     *
     * @param  string $layout
     * @return mixed
     */
    public static function factory($layout)
    {
        if (file_exists(__DIR__ . '/' . ucfirst($layout) . '.php')) {
            include_once __DIR__ . '/' . ucfirst($layout) . '.php';
            $classname = 'Novutec\TypoSquatting\Mapping_' . ucfirst($layout);
            return new $classname();
        } else {
            return null;
        }
    }
}