# 芽丝内容管理框架 - 基础开发版(YASCMF/BASE)

>   由于工作时间问题，`YASCMF`沉寂了一段时间没有更新，现在它终于迎来5.2新版，未来重点也会放在新版新仓库。

>   欢迎 Watching/Star/Fork 本项目，同时也欢迎PHP爱好者、`YASCMF` 开发使用者入群交流，官方QQ群：260655062 。

### 更新说明

2016-07-01 在 `Github` 发布适配 `Laravel 5.2` 新版： [`YASCMF/BASE`](https://github.com/yascmf/base) ，启用新的仓库地址，`5.1` 旧版将进入存档期。更新的内容，可参考下面版本比较。

### 版本比较

新的基础开发版 (`yascmf/base`) 与旧版 (`douyasi/yascmf`) 有何区别？

新版与旧版主要区别在以下几点：

1. 新的基础开发版移除旧版后台内容（文章/单页/分类等）模版与前台网站，以方便开发者进行最小化的二次开发。

2. 使用到一些 `Laravel 5.2` 新特性，路由支持多中间件群组，实现同一源码多站绑定，多站路由过滤，使用不同站点可访问资源不同。

3. 废弃第三方 `entrust` 权限控制扩展包，改用原生的模型方法配合 `Gate` 实现角色权限控制；角色权限控制更加细分化（可到菜单显示、模型读写、搜索等）。

4. 管理后台已实现自由切换肤色与布局；静态资源分类更加合理；删除了很多旧版无用的静态资源文件；

5. 更加完善的文档资源，二次开发文档已同步在仓库中。

6. 使用 `Scheme-Less URL` ，方便以后 `http/https` 部署；支持静态资源 `CDN` 部署，提供诸多助手函数辅助网址与资源链接生成。

7. 修复旧版后台所存在的一些 `BUG` `typo` 错误，同时旧版 `5.1`将进入存档期。

### 安装与演示

请参考：[docs/install.md](http://www.yascmf.com/docs/install.md)

官方线上站点已开启演示功能，请在浏览器中打开：`https://base.yascmf.com/admin` ，通过用户名 `demo` 与密码 `demo123` 帐号体验一番。请注意：演示帐号没有任何写权限，操作过程中可能会出现权限不足的提醒页面。

### 文档

更多帮助，请查阅下面文档。

`Laravel` 文档地址：https://laravel.com/docs/5.2 （目前国内中文文档暂未完全更新）

`YASCMF` 官方文档地址：http://www.yascmf.com/docs/index

### 联系作者

>   Email: raoyc2009#gmail.com （请修改改`#` 为`@`）
>   文档站点：http://www.yascmf.com/docs/index  
>   QQ群：260655062  

## 授权协议

本系统基础开发版遵循 [MIT](http://opensource.org/licenses/MIT) 授权协议。

### 贡献代码

你可以 `Fork` 本项目，修改代码，向原作者发出 `pull request` ，合理有效的请求会被接受并入到官方的 `master` 版本中。

当然，如果有使用或者开发上的问题，也可提出新的 [issue](https://github.com/yascmf/base/issues/new) 。


