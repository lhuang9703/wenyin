/* 
用户：
    员工表格，包含管理员，区别是权限不同；

*/
CREATE DATABASE wenyin DEFAULT CHARACTER SET utf8;
use wenyin

-- 存储每个投诉的信息
create table comp(
time_local timestamp NOT NULL default CURRENT_TIMESTAMP, -- 时间戳
shift int not null, -- 班次
rate  int not null,-- 当班的时间
comp  varchar(2000),-- 当班的时间
Primary key(time_local)
)DEFAULT CHARSET=utf8;

CREATE TABLE wstaff(
wno varchar(11) not null,
wpassword varchar(20) not null,
wname varchar(100) not null,
wprivilege int not null,  -- 特权：管理员0，中高层：1， 员工：2
wphone char(20),
wbirthday datetime,
wsex char(1),
Primary key(wno)
)DEFAULT CHARSET=utf8;

insert into wstaff(wno,wpassword,wname,wprivilege)  values('1234','1234','vampire', 0);
insert into wstaff(wno,wpassword,wname,wprivilege)  values('1235','1235','vampire', 2);
-- 选班信息；
create table select_shift(
wno varchar(11) not null,
sno int not null,  -- 从 1 到 28
Primary key(wno, sno),
Foreign key(wno)references wstaff(wno),
Foreign key(sno)references shift(sno)
)DEFAULT CHARSET=utf8;
insert into select_shift(wno,sno)  values('1235',1),('1235',2);

-- 排好班的信息；
create table arrange_shift(
wno varchar(11) not null,
sno int not null,  -- 从 1 到 28
Primary key(wno, sno),
Foreign key(wno)references wstaff(wno),
Foreign key(sno)references shift(sno)
)DEFAULT CHARSET=utf8;


-- 存储每个班的信息
create table shift(
sno int not null,  -- 从 1 到 28
snum int not null, -- 需要的当班人数
stime int not null,-- 当班的时间
Primary key(sno)
)DEFAULT CHARSET=utf8;

insert into shift(sno,snum,stime)  values
(1,2,3),
(2,3,3),
(3,3,2),
(4,3,4),
(5,2,3),
(6,3,3),
(7,3,2),
(8,3,4),
(9,2,3),
(10,3,3),
(11,3,2),
(12,3,4),
(13,2,3),
(14,3,3),
(15,3,2),
(16,3,4),
(17,2,3),
(18,3,3),
(19,3,2),
(20,3,4),
(21,2,3),
(22,2,3),
(23,2,2),
(24,2,4),
(25,2,3),
(26,2,3),
(27,2,2),
(28,2,4);


CREATE TABLE customer(
cno varchar(11) not null,
cname varchar(100) not null,
cprivilege int not null,  -- 特权：会员0   非会员：1
cphone char(20) int not null,
cbirthday datetime,
csex char(1),
Primary key(cno)
)DEFAULT CHARSET=utf8;


--订单表格目前只能想到这些信息
CREATE TABLE Order(
cno varchar(11) not null,
Ordertime timestamp NOT NULL default CURRENT_TIMESTAMP,
Primary key(cno,Ordertime),
Foreign key(cno)references customer(cno),
)DEFAULT CHARSET=utf8;


