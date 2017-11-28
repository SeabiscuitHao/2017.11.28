<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Cate as CateModel;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
class Article extends Common
{
    public function lst()
    {
      return view();
    }

    public function add()
    {
      if (request() -> isPOst()) {
        $data = input('post.');
        $article = new ArticleModel();
        if ($article -> save($data)) {
          $this -> success('添加文章成功！','lst');
        }else{
          $this -> error('添加文章失败！');
        }
        return;
      }
      $cate = new CateModel();
      $cateres = $cate -> catetree();
      $this -> assign('cateres',$cateres);
      return view();
    }

    public function edit()
    {
      return view();
    }
}
