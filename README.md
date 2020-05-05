# Helpers

Helpers is a collection of string and array functions to help writing human-readable code easier.

## Installation


```bash
composer require forrestedw/helpers
```

## Example

```php
use Forrestedw\Helpers\StrHelpers;

// case insensitive
StrHelper::firstCharacterIsSame('Apple','ant') // true

StrHelper::firstCharacterIsSame('Apple','ball') // false
```


## License
[MIT](https://choosealicense.com/licenses/mit/)
