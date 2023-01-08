# Laravel Page Meta Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sergeybruhin/page-meta.svg?style=flat-square)](https://packagist.org/packages/sergeybruhin/page-meta)
[![Total Downloads](https://img.shields.io/packagist/dt/sergeybruhin/page-meta.svg?style=flat-square)](https://packagist.org/packages/sergeybruhin/page-meta)

Basic and simple package to help you generate page meta inside your blade layout.

## Installation

You can install the package via composer:

```bash
composer require sergeybruhin/page-meta
```

## Compose Page Meta in Controller

```php
$openGraph = PageMeta::openGraphArticle(
        route('home'),
        $page->name,
        $page->description,
        'Your site name',
    );

    $openGraph->addImage(
        'https://example.com/image/url.png',
        100,
        100,
        Image::TYPE_WEBP
    );

    $openGraph->addTags(['Some tag', 'And', 'Another Tag']);

    $openGraph->addAuthors([
        'https://example.com/author/some-author',
        'https://example.com/author/another',
    ]);
```

## Render Page Meta

Feel free to render sitemap in place you prefer.

```php
 @include('page-meta::open-graph')
```

Widget will be rendered if variable **$openGraph** is set.

### Testing (Not yet 💁‍♂️)

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email sundaycreative@gmail.com instead of using the issue tracker.

## Credits

- [Sergey Bruhin](https://github.com/sergeybruhin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
