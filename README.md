Novutec TypoSquatting
=====================

To determine typos for a domain name. We also provide international keyboard layouts for
english, spanish, italian, german and more, so you can determine the typos by your language.

At first it creates domain names by an algorithm to determine by each character of the domain
name the nearby characters on the keyboard. Afterwards it creates domain names by skipping
characters and then it will switch the caracters of the given domain name. Then it will
create domain names by another algorithm to determine simultaneously hitted keys. At least
we are adding the prefix www and www- to the domain name and estimate similiar characters by
a language based mapping.

Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)
Licensed under the Apache License, Version 2.0 (the "License").

Installation
------------
Installing from source: `git clone git://github.com/novutec/TypoSquatting.git` or [download the latest release](https://github.com/novutec/TypoSquatting/zipball/master)

See Novutec DomainParser (http://github.com/novutec/DomainParser) or [download the latest release](https://github.com/novutec/DomainParser/zipball/master) and install it as well.

Move the source code to your preferred project folder.

Usage
-----
* include Typo.php
```
require_once 'DomainParser/Parser.php';
require_once 'TypoSquatting/Typo.php';
```

* create Typo() object
```
$Typo = new Novutec\TypoSquatting\Typo();
```

* call lookup() method
```
$result = $Typo->lookup($domain);
```

* if you don't want to use all filters you may call the respective method to deactivate it
```
$Typo->setSwitchingLetters(false);
```

* you may choose different keyboard layouts, to do so you may call the respective method.
e.g. en, de, es, fr, it and nl
```
$Typo->setLayout('es');
```

* you may choose 5 different return types. the types are array, object, json, serialize and
xml. by default it is object. if you want to change that call the format method before calling
the lookup method or provide it to the constructer. if you are not using object and an
error occurs, then exceptions will not be trapped within the response and thrown directy.
```
$Typo->setFormat('json');
$Typo = new Novutec\TypoSquatting\Typo('json');
```

ChangeLog
---------
See ChangeLog at https://github.com/novutec/TypoSquatting/wiki/ChangeLog

Issues
------
Please report any issues via https://github.com/novutec/TypoSquatting/issues

LICENSE and COPYRIGHT
---------------------
Copyright (c) 2007 - 2012 Novutec Inc. (http://www.novutec.com)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.