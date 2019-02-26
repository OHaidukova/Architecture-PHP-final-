<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/02/2019
 * Time: 21:30
 */

$body = function () {
    ?>
    <h1>Please, contact us to order: </h1>
    <br />
    <h1>8-800-000-00-00</h1>
    <?php
};


$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Контакты',
        'body' => $body,
    ]
);
