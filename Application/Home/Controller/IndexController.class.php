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
    public function webuploader(){p(session_id());

        // 如果是post提交则显示上传的文件 否则显示上传页面
        if(IS_POST){
            $file_info = I('post.');
            p($file_info);



            $config = array(
                'maxSize'    =>    500*1024*1024,
                'rootPath'   =>    './Uploads/',
//                'saveName'   =>    array('uniqid',''),
//                    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
//                    'subName'    =>    array('date','Ymd'),
            );

            if(isset($file_info['chunk'])){
                //有分片
                $temp_arr = $file_info;

                unset($temp_arr['chunk']);
                $temp_dir_name = md5(implode('',$temp_arr));

                $config['savePath'] = 'webuploader/';
                $config['saveName']   =    $temp_dir_name.'_'.$file_info['chunk'];

                $upload = new \Think\Upload($config);// 实例化上传类

                $info = $upload->uploadOne($_FILES['file']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    p($info);
                    //文件合并
                    //返回成功文件路径到前台
                    if($file_info['chunks'] == $file_info['chunk']+1){
                        //开始合并文件
                        $uid = uniqid();
                        $new_file = './Uploads/'.$info['savepath'].$uid.'.zip';
                        for($i=0;$i<=$file_info['chunks'];$i++){
                            $file_temp_path = './Uploads/'.$info['savepath'].$temp_dir_name .'_'.$i.'.'.$info['ext'];
                            p($file_temp_path);
                            p($new_file);
                            $file_data = file_get_contents($file_temp_path);
                            file_put_contents($new_file,$file_data, FILE_APPEND);
                        }
                    }

                }
            }else{
                //没有分片
                $config['savePath'] = 'webuploader/';
                $upload = new \Think\Upload($config);// 实例化上传类

                $info = $upload->uploadOne($_FILES['file']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息

                    //返回成功文件路径到前台
                    $this->ajaxReturn($upload->rootPath . $info['savepath'] . $info['savename']);
                }
            }

        }else{
            $this->display();
        }
    }

    public function uploaderFile(){

    }

    /**
     * 保存数据
     */
    public function add(){
        if(IS_POST){
            p(I('post.file-path'));
        }else{
            die('error');
        }
    }
}