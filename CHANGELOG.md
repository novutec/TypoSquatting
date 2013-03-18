### 1.1.5 (Mar 18, 2013)
* changed own version in composer.json
* fixed release dates in CHANGELOG.md

### 1.1.4 (Mar 14, 2013)
* added composer.json
* added CHANGELOG.md
* changed link to CHANGELOG.md in README.md
* changed description of Typo Squatting in README.md

### 1.1.3 (Dec 31, 2012)
* changed documentation and description in README.md
* changed copyright to 2013

### 1.1.2 (Nov 30, 2012)
###### Note: You will need the [DomainParser](https://github.com/novutec/DomainParser) version 1.1.5 and above!
* added support for IDN top level domain names
* fixed bug in `typosByMissedLetters` method of `Typo` class
* fixed bug in `typosBySwitchingLetters` method of `Typo` class
* fixed bug in `addItem` method of `Result` class
* added `setLayout` description to README.md

### 1.1.1 (Jul 07, 2012)
* added `dirname(__FILE__)` to require_once of classes
* changed format in README.md 

### 1.1.0 (Jul 06, 2012)
* added `setEncoding()` method for setting the encoding of given domain name
* added public method `getIpAddress()` to return ipv4 address by domain name
* added additional output format serialize
* added additional output format XML
* added `filter_var()` to all public methods except `setDomain()` and `getIpAddress()`
* changed exception handling, it will pass through the error messages from the DomainParser but will not throw exceptions
* changed comments in some PHP files to me more accurate
* changed description in README.md
* changed `toArray()` method to improve it
* changed `AbstractMapping::factory()` if layout is not available it will use 'en'
* changed `__constructer()` method: format is the only parameter now

### 1.0.1 (Jun 29, 2012)
* fixed url of DomainParser repository 

### 1.0.0 (Jun 29, 2012)
* Initial commit