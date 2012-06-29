Novutec TypoSquatting
=====================

Novutec TypoSquatting lets you determine typos by a given domain name. We also provide
international keyboard layouts for english, spanish, italian, german and more, so you can
determine the typos by language.

There are filters for missing characters, switching characters, double hitting a button,
similiar characters, adding prefixes and wrong characters.

Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
Licensed under the Apache License, Version 2.0 (the "License").

Installation
------------

Installing from source: `git clone git://github.com/novutec/TypoSquatting.git`

See Novutec DomainParser (http://github.com/novutec/DomainParser) and install it as well.

Move the source code to your preferred project folder.

Usage
-----

* include Typo.php
`require_once 'TypoSquatting/Typo.php';`

* create typo object
`$Typo = new Novutec\TypoSquatting\Typo();`

* call lookup method
`$result = $Typo->lookup($domain);`

* if you don't want to use all filters you may change that by providing boolean values
to the constructer or to call the respective method
`$Typo = new Novutec\TypoSquatting\Typo(true, true, false, ..);`
`$Typo->setSwitchingLetters(false);`

* you can choose 3 different return types. the types are php array, php object and json. by
default it is php object. if you want to change that call the format method before calling
the lookup method.
`$Typo->setFormat('json');`

Issues
------

Please report any issues via https://github.com/novutec/TypoSquatting/issues

LICENSE and COPYRIGHT
---------------------

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
