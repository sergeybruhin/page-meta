# Changelog

All notable changes to `page-meta` will be documented in this file

## 1.1.0 - 2026-07-12

- Add Schema.org / JSON-LD support (`Organization`, `WebSite`, `Article`, `BreadcrumbList`) via `PageMeta::schema*()` factories and the `page-meta::schema` view
- Fix `PageMeta::twitterCardSummary()` and `twitterCardSummaryLargeImage()` passing `$imageUrl`/`$description` positionally into constructors declared as `($title, $description, $image)`, which swapped the two values in the rendered tags
- Fix `SummaryLargeImage` setting `type` to `TYPE_SUMMARY`, so a large-image card rendered as `twitter:card=summary`
- Fix `twitter/summary-large-image` view emitting curly quotes (`”`) instead of straight quotes, producing invalid meta tags
- Fix implicit-nullable parameter declarations (`string $x = null`) deprecated in PHP 8.4

## 1.0.0 - 2026-04-10

- planned: HtmlMeta support (title, description, author, canonical, robots/noindex)

## 0.1.2 - 2023-01-22

- Add Twitter Cards

## 0.1.1 - 2023-01-22

- Fix minor issues

## 0.1.0 - 2023-01-08

- Initial release: OpenGraph meta tag support
