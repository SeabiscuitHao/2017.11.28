<?php
namespace app\admin\model;
use think\Model;
class Article extends Model
{
  protected static function init()
  {
    Article::event('before_insert',function($data){
      if ($_FILES['thumb']['tmp_name']) {
        $file = request() -> file('thumb');
        $info = $file -> move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
          $thumb = 'http://localhost/Second/think/'. 'public' . DS . 'uploads'.'/'.$info -> getSaveName();
          $data['thumb'] = $thumb;
        }
      }
    });
  }

}
