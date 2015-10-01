
## scuinfo的php文字转图片接口

使用[https://github.com/dsgygb/text2pic](https://github.com/dsgygb/text2pic)实现，就写了不到60行代码，供scuinfo服务调用。



本项目已基于Docker构建，安装docker的服务后，运行以下命令即可在你的服务器里安装相关的服务，包括php+nginx。

	git clone https://github.com/dsgygb/scuinfoText2pic.git

然后使用docker进行构建，执行:
	
	cd scuinfoText2pic
	
	docker-compose up
	

构建完成后进入

	cd opt/htdocs/text2pic
	
	cp config.example.php config.php
	
修改```config.php```里的关于又拍云的相关信息。

ok，一切皆已完成。




