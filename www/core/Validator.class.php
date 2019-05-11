<?php
namespace Project\Core;

class Validator
{
    public $errors = [];

    /**
     * Validator constructor.
     * @param array $config
     * @param array $data
     */
    public function __construct(array $config, array $data)
    {
        if (count($data) != count($config['data'])) {
            die('Tentative : faille XSS');
        }
        foreach ($config['data'] as $name => $info) {
            if (!isset($data[$name])) {
                die('Tentative : faille XSS');
            } else {
                if (($info['required'] ?? false) && !self::notEmpty($data[$name])) {
                    $this->errors[] = $info['error'];
                }
                if (isset($info['minlength']) && !self::minLength($data[$name], $info['minlength'])) {
                    $this->errors[] = $info['error'];
                }
                if (isset($info['maxlength']) && !self::maxLength($data[$name], $info['maxlength'])) {
                    $this->errors[] = $info['error'];
                }
                if ('email' == $info['type'] && !self::checkEmail($data[$name])) {
                    $this->errors[] = $info['error'];
                }
                if (isset($info['confirm']) && $data[$name] != $data[$info['confirm']]) {
                    $this->errors[] = $info['error'];
                } elseif ('password' == $info['type'] && !self::checkPassword($data[$name])) {
                    $this->errors[] = $info['error'];
                }
            }
        }
    }

    /**
     * @param string $string
     * @return bool
     */
    public static function notEmpty(string $string): bool
    {
        return !empty(trim($string));
    }

    /**
     * @param string $string
     * @param $length
     * @return bool
     */
    public static function minLength(string $string, $length): bool
    {
        return strlen(trim($string)) >= $length;
    }

    /**
     * @param string $string
     * @param $length
     * @return bool
     */
    public static function maxLength(string $string, $length): bool
    {
        return strlen(trim($string)) <= $length;
    }

    /**
     * @param string $string
     * @return string
     */
    public static function checkEmail(string $string): string
    {
        return filter_var(trim($string), FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $string
     * @return bool
     */
    public static function checkPassword(string $string): bool
    {
        return
                    preg_match('#[a-z]#', $string) &&
                    preg_match('#[A-Z]#', $string) &&
                    preg_match('#[0-9]#', $string);
    }
}
