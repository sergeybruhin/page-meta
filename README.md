# Laravel Page Meta Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sergeybruhin/page-meta.svg?style=flat-square)](https://packagist.org/packages/sergeybruhin/page-meta)
[![Total Downloads](https://img.shields.io/packagist/dt/sergeybruhin/page-meta.svg?style=flat-square)](https://packagist.org/packages/sergeybruhin/page-meta)

Basic and simple package to help you generate page meta inside your blade layout.

## Installation

You can install the package via composer:

```bash
composer require sergeybruhin/page-meta
```

---

## Head Meta

Generates standard HTML `<head>` meta tags: title, description, author, keywords, robots directives, and canonical URL.

### Controller

```php
$headMeta = PageMeta::headMeta(
    title: 'My Article',
    description: 'Short page description',
);

$headMeta->setTitle('My Article', ' | ')  // appends site name: "My Article | Site Name"
         ->setCanonical(route('blog.show', $post))
         ->setAuthor('Sergey Bruhin')
         ->setKeywords(['laravel', 'php', 'seo'])
         ->noIndex()
         ->noFollow();
```

### Render

```blade
@include('page-meta::head-meta')
```

Template renders when `$headMeta` is set in the view.

### Output

```html
<title>My Article | Site Name</title>
<meta name="description" content="Short page description">
<meta name="author" content="Sergey Bruhin">
<meta name="keywords" content="laravel, php, seo">
<meta name="robots" content="noindex, nofollow">
<link rel="canonical" href="https://example.com/blog/my-article">
```

### Available methods

| Method | Description |
|---|---|
| `setTitle(string, ?string $separator)` | Page title. Pass a separator (e.g. `' \| '`) to append `globalSiteName` from config. |
| `setDescription(string)` | Meta description. |
| `setAuthor(string)` | Meta author. |
| `setCanonical(string)` | Canonical URL. Only rendered when set. |
| `setKeywords(string\|array)` | Meta keywords. |
| `setRobots(string)` | Raw robots string, e.g. `'noindex, nofollow'`. |
| `noIndex()` | Adds `noindex` to robots. |
| `noFollow()` | Adds `nofollow` to robots. |
| `noArchive()` | Adds `noarchive` to robots. |
| `noSnippet()` | Adds `nosnippet` to robots. |

### Configuration

Publish the config to set your site name:

```bash
php artisan vendor:publish --provider="SergeyBruhin\PageMeta\Providers\PageMetaServiceProvider" --tag="config"
```

```php
// config/page-meta.php
return [
    'globalSiteName' => 'Your Site Name',
];
```

---

## Open Graph

### Controller

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

$openGraph->addTags([
    'Some tag',
    'And',
    'Another Tag'
]);

$openGraph->addAuthors([
    'https://example.com/author/some-author',
    'https://example.com/author/another',
]);
```

### Render

```blade
@include('page-meta::open-graph')
```

Template renders when `$openGraph` is set in the view.

---

---

## Schema.org (JSON-LD)

Unlike Head Meta / Open Graph / Twitter (which render tag-by-tag from a Blade
partial), Schema.org nodes are plain data objects that serialize to a nested
array via `toArray()`/`JsonSerializable`, then get JSON-encoded once as a
single `<script type="application/ld+json">` tag.

### Controller

```php
$organization = PageMeta::schemaOrganization('Your Site', route('home'))
    ->setDescription('Short site description')
    ->setTelephone('+1 555 0100')
    ->setEmail('hello@example.com')
    ->setAddress(
        (new PostalAddress())
            ->setStreetAddress('123 Main St')
            ->setAddressLocality('Springfield')
            ->setAddressCountry('US')
    )
    ->addSameAsMany([
        'https://www.instagram.com/yoursite/',
        'https://www.facebook.com/yoursite/',
    ]);

$website = PageMeta::schemaWebsite('Your Site', route('home'))
    ->setPublisher($organization);

$article = PageMeta::schemaArticle($post->name)
    ->setDescription($post->description)
    ->setImage(new ImageObject($post->cover->url, 1200, 630))
    ->setDatePublished($post->published_at)
    ->setUrl(route('blog.show', $post))
    ->addKeywords($post->tags->pluck('name')->all());

$breadcrumbs = PageMeta::schemaBreadcrumbList($post->breadcrumbs);

$schema = PageMeta::schemaGraph($organization, $website, $article, $breadcrumbs);
```

`schemaGraph()` always wraps its nodes in a single `{"@context": "https://schema.org", "@graph": [...]}` document — even for a single node — so there's one entry point regardless of how many nodes a page needs.

### Render

```blade
@include('page-meta::schema')
```

Template renders when `$schema` is set in the view.

### Available types

| Factory | Type | Notes |
|---|---|---|
| `PageMeta::schemaOrganization(name, url, type = 'Organization')` | `Organization` | Pass `Organization::TYPE_LOCAL_BUSINESS` for a `LocalBusiness`-flavored node. |
| `PageMeta::schemaWebsite(name, url)` | `WebSite` | `setPublisher(Organization)`. |
| `PageMeta::schemaArticle(headline)` | `Article` | `setImage`, `setDatePublished`/`setDateModified`, `setAuthor(Person)`, `setPublisher(Organization)`, `addKeywords`. |
| `PageMeta::schemaBreadcrumbList(array $breadcrumbs = [])` | `BreadcrumbList` | Accepts `[['url' => .., 'name' => ..], ...]` directly. |

Value objects live under `Meta\Schema\Partials`: `PostalAddress`, `ImageObject`, `Person`, `ListItem`.

Every property is stripped from the output when `null`/empty, so it's safe to
build a node from partially-available data.

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
