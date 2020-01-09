一个字符串的工具类

how to use

```
composer require sorry510/string 
```

demo

```
<?php 

require './vendor/autoload.php';

use sorry510\StringUtil;

$a = StringUtil::chain('  hello  ')->trim()->toUpper()->slice(1, 2); // EL，由__toString()转换
$a = StringUtil::chain('  hello  ')->trim()->toUpper()->slice(1, 2)->value(); // EL
```