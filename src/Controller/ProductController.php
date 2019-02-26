<?php

declare(strict_types = 1);

namespace Controller;

use Model;
use Framework\Registry;
use Framework\Render;
use Service\Order\Basket;
use Service\Product\Product;
use Service\Product\PurchasesProduct;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController
{
    use Render;

    /**
     * Информация о продукте
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function infoAction(Request $request, $id): Response
    {
        $basket = (new Basket($request->getSession()));

        if ($request->isMethod(Request::METHOD_POST)) {
            $result = $basket->addProduct((int)$request->request->get('product'));
            if(!$result) {
                return $this->render('contact.html.php');
            }
        }

        $productInfo = new PurchasesProduct(Registry::get('Product'));
        $productInfo = $productInfo->getInfo((int)$id);


        if ($productInfo === null) {
            return $this->render('error404.html.php');
        }

        $isInBasket = $basket->isProductInBasket($productInfo->getId());

        return $this->render('product/info.html.php', ['productInfo' => $productInfo, 'isInBasket' => $isInBasket]);
    }

    /**
     * Список всех продуктов
     *
     * @param Request $request
     *
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $productList = (Registry::get('Product'))->getAll($request->query->get('sort', ''));
        $sort = $request->query->get('sort', '');

        $sortStrategy = Registry::get('SortStrategy');
        $productList = $sortStrategy->sort($productList, $sort);

        return $this->render('product/list.html.php', ['productList' => $productList]);
    }

    public function commentsAction($id)
    {
        // Проверяем наличие комментариев в репозитории и при необходимости обновляем их после загрузки из базы

        $comments = ($this->getCommentsRepository()->search([$id]))[0];
        echo json_encode($comments);
        exit;
    }

    protected function getCommentsRepository(): Model\Repository\Comments
    {
        return new Model\Repository\Comments();
    }
}
