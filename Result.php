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
 * TypoSquattingResult
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Result
{

    /**
     * Domain name
     * 
     * @var string
     * @access protected
     */
    protected $domain;

    /**
     * Array of typos by mapping
     *
     * @var array
     * @access protected
     */
    protected $typosByMapping = array();

    /**
     * Array of typos by missed letters
     *
     * @var array
     * @access protected
     */
    protected $typosByMissedLetters = array();

    /**
     * Array of typos by switching letters
     *
     * @var array
     * @access protected
     */
    protected $typosBySwitchingLetters = array();

    /**
     * Array of typos by double hitted button
     *
     * @var array
     * @access protected
     */
    protected $typosByDoubleHit = array();

    /**
     * Array of typos by adding prefix
     *
     * @var array
     * @access protected
     */
    protected $typosByAddingPrefix = array();

    /**
     * Array of typos by similar characters
     *
     * @var array
     * @access protected
     */
    protected $typosBySimilarCharacters = array();

    /**
     * Constructs a new object from by TypoSquatting
     * 
     * @param  string $domain
     * @return void
     */
    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Writing data to properties
     * 
     * @param  string $type
     * @param  mixed $value
     * @return void
     */
    public function addItem($type, $value)
    {
        if (isset($this->{$type}) && !in_array($value, $this->{$type})) {
            $this->{$type}[] = $value;
        }
    }

    /**
     * Reading data from properties
     *
     * @param  string $name
     * @return void
     */
    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        }
        
        return null;
    }

    /**
	 * Checking data
	 *
	 * @param  mixed $name
	 * @return boolean
	 */
    public function __isset($name)
    {
        return isset($this->{$name});
    }

    /**
     * Convert properties to json
     * 
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Convert properties to array
     *
     * @return array
     */
    public function toArray()
    {
        $output['domain'] = $this->domain;
        $output['typosByMapping'] = $this->typosByMapping;
        $output['typosByMissedLetters'] = $this->typosByMissedLetters;
        $output['typosBySwitchingLetters'] = $this->typosBySwitchingLetters;
        $output['typosByDoubleHit'] = $this->typosByDoubleHit;
        $output['typosByAddingPrefix'] = $this->typosByAddingPrefix;
        $output['typosBySimilarCharacters'] = $this->typosBySimilarCharacters;
        
        return $output;
    }
}