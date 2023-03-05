<?php

return [
    /*
     * DataTables JavaScript global namespace.
     */

    'namespace' => env('DATATABLES_HTML_NAMESPACE', 'LaravelDataTables'),

    /*
     * Default table attributes when generating the table.
     */
    'table' => [
        'class' => env('DATATABLES_HTML_TABLE_CLASS', 'table'),
        'id'    => env('DATATABLES_HTML_TABLE_ID', 'dataTableBuilder'),
    ],

    /*
     * Html builder script template.
     */
    'script' => env('DATATABLES_HTML_SCRIPT', 'datatables::script'),

    /*
     * Html builder script template for DataTables Editor integration.
     */
    'editor' => env('DATATABLES_HTML_EDITOR', 'datatables::editor'),
];
