
-- 会员表
CREATE TABLE IF NOT EXISTS member(
	id INT AUTO_INCREMENT PRIMARY KEY,  -- 编号
	name VARCHAR(50) NOT NULL UNIQUE,	-- 登录名
	password CHAR(32) NOT NULL,			-- 密码md5
	email VARCHAR(255) NOT NULL, 		-- 邮箱
	phone VARCHAR(255) NOT NULL, 		-- 手机号
	question VARCHAR(255),				-- 问题
	answer VARCHAR(255),				-- 答案
	active INT NOT NULL DEFAULT 0,		-- 激活0 未激活  1 已激活
	validate VARCHAR(50)				-- 激活验证信息
)ENGINE MyISAM DEFAULT CHARSET=UTF8;
