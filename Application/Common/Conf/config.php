<?php
return array(
	//'配置项'=>'配置值'
    TMPL_PARSE_STRING  => array(
        '__STATICS__' =>  '/Public/statics' ,   //  更改默认的 __PUBLIC__ 替换规则
        '__UPLOADS__' =>  '/Public/Uploads' ,   //  增加新的上传路径替换规则
    ),
    'TAGLIB_BUILD_IN' => 'Cx,Common\Tag\My',    // 加载自定义标签

    /* URL设置 */
    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

);