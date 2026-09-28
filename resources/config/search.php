<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disable Search Index
    |--------------------------------------------------------------------------
    |
    | Keep users out of the site search index. Indexed users can be
    | returned by the search() plugin function in any theme.
    |
    */
    'disable_search_index' => env('USERS_DISABLE_SEARCH_INDEX', true),
];
