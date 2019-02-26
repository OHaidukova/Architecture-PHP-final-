<?php

$body = function() use ($response) {

    echo 'App name: ' . $response['first_name'] . ' ' . $response['last_name']

    ?>

<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Новая страница',
        'body' => $body,
    ]
);