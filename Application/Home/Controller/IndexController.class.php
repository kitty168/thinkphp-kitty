<?php
namespace Home\Controller;

use Common\Controller\BaseController;

class IndexController extends BaseController {
    public function index(){
        echo 'index-index';
    }


    /**
     * webuploader 上传文件
     */
    public function ajax_upload(){
        // 根据自己的业务调整上传路径、允许的格式、文件大小
        ajax_upload('/Uploads/image/','empty',1024*1024*1024);
    }

    /**
     * webuploader 上传demo
     */
    public function webuploader(){

        // 如果是post提交则显示上传的文件 否则显示上传页面
        if(IS_POST){
            p($_POST);
        }else{
            $this->display();
        }
    }
}