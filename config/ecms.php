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
                    'name' => '标签',
                    'route' => 'admin:tag.index',
                    'can' => '@tag',
                ],
                [
                    'name' => '文章',
                    'route' => 'admin:article.index',
                    'can' => '@article',
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

    ],

    // tag
    'tag' => [
        // 类别
        'type'=>[
            '1' => '平台',
            '2' => '时长',
            '3' => '风格',
            '4' => '题材',
            '5' => '受众人群',
            '6' => '热门标签',
        ],
    ],
];