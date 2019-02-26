<script>
    window.onload = function () {
        let button = document.getElementById('button');
        let commentsBlock = document.getElementById('usersComments');
        button.addEventListener('click', function() {
            if(commentsBlock.style.display != 'block') {
                let id = document.getElementById('productId').value;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '../../product/comments/' + id, true);

                xhr.onreadystatechange = function () {
                    // console.log(xhr.readyState);
                    if (xhr.readyState !== 4) {
                        return;
                    }
                    ;
                    let data = JSON.parse(xhr.responseText);
                    // console.log('data: ', data);
                    if (data.length > 0) {
                        data.forEach(function (item, i) {
                            commentsBlock.innerHTML += `${i + 1}. <span>${item.text}</span> <br/><br/>`;
                        });
                    } else {
                        commentsBlock.innerHTML = `Отзывы отсутствуют <br/><br/>`;
                    };
                    commentsBlock.style.display = 'block';
                    document.getElementById('mainBlock').appendChild(commentsBlock);
                };

                xhr.send();
            }
        });

    };

</script>

<?php

/** @var \Model\Entity\Product $productInfo */
/** @var bool $isInBasket */
/** @var \Closure $path */
$body = function () use ($productInfo, $isInBasket, $path) {
    if($productInfo->getPurchases()) {
        echo '-- HIT -- ';
    }
    echo  '
        Супер ' . $productInfo->getName() . ' курс всего за ' . $productInfo->getPrice() . ' руб. 
        <br/><br/>' .
        '<form method="post">
            <input name="product" id="productId" type="hidden" value="' . $productInfo->getId() . '" />';
    if (!$isInBasket) {
        echo '<input type="submit" value="Положить в корзину" />';
    } else {
        echo 'Курс уже находится в корзине.<br/>';
    }
    echo '
        </form>
        <br/>
        <a href="' . $path('product_list') . '">Вернуться к списку</a>
        <br/>
        <br/>
        <input value="Посмотреть отзывы" id="button" type="button">
        <br/>
        <div id="usersComments" display="none"></div>
        <br/>
    ';
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Курс ' . $productInfo->getName(),
        'body' => $body,
    ]
);

