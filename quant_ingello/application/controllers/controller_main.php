<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_product.php";
include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_comment.php";


class Controller_Main extends Controller
{
    //!!!!!!!!!!!!!!!!
    //любой метод виполняется здесь только при условии, что существует токен авторизации
    //!!!!!!!!!!!!!!!!

    //метод для показа всех продуктов
    public function action_index()
    {
        $product = new Model_Product();
        $products = [];
        $comment = new Model_comment();
        $comments = [];

        if (isset($_GET['page'], $_GET['products'])) {
            $products = $product->findWithLimit(8, 6);
        } else {
            $products = $product->findAll();
            foreach ($products as $value) {
                $comment_temaplate = $comment->findAll(['product_id' => $value['id']]);
                $avg = $product->calculeteAVG($comment_temaplate);
                $value['rating'] = $avg;
                $avgRating[] = $value;
            }
        }
        $this->view->generate(
            'products_view.php',
            'template_view.php',
            ['title' => 'Продукты', 'products' => $avgRating]
        );
    }

    //показивем продукт, id получаем из GET массива
    public function action_product_show()
    {

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {

            $product_id = $_GET['id'];
            $product = new Model_Product();
            $comment = new Model_comment();
            $product_template = $product->findOne(['id' => $product_id]);
            $renderComments = $comment->getComments();
            $comments = $comment->findWithLimit(4, 0, ['product_id' => $product_id]); // ищем параметр product_id через переменную в которой он соддержиться
            $comment_temaplate = $comment->findAll(['product_id' => $product_id]);
            $avg = $product->calculeteAVG($comment_temaplate);
            $this->view->generate(
                'product_view.php',
                'template_view.php',
                ['product' => $product_template,
                    'avg' => $avg,
                    'renderComments' => $renderComments,
                    'comments' => $comments]

            );
        } else {
            echo "Не вибран соответствующий продукт";
        }

    }
    public function action_add_comment(){

        $product_id = $_GET['product_id'];
        $date = $_GET['date'];
        $rating = $_GET['rating'];
        $text = $_GET['text'];
        $name = $_GET['name'];
        $email = $_GET['email'];
    $comment = new Model_comment();
    $comment->load($_GET);
    $comment->newSave();
    header("location:/main/product_show?id=". $product_id. "&tab=review");
    }

    public function action_comment_show(){

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $comment_id = $_GET['id'];
            $comment = new Model_comment();
            $comment_template = $comment->findAll(['product_id'=>$comment_id]);
            if (empty($comment_template)){
                $this->view->generate('empty_view.php',
                    'template_view.php');
            }else{
                $this->view->generate('product_view.php',
                    'template_view.php',['comment'=>$comment_template]);
            }
        }
    }
    //неиспользуемий метод поиска продуктов
    public function search(){
        $product = new Model_Product();
        $product ->findAll($_POST);
    }

    //метод для генерации форми добавления записи о продукте
    public function action_add_record_form()//insert
    {
        $product = new Model_Product();
        $htmlForm = $product->generateForm();
        $this->view->generate('addrecord_view.php', 'template_view.php', ['htmlForm' => $htmlForm]);
    }

    //метод добавления продукта в базу
    public function action_add_record()//insert
    {
        $product = new Model_Product();// {title: null, price: null}
        $product->load($_POST);// {title: qweqwe, price: 120}
        $product->newSave();
    }

    //метод для генерации форми обновления продукта в базе
    public function action_update_product_form()
    {
        $product = new Model_Product();
        $product_template = $product->findOne(['id' => $_GET['id']]);
        $product->map($product_template);
        $htmlForm = $product->generateForm(true);
        $this->view->generate('update_view.php',
            'template_view.php', ['htmlForm' => $htmlForm, 'path' => '/main/update_product']);
    }

    //метод для обновления информации о форме
    public function action_update_product()
    {
        $product_id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $product = new Model_Product();// {title: null, price: null}
        $product->findOne(['id' => $_POST['id']]);// {title: qweqwe, price: 120}
        $product->load($_POST);
        $product->newSave();
        $this->view->generate('product_view.php',
            'template_view.php',['id'=>$product_id,'title'=>$title,'price'=>$price]);
    }

    //метод для удаления продукта из бази данних
    public function action_delete_product(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $product_id = $_GET['id'];
            $product = new Model_Product();
            $product_template = $product->findOne(['id' => $product_id]);
            $product->load($product_template);
            $product->delete();
        }
        else {
            echo "Не вибран соответствующий продукт";
        }
    }
}
