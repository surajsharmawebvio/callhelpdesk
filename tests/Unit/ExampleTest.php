<?php

test('that true is true', function () {
    // use mongodb and fetch tables collections
    $client = new MongoDB\Client(env('DB_DSN'));
    
    // 10 data from Company collection
    $collection = $client->callhelpdesk->company;
    $documents = $collection->find([], ['limit' => 10])->toArray();
    print_r($documents);
});