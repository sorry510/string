<?php

namespace sorry510;

/**
 * 字符串工具类，提供链式操作，统一使用unicode处理方式，字符串参数统一为最后的参数
 */
class StringUtil
{

  static function trim($str)
  {
    return trim($str);
  }

  /**
   * 首字符转换为小写
   */
  static function lcfirst($str)
  {
    return lcfirst($str);
  }

  static function startsWith($suffix, $str)
  {
    if (is_array($suffix)) {
      foreach ($suffix as $row) {
        $index = mb_strpos($str, $row);
        if ($index === 0) {
          return true;
        }
      }
      return false;
    } else {
      return mb_strpos($str, $suffix) === 0 ? true : false;
    }
  }

  static function endsWith($suffix, $str)
  {
    $length = mb_strlen($str);
    if (is_array($suffix)) {
      foreach ($suffix as $row) {
        $index = mb_strrpos($str, $row);
        if ($index !== false) {
          $rowLength = mb_strlen($row);
          if ($index + $rowLength === $length) {
            return true;
          }
        }
      }
      return false;
    } else {
      $index = mb_strrpos($str, $suffix);
      if ($index !== false) {
        $suffixLength = mb_strlen($suffix);
        if ($index + $suffixLength === $length) {
          return true;
        }
      }
      return false;
    }
  }

  /**
   * 首字符转换为大写
   */
  static function ucfirst($str)
  {
    return ucfirst($str);
  }

  static function toUpper($str)
  {
    return strtoupper($str);
  }

  static function tolower($str)
  {
    return strtolower($str);
  }

  static function slice($start, $length, $str)
  {
    return mb_substr($str, $start, $length);
  }

  static function length($str)
  {
    return mb_strlen($str);
  }

  // 返回一个链式调用类
  static function chain($str)
  {
    return (new class (self::Class, $str)
    {
      private $str;
      private $originClass;

      public function __construct($originClass, $str)
      {
        $this->str = $str;
        $this->originClass = $originClass;
      }

      public function __call($name, $args)
      {
        $args[] = $this->str; // 追加str
        $this->str = call_user_func_array([$this->originClass, $name], $args);
        if (is_string($this->str)) {
          return $this;
        } else {
          return $this->str;
        }
      }

      public function value()
      {
        return $this->str;
      }

      public function __toString()
      {
        return $this->str;
      }
    });
  }
}
