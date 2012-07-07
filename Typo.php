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
 * define TypoSquatting Path
 */
define('TYPOSQUATTINGPATH', dirname(__FILE__));

/**
 * @see Mapping/AbstractMapping
 */
require_once TYPOSQUATTINGPATH . '/Mapping/AbstractMapping.php';

/**
 * @see Result
 */
require_once TYPOSQUATTINGPATH . '/Result.php';

/**
 * TypoSquatting
 *
 * Let you to know of possible typos to a given domain name
 *
 * @category   Novutec
 * @package    TypoSquatting
 * @copyright  Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
class Typo
{

    /**
     * Given domain name as object
     * 
     * @var string
     * @access protected
     */
    protected $domain;

    /**
     * Given domain name as hash
     * 
     * @var array
     * @access protected
     */
    protected $hash;

    /**
     * TLD of given domain name
     * 
     * @var array
     * @access protected
     */
    protected $tld;

    /**
     * Layout for the lookup
     *
     * @var string
     * @access protected
     */
    protected $layout = 'en';

    /**
     * Contains the result object
     * 
     * @var object
     * @access protected
     */
    protected $Result;

    /**
     * Output format 'object', 'array', 'json', 'serialize' or 'xml'
     * 
     * @var string
     * @access protected
     */
    protected $format = 'object';

    /**
     * Mapping object
     * 
     * @var object
     * @access protected
     */
    protected $Mapping;

    /**
     * Use mapping to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useMapping = true;

    /**
     * Use missed letter to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useMissedLetters = true;

    /**
     * Use switching letter to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useSwitchingLetters = true;

    /**
     * Use double hitted button to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useDoubleHit = true;

    /**
     * Add prefix www directly and with - to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useAddingPrefix = true;

    /**
     * Use similiar characters to determine typos
     * 
     * @var boolean
     * @access protected
     */
    protected $useSimilarCharacters = true;

    /**
     * Encoding of domain name
     * 
     * @var string
     * @access protected
     */
    protected $encoding = 'utf-8';

    /**
     * Creates a Typo object
     * 
     * By default all actions will be done
     * 
     * @param  string $format
     * @return void
     */
    public function __construct($format = 'object')
    {
        $this->setFormat($format);
    }

    /**
     * Set domain name
     * 
     * @param  string $domain
     * @param  string $defaultTld optional
     * @return void
     */
    private function setDomain($domain, $defaultTld = 'com')
    {
        $Parser = new \Novutec\Domainparser\Parser();
        $Domain = $Parser->parse($domain, $defaultTld);
        
        $this->domain = $Domain->domain;
        $this->hash = $this->mb_str_split($Domain->domain);
        $this->tld = $Domain->tld;
        
        if (isset($Domain->error)) {
            $this->Result->error = $Domain->error;
        }
    }

    /**
     * Looks up for typos
     * 
     * @param  string $domain
     * @param  string $defaultTld optional
     * @return array
     */
    public function lookup($domain, $defaultTld = 'com')
    {
        $this->Result = new Result();
        
        if ($domain !== null) {
            $this->setDomain($domain, $defaultTld);
        } else {
            return $this->Result;
        }
        
        if (! isset($this->Result->error)) {
            $this->Result->addItem('domain', $this->domain . '.' . $this->tld);
            
            if ($this->useMapping) {
                if (! $this->Mapping instanceof AbstractMapping) {
                    $this->Mapping = AbstractMapping::factory($this->layout);
                }
                
                if (is_object($this->Mapping)) {
                    $this->getTyposByMapping();
                }
            }
            
            if ($this->useMissedLetters) {
                $this->getTyposByMissedLetters();
            }
            
            if ($this->useSwitchingLetters) {
                $this->getTyposBySwitchingLetters();
            }
            
            if ($this->useDoubleHit) {
                if (! $this->Mapping instanceof AbstractMapping) {
                    $this->Mapping = AbstractMapping::factory($this->layout);
                }
                
                if (is_object($this->Mapping)) {
                    $this->getTyposByDoubleHit();
                }
            }
            
            if ($this->useAddingPrefix) {
                $this->getTyposByAddingPrefix();
            }
            
            if ($this->useSimilarCharacters) {
                if (! $this->Mapping instanceof AbstractMapping) {
                    $this->Mapping = AbstractMapping::factory($this->layout);
                }
                
                if (is_object($this->Mapping)) {
                    $this->getTyposBySimilarCharacters();
                }
            }
        }
        
        return $this->Result->get($this->format);
    }

    /**
     * Use mapping to determine typos
     * 
     * @return void
     */
    private function getTyposByMapping()
    {
        foreach ($this->hash as $position => $character) {
            $map = $this->Mapping->getMapping($character);
            
            if (! empty($map)) {
                foreach ($map as $typo) {
                    $this->Result->addItem('typosByMapping', $this->mb_substr_replace($this->domain, $typo, $position, 1) .
                             '.' . $this->tld);
                }
            }
        }
    }

    /**
     * Use missed letter to determine typos
     * 
     * @return void
     */
    private function getTyposByMissedLetters()
    {
        foreach ($this->hash as $position => $character) {
            $this->Result->addItem('typosByMissedLetters', $this->mb_substr_replace($this->domain, '', $position, 1) .
                     '.' . $this->tld);
        }
    }

    /**
     * Use switching letter to determine typos
     * 
     * @return void
     */
    private function getTyposBySwitchingLetters()
    {
        foreach ($this->hash as $position => $character) {
            if ($position === sizeof($this->hash) - 1) {
                break;
            }
            
            $string = $this->mb_substr_replace($this->domain, $this->hash[$position + 1], $position, 1);
            $this->Result->addItem('typosBySwitchingLetters', $this->mb_substr_replace($string, $this->hash[$position], $position +
                     1, 1) . '.' . $this->tld);
        }
    }

    /**
     * Use double hitted button to determine typos
     * 
     * @return void
     */
    private function getTyposByDoubleHit()
    {
        foreach ($this->hash as $position => $character) {
            $double = $this->Mapping->getDouble($character);
            
            if (! empty($double)) {
                foreach ($double as $typo) {
                    $this->Result->addItem('typosByDoubleHit', $this->mb_substr_replace($this->domain, $typo .
                             $character, $position, 1) . '.' . $this->tld);
                    $this->Result->addItem('typosByDoubleHit', $this->mb_substr_replace($this->domain, $character .
                             $typo, $position, 1) . '.' . $this->tld);
                }
            }
        }
    }

    /**
     * Add prefix www directly and with - to determine typos
     * 
     * @return void
     */
    private function getTyposByAddingPrefix()
    {
        $this->Result->addItem('typosByAddingPrefix', 'www' . $this->domain . '.' . $this->tld);
        $this->Result->addItem('typosByAddingPrefix', 'www-' . $this->domain . '.' . $this->tld);
    }

    /**
     * Use similar characters to determine typos
     * 
     * @return void
     */
    private function getTyposBySimilarCharacters()
    {
        foreach ($this->hash as $position => $character) {
            $similar = $this->Mapping->getSimilar($character);
            
            if (! empty($similar)) {
                foreach ($similar as $typo) {
                    $this->Result->addItem('typosBySimilarCharacters', $this->mb_substr_replace($this->domain, $typo, $position, 1) .
                             '.' . $this->tld);
                }
            }
        }
    }

    /**
     * Returns the IPv4 address by domain name
     * 
     * @param  string $domain
     * @return array
     */
    public function getIpAddress($domain)
    {
        return gethostbynamel($domain);
    }

    /**
     * Set keyboard layout
     * 
     * @param  string $layout
     * @return void
     */
    public function setLayout($layout = 'en')
    {
        $this->layout = filter_var($layout, FILTER_SANITIZE_STRING);
    }

    /**
     * Set output format
     * 
     * You may choose between 'object', 'array', 'json', 'serialize' or 'xml' output format
     * 
     * @param  string $format
     * @return void
     */
    public function setFormat($format = 'object')
    {
        $this->format = filter_var($format, FILTER_SANITIZE_STRING);
    }

    /**
     * Set encoding of domain name
     *
     * @param  string $encoding
     * @return void
     */
    public function setEncodng($encoding = 'utf-8')
    {
        $this->encoding = filter_var($encoding, FILTER_SANITIZE_STRING);
    }

    /**
     * Set filter mapping
     * 
     * @param  boolean $useMapping
     * @return void
     */
    public function setMapping($useMapping)
    {
        $this->useMapping = filter_var($useMapping, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set filter missed letters
     * 
     * @param  boolean $useMissedLetters
     * @return void
     */
    public function setMissedLetters($useMissedLetters)
    {
        $this->useMissedLetters = filter_var($useMissedLetters, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set filter switching letters
     * 
     * @param  boolean $useSwitchingLetters
     * @return void
     */
    public function setSwitchingLetters($useSwitchingLetters)
    {
        $this->useSwitchingLetters = filter_var($useSwitchingLetters, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set filter double hitted button
     * 
     * @param  boolean $useDoubleHit
     * @return void
     */
    public function setDoubleHit($useDoubleHit)
    {
        $this->useDoubleHit = filter_var($useDoubleHit, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set filter adding prefix
     * 
     * @param  boolean $useAddingPrefix
     * @return void
     */
    public function setAddingPrefix($useAddingPrefix)
    {
        $this->useAddingPrefix = filter_var($useAddingPrefix, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set filter similiar characters
     *
     * @param  boolean $useSimilarCharacters
     * @return void
     */
    public function setSimilarCharacters($useSimilarCharacters)
    {
        $this->useSimilarCharacters = filter_var($useSimilarCharacters, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * substr_replace is not working good with utf-8 therefore this is
     * function will mimic substr_replace by using  mb_substr. if mbstring
     * is not compiled within php or not present, it will still try to use
     * substr_replace. encoding can be set by calling the setEncoding method.
     * 
     * @param  string $string
     * @param  string $replacement
     * @param  integer $start
     * @param  integer $length
     * @return string
     */
    private function mb_substr_replace($string, $replacement, $start, $length = null)
    {
        if (extension_loaded('mbstring') === true) {
            $strLength = (is_null($this->encoding) === true) ? mb_strlen($string) : mb_strlen($string, $this->encoding);
            
            if ($start < 0) {
                $start = max(0, $strLength + $start);
            } else {
                if ($start > $strLength) {
                    $start = $strLength;
                }
            }
            
            if ($length < 0) {
                $length = max(0, $strLength - $start + $length);
            } else {
                if ((is_null($length) === true) || ($length > $strLength)) {
                    $length = $strLength;
                }
            }
            
            if (($start + $length) > $strLength) {
                $length = $strLength - $start;
            }
            
            if (is_null($this->encoding) === true) {
                return mb_substr($string, 0, $start) . $replacement .
                         mb_substr($string, $start + $length, $strLength - $start - $length);
            }
            
            return mb_substr($string, 0, $start, $this->encoding) . $replacement .
                     mb_substr($string, $start + $length, $strLength - $start - $length, $this->encoding);
        }
        
        return (is_null($length) === true) ? substr_replace($string, $replacement, $start) : substr_replace($string, $replacement, $start, $length);
    }

    /**
     * Splits an string to an array and not destorying the encoding
     * 
     * @param  string $string
     * @return array
     */
    private function mb_str_split($string)
    {
        return preg_split('/(?<!^)(?!$)/u', $string);
    }
}