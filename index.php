<?php

require_once __DIR__ . '/lib/footnotes.php';

Kirby::plugin('sylvainjule/footnotes', [
    'options' => array(
        'wrapper'  => 'div',
        'back'     => '&#8617;',
    ),
    'fieldMethods' => [
        'footnotes' => function($field) {
            return Footnotes::convert($field->text());
        },
        'ft' => function($field) {
            return $field->footnotes();
        },
        'withoutFootnotes' => function($field) {
            return Footnotes::convert($field->text(), true);
        },
        'onlyFootnotes' => function($field) {
            return Footnotes::convert($field->text(), false, true);
        },
    ],
    'snippets'     => [
        'footnotes_container' => __DIR__ . '/snippets/container.php',
        'footnotes_entry'     => __DIR__ . '/snippets/entry.php',
        'footnotes_reference' => __DIR__ . '/snippets/reference.php'
    ]
]);
