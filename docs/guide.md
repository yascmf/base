# 项目开发指南

>    为了项目维护需要，现对项目开发做出规范约束，请参考以下说明来协同项目开发，请注意查阅文档中给出的外部链接。

## 文档工具

考虑文档易编辑与可移植性，故采用目前流行的 `Markdown` 标记规范（`Laravel` 文档也使用）来撰写文档，后期也比较方便地生成在线文档。

**`Markdown` 语法准备型知识**
* [Markdown 语法说明](http://wowubuntu.com/markdown/)
* [Markdown 编辑器语法指南](http://segmentfault.com/markdown)

**桌面 `Markdown` 编辑器软件**
* [MdCharm](http://www.mdcharm.com/) : `Windows` 平台较好的 `Markdown` 编辑器
* [Mou](http://25.io/mou/) : `iOS` 平台下较好的 `Markdown` 编辑器
* [Cmd Markdown 编辑阅读器](https://www.zybuluo.com/mdeditor) : 体验较好的在线 `Markdown` 编辑器
* [马克飞象](http://www.maxiang.info/) : 有在线版和Google浏览器插件版

## 文档撰写

**文档撰写注意要素**

① 文档名使用英文，英文单词直接使用下划线(_)链接，`markdown` 文档的后缀名一般为 `.md` 或 `.markdown`；  
② 自然段落要终结的（即换行新起一个新的自然段），可在后面空2格，或直接换行空一行；
③ 注意有序列表与无序列表的使用；  
④ 代码段注意标记上语言，如下面： 
 
    ```php
    <?php
    phpinfo();
    ?>
    ```

显示效果如下：

```php
<?php
phpinfo();
?>
```

这样，生成网页文档之后也会有相应的语法高亮；  

⑤ `Markdown` 编辑器插入图片，不够方便，可以考虑构建专属图库程序，用于图片上传与保存；

## 版本控制系统与工具

版本控制系统建议采用 **Git** ，部分源码托管网站支持免费的私有源码托管。

**Git准备性知识**：
* [Git](http://git-scm.com/) : Git官网
* [Git Doc](http://git-scm.com/doc) : Git官方文档（英文）
* [Git设置与使用帮助](git.md) : 本地化的Git设置与使用帮助文档
* [Coding Help](https://coding.net/help) : Coding网站帮助
* [TortoiseGit](http://download.tortoisegit.org/tgit/1.8.14.0/) : 中文名**乌龟Git**，类似于 `TortoiseSVN` ，可视化的Git工具，比较适合 `Windows` 下新手使用

**相关源码托管网站**：
* [Github](https://github.com) : 全球最大的源码托管网站
* [Coding](http://coding.net) : 支持私有与开源项目源码托管，允许从 `Github` 导入项目，部分源码支持直接部署演示
* [OSChina](http://git.oschina.net/) : 同 `Coding` 支持私有与开源代码托管，依托于其自有的开源社区，吸引了不少国内IT人士

## PHP代码与项目规范

关于PHP代码规范，已经由专业组织制定出了，这就是 **PHP-FIG** 做出 `PSR` 规范，目前接受可用的规范到 **4** 了。可参阅以下链接阅读：

* [PHP-FIG PSR中文版](https://github.com/PizzaLiu/PHP-FIG)
* [PHP-FIG官网](http://www.php-fig.org/)
* [fig-standards英文版](https://github.com/php-fig/fig-standards/tree/master/accepted)
* [使用 PHP-CS-Fixer 自动规范化你的 PHP 代码](https://phphub.org/topics/547)

具体到项目中，可能会有其它代码性约束，项目负责人可做出明确的规范。

## Laraval 与 Composer

目前项目所用框架为 `Laravel`，该框架使用 `Composer` 来管理依赖和实现自动加载，您可以从下面链接获取更多帮助：

* [Laravel官网](http://laravel.com/)
* [Laravel中文文档](http://laravel-china.org/docs/5.0)
* [PHP社区](https://phphub.org/)
* [Composer](https://getcomposer.org/)
* [Composer中文网](http://www.phpcomposer.com/)
* [Composer私有包](http://docs.phpcomposer.com/05-repositories.html#VCS)

## 更多帮助

善用搜索，多逛社区，**纸上得来终觉浅 绝知此事要躬行**！

你可以从下面网站获得更多帮助：

```
https://phphub.org/about
http://www.google.com/ 
https://phphub.org/topics/
http://segmentfault.com/
http://www.zhihu.com/
http://douyasi.com/php/composer_mirrors.html
http://stackoverflow.com/
http://laravel-china.github.io/php-the-right-way/
http://tool.oschina.net/
......
```
