一个字符串的工具类

demo
```
$a = StringUtil::chain('  hello  ')->trim()->toUpper()->slice(1, 2); // EL，由__toString()转换
$a = StringUtil::chain('  hello  ')->trim()->toUpper()->slice(1, 2)->value(); // EL
```