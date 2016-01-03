
#哇扑-一个有趣的网站

    <哇扑>是 wall paper 简称，一个用户分享分享图片，分享壁纸的站点。

##环境配置
* 这份代码是用户侧的代码
* php5.5 + mysql + redis  
* php框架采用 codeigniter3,第三方类库采用conposer管理。  
 
##API接口
> * admin.xxx.cn/api/wg_one?wg_id=X x为套图ID  

返回值:  

```json
{
    name:'巨无霸'，
    items:[
        {url:'xxx.xxx.xxx/lkjlkj.jpg!!'},
        {url:'xxx.xxx.xxx/lkjlkj.jpg!!'},
        {url:'xxx.xxx.xxx/lkjlkj.jpg!!'},
        ...
    ]
}
```

##依赖库
* php5-curl, php5-mysql

##部署流程
* composer install 安装三方库  
* 安装php5-curl   
* 改名 /application/config/config-sample.php => config.php,同时更改UPYUN相关配置
* 更改 API接口URL
* 修改database.php 为数据库的相关配置
* 数据库建库 wallp,导入 /sql/wallp.sql文件  


移动端计划中...欢迎大家加入。  
  makyu | 871110792@qq.com
