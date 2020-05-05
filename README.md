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

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)
