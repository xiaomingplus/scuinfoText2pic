
## scuinfo的php文字转图片接口

使用[https://github.com/dsgygb/text2pic](https://github.com/dsgygb/text2pic)实现，就写了不到60行代码，供scuinfo服务调用。



本项目已基于Docker构建，安装docker的服务后，运行以下命令即可在你的服务器里安装相关的服务，包括php+nginx。

	git clone 

然后修改config.php的配置项，

### 接口API

		{
		method:"post",
		url:"/index.php",
		params:{
		text:"" //要生成文字的内容
		},
		return:
		{
    	"code": 200,
    	"message": "ok",
    	"data": {
        		"url": "http://static.scuinfo.com/uploads/9423003ddd9a956e81aecfbb1f762b4b.jpg"
    			}
		}
		}
		
		
ps代码写的比较糟，但是能用^_^,源代码根据网络上的7384长微博文字生成图片系统 v0.1做了比较多的修改而成，原作者链接已访问不了，在这表达敬意。

在这个地址下载的源代码:http://www.softhy.net/soft/34246.htm 

修改的内容除了界面的全新修改，还有：源代码是gbk的，我转成了utf8，以及把整体的架构变的更有条理一些。





