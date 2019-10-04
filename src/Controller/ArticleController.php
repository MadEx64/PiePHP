<?php
namespace Controller;

use Core\Controller;
use Model\ArticleModel;

class ArticleController extends Controller
{
  public function addAction() {
      $this->render('index');
  }

  public function showAction() {
      $article = new ArticleModel($this->params);
      var_dump($article->read($this->table, $id));
      
  }
}
