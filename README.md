# wenyin_management_system
* 文印中心管理系统
* 主要功能为排班 及 预约打印 和顾客投诉
* @黄 @甘 需要修改的部分在"shift_arrange"文件夹中
    - arrange.php : 管理员管理排班页面
    - arrange_shift.php:排班后端
    - in_out.php: 收班出版板块
    - selfinfo.php: 个人信息
    - table.php: 已经排好的当班表
    - manage.php: 管理员管理员工信息板块
    - menu_shift.php: 左侧的菜单
    - shift.php:  员工选班板块
    - get_shift.php: 员工选班后端

* 4.25增添：
+ python信息导入: readstaff.py
+ 密码哈希存储: 在login.php中 使用sha-256
+ php调用排班的可执行文件arrange 与主目录平行 (arrange.cpp为源文件); 
    - 这部分需要用php.ini修改权限
    - c++排班代码与arrange_shift.php用txt文件交互
+ 利用session配合权限控制
+ scrapy_test.py 使用爬虫测试网站性能