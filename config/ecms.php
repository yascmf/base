<?php


/**
 * 企业版CMS配置
 */
return [

    //sidebar menu
    'sidebar' => [
        [
            'name' => '开发演示',
            'icon' => 'fa-paper-plane',
            'child_icon' => 'fa-file-o',
            'sub_menu' => [
                [
                    'name' => '表单',
                    'route' => 'admin:demo.form',
                    'can' => '',
                ],
                [
                    'name' => '图标',
                    'route' => 'admin:demo.icon',
                    'can' => '',
                ],
                [
                    'name' => '更多',
                    'route' => 'https://almsaeedstudio.com/',
                    'can' => '',
                ],
            ],
        ],
        [
            'name' => '内容管理',
            'icon' => 'fa-edit',
            'child_icon' => 'fa-star-o',
            'sub_menu' => [
                [
                    'name' => '分类',
                    'route' => 'admin:category.index',
                    'can' => '@category',
                ],
                [
                    'name' => '文章',
                    'route' => 'admin:article.index',
                    'can' => '@article',
                ],
                [
                    'name' => '图链',
                    'route' => 'admin:picture.index',
                    'can' => '@picture',
                ],
            ],
        ],
    ],

    //各模型推荐位
    'flag' => [

        //文章模型推荐位
        'articles' => [
            'l' => '链接',
            'f' => '幻灯',
            's' => '滚动',
            'h' => '热门',
            't' => '置顶',
        ],

        //图片模型推荐位（可用于幻图、友链等图链内容）
        'pictures' => [
            'l' => '链接',
            'f' => '幻灯',
            's' => '滚动',
            'h' => '热门',
            'm' => '移动端',
            'w' => '微信端',
            'd' => '桌面端',
        ],
    ],
];