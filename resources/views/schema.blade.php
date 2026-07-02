<?php /** @var \SergeyBruhin\PageMeta\Meta\Schema\SchemaGraph $schema */ ?>
@if(isset($schema))
    <script type="application/ld+json">{!! json_encode($schema->toArray(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif
