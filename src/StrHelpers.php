<?php


namespace Forrestedw\Helpers;


class StrHelpers
{
    /**
     * Whether two strings are the same.
     *
     * @param string $first
     * @param string $second
     * @param bool $caseSensitive
     * @return bool
     */
    public static function areEqual(string $first, string $second, bool $caseSensitive = true) : bool
    {
        if($caseSensitive) {
            return $first == $second;
        }
        return strtolower($first) === strtolower($second);
    }
    /**
     * Shows a string in context with text before and after it.
     * Helper function.
     *
     * @param $text
     * @param $position
     * @return bool|string
     */
    public static function withContext($haystack, $needle, $position)
    {
        $n = 100;
        $start = $position - $n;
        $length = strlen($needle) + ($n * 2);
        return substr($haystack, ($start < 0) ? 0 : $start, $length);
    }

    /**
     * Removes all spaces from a string.
     *
     * @param string $text
     * @return mixed
     */
    public static function noSpaces(string $text)
    {
        return str_replace(' ', '', $text);
    }

    /**
     * Two strings start with the same character.
     *
     * @param string $first
     * @param string $second
     * @return bool
     */
    public static function firstCharacterIsSame(string $first, string $second) : bool
    {
        return (strtolower($first[0]) === strtolower($second[0]));
    }

    /**
     * Tells us if the first letter of a string is lowercase.
     *
     * @param string $text
     * @return bool
     */
    public static function firstLetterIsLowerCase(string $text): bool
    {
        return $text[0] === strtolower($text[0]);
    }

    /**
     * Whether two strings are given in alphabetical order.
     *
     * @param string $first
     * @param string $second
     * @return bool
     */
    public static function areInAlphaOrder(string $first, string $second) : bool
    {
        // skip if there is poor spelling.
        if (self::hasTypo($first) || self::hasTypo($second)) {
            return true;
        }

        return trim(strtolower($first)) < trim(strtolower($second));
    }

    public static function areInReverseAlpha(string $first, string $second) : bool
    {
        return self::areInAlphaOrder($second, $first);
    }

    public static function firstLetterIsNextInAlpha(string $first, string $second)
    {
        $firstLetterOfFirstWord = strtolower(trim($first[0]));
        return (++$firstLetterOfFirstWord) === strtolower(trim($second[0]));
    }

    /**
     * Whether a word contains a typo.
     *
     * @param string $word
     * @return bool
     */
    public static function hasTypo(string $word) : bool
    {
        return pspell_check(pspell_new("en"), $word);
    }

    /**
     * Check what the first word in a sentence is.
     *
     * @param string $sentenceToCheck
     * @param string $firstWordIsNotThis
     * @param bool $caseSensitive
     * @return bool
     */
    public static function firstWordIs(string $sentenceToCheck, string $firstWordIsThis, bool $caseSensitive = true) : bool
    {
        $sentence = explode(' ', trim($sentenceToCheck));

        if($caseSensitive) {
            return trim($sentence[0]) === $firstWordIsThis;
        } else {
            return strtolower(trim($sentence[0])) === strtolower($firstWordIsThis);
        }
    }

    /**
     * Confirm first word in sentence is not.
     *
     * @param string $sentenceToCheck
     * @param string $firstWordIsNotThis
     * @param bool $caseSensitive
     * @return bool
     */
    public static function firstWordIsNot(string $sentenceToCheck, string $firstWordIsNotThis, bool $caseSensitive = true) : bool
    {
        return self::firstWordIs($sentenceToCheck, $firstWordIsNotThis, $caseSensitive) === false;
    }

    /**
     * Check what the last word in a sentence is.
     *
     * @param string $sentenceToCheck
     * @param string $lastWordIsNotThis
     * @param bool $caseSensitive
     * @return bool
     */
    public static function lastWordIs(string $sentenceToCheck, string $lastWordIsThis, bool $caseSensitive = true) : bool
    {
        $sentence = explode(' ', trim($sentenceToCheck));

        if($caseSensitive) {
            return trim(end($sentence)) === $lastWordIsThis;
        } else {
            return strtolower(end($sentence)) === strtolower($lastWordIsThis);
        }
    }

    /**
     * Confirm last word in sentence is not.
     *
     * @param string $sentenceToCheck
     * @param string $lastWordIsNotThis
     * @param bool $caseSensitive
     * @return bool
     */
    public static function lastWordIsNot(string $sentenceToCheck, string $lastWordIsNotThis, bool $caseSensitive = true) : bool
    {
        return self::lastWordIs($sentenceToCheck, $lastWordIsNotThis, $caseSensitive) === false;
    }

    /**
     * Whether a string is a valid post code.
     *
     * @param string $postCode
     * @return bool
     */
    public static function isValidPostCode(string $postCode) : bool
    {
        return preg_match('(GIR ?0AA|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]([0-9ABEHMNPRV-Y])?)|[0-9][A-HJKPS-UW]) ?[0-9][ABD-HJLNP-UW-Z]{2})', $postCode);
    }

    /**
     * If a string
     *
     * @param $intOrString
     * @return int|string
     */
    public static function convertStringNumberToInt($intOrString)
    {
        if (is_int($intOrString)) {
            return $intOrString;
        }

        if (is_string($intOrString)) {
            $int = (int)preg_replace("/[^0-9]/", "", $intOrString);
            if (strlen($int) === strlen($intOrString)) {
                return $int;
            }
            return (string)$intOrString; // assume was string, as when numbers were stripped then length changed.
        }
        throw new \Exception('Function only accepts int or string. Something else passed');
    }

    /**
     * Whether a string contains any numbers.
     *
     * @param string $text
     * @return bool
     */
    public static function containsNumbers(string $text)
    {
        return 1 === preg_match('~[0-9]~', $text);
    }
}
