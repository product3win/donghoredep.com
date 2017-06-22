/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : product3win

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-06-21 15:51:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner_title` text COLLATE utf8_unicode_ci,
  `banner_link` text COLLATE utf8_unicode_ci,
  `banner_media` longtext COLLATE utf8_unicode_ci,
  `banner_order_no` int(5) DEFAULT NULL,
  `banner_status` int(11) DEFAULT NULL,
  `banner_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', 'banner index', 'https://www.youtube.com/embed/UiuLca2YxBQ', '04-27-26-18-06-2017-26620421891458434880.jpg', '1', '1', '1497168466');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `category_parent_id` int(12) DEFAULT NULL,
  `category_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_intro` text COLLATE utf8_unicode_ci,
  `category_media` text COLLATE utf8_unicode_ci,
  `category_media_banner` text COLLATE utf8_unicode_ci,
  `category_created` int(11) DEFAULT NULL,
  `category_status` int(11) DEFAULT NULL,
  `horizontal_menu` tinyint(4) DEFAULT NULL,
  `vertical_menu` tinyint(4) DEFAULT NULL,
  `category_order_no` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('17', '0', 'danh-muc-dong-ho', 'Danh mục đồng hồ', null, '', null, '1497751873', '1', null, null, '1', '', '', '');
INSERT INTO `category` VALUES ('18', '0', 'thuong-hieu-dong-ho', 'Thương hiệu đồng hồ', null, '', null, '1497751914', '1', null, null, '1', '', '', '');
INSERT INTO `category` VALUES ('19', '0', 'ho-tro-khach-hang', 'Hỗ trợ khách hàng', null, '', null, '1497751981', '1', null, null, '1', '', '', '');
INSERT INTO `category` VALUES ('20', '0', 'chinh-sach-chung', 'Chính sách chung', null, '', null, '1497752007', '1', null, null, '1', '', '', '');
INSERT INTO `category` VALUES ('21', '0', 'diem-khac-biet-cua-chung-toi', 'Chúng tôi có gì khác biệt để bạn chọn mua', null, '', null, '1497752188', '1', null, null, '1', '', '', '');
INSERT INTO `category` VALUES ('22', '17', 'dong-ho-nam', 'ĐH Nam', null, '09-29-36-18-06-2017-17425397871406206176.jpg', '05-15-10-18-06-2017-3607401101975472980.jpg', '1497752305', '1', '1', null, '1', 'dong-ho-nam', 'dong-ho-nam', 'dong-ho-nam');
INSERT INTO `category` VALUES ('23', '17', 'dong-ho-nu', 'ĐH Nữ', null, '09-30-21-18-06-2017-30847242521755853792.jpg', '05-16-16-18-06-2017-29913774451069875280.jpg', '1497752344', '1', '1', null, '2', 'dong-ho-nu', 'dong-ho-nu', 'dong-ho-nu');
INSERT INTO `category` VALUES ('24', '17', 'dong-ho-cap', 'ĐH Cặp', null, '09-30-40-18-06-2017-26620421891458434880.jpg', '05-17-05-18-06-2017-26620421891458434880.jpg', '1497752394', '1', '1', null, '3', 'dong-ho-cap', 'dong-ho-cap', 'dong-ho-cap');
INSERT INTO `category` VALUES ('25', '17', 'dong-ho-dep', 'ĐH Đẹp', null, '09-31-12-18-06-2017-24501481361755853792.jpg', '05-17-46-18-06-2017-3128045972185513348.jpg', '1497752429', '1', '1', null, '4', 'dong-ho-dep', 'dong-ho-dep', 'dong-ho-dep');
INSERT INTO `category` VALUES ('26', '0', 'khuyen-mai', 'Khuyến mại', null, '09-31-27-18-06-2017-32789704891069875280.jpg', null, '1497752483', '1', '1', null, '5', 'khuyen-mai', 'khuyen-mai', 'khuyen-mai');
INSERT INTO `category` VALUES ('27', '0', 'tin-tuc', 'Tin tức', null, '', null, '1497752506', '1', '1', null, '6', 'tin-tuc', 'tin-tuc', 'tin-tuc');
INSERT INTO `category` VALUES ('28', '18', 'longines', 'Longines', null, '10-20-51-18-06-2017-c2.png', '05-15-55-18-06-2017-c2.png', '1497756051', '1', null, null, '1', 'longines', 'longines', 'longines');
INSERT INTO `category` VALUES ('29', '18', 'seiko', 'Seiko', null, '10-22-03-18-06-2017-c4.png', '05-16-36-18-06-2017-c4.png', '1497756123', '1', null, null, '2', 'seiko', 'seiko', 'seiko');
INSERT INTO `category` VALUES ('30', '18', 'omega', 'Omega', null, '10-22-30-18-06-2017-c5.png', '05-17-27-18-06-2017-c5.png', '1497756150', '1', null, null, '3', 'omega', 'omega', 'omega');
INSERT INTO `category` VALUES ('31', '18', 'rolex', 'Rolex', null, '02-16-36-18-06-2017-c7.png', '05-18-04-18-06-2017-c7.png', '1497756179', '1', null, null, '4', 'rolex', 'rolex', 'rolex');
INSERT INTO `category` VALUES ('32', '19', 'huong-dan-mua-hang', 'Hướng dẫn mua hàng', 'hướng dẫn mua hàng', '', '', '1497783207', '1', null, null, '1', 'huong-dan-mua-hang', 'huong-dan-mua-hang', 'huong-dan-mua-hang');
INSERT INTO `category` VALUES ('33', '19', 'huong-dan-thanh-toan', 'Hướng dẫn thanh toán', 'Hướng dẫn thanh toán', '', '', '1497783314', '1', null, null, '2', 'huong-dan-thanh-toan', 'huong-dan-thanh-toan', 'huong-dan-thanh-toan');
INSERT INTO `category` VALUES ('34', '19', 'phuong-thuc-giao-hang', 'Phương thức giao hàng', 'Phương thức giao hàng', '', '', '1497783399', '1', null, null, '3', 'huong-dan-thanh-toan', 'huong-dan-thanh-toan', 'huong-dan-thanh-toan');
INSERT INTO `category` VALUES ('35', '19', 'chinh-sach-bao-hanh', 'Chính sách bảo hành', 'Chính sách bảo hành', '', '', '1497783482', '1', null, null, '4', 'chinh-sach-bao-hanh', 'chinh-sach-bao-hanh', 'chinh-sach-bao-hanh');
INSERT INTO `category` VALUES ('36', '20', 'chinh-sach-doi-tra-hang', 'Chính sách đổi trả hàng', 'Chính sách đổi trả hàng', '', '', '1497783592', '1', null, null, '1', 'chinh-sach-doi-tra-hang', 'chinh-sach-doi-tra-hang', 'chinh-sach-doi-tra-hang');
INSERT INTO `category` VALUES ('37', '20', 'chinh-sach-van-chuyen', 'Chính sách vận chuyển', 'Chính sách vận chuyển', '', '', '1497783665', '1', null, null, '2', 'chinh-sach-van-chuyen', 'chinh-sach-van-chuyen', 'chinh-sach-van-chuyen');
INSERT INTO `category` VALUES ('38', '20', 'quy-dinh-bao-mat', 'Quy định bảo mật', 'Quy định bảo mật', '', '', '1497783729', '1', null, null, '3', 'quy-dinh-bao-mat', 'quy-dinh-bao-mat', 'quy-dinh-bao-mat');
INSERT INTO `category` VALUES ('39', '20', 'tieu-chi-ban-hang', 'Tiêu chí bán hàng', 'Tiêu chí bán hàng', '', '', '1497783772', '1', null, null, '4', 'tieu-chi-ban-hang', 'tieu-chi-ban-hang', 'tieu-chi-ban-hang');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_05_31_092011_create_role_table', '1');
INSERT INTO `migrations` VALUES ('5', '2017_05_31_092144_create_trash_table', '1');
INSERT INTO `migrations` VALUES ('6', '2017_05_31_092214_create_menu_table', '1');
INSERT INTO `migrations` VALUES ('7', '2017_06_02_085219_create_category_table', '1');
INSERT INTO `migrations` VALUES ('8', '2017_06_02_093858_create_news_table', '1');
INSERT INTO `migrations` VALUES ('10', '2017_05_31_091908_create_modul_table', '2');
INSERT INTO `migrations` VALUES ('11', '2014_10_12_000000_create_users_table', '3');
INSERT INTO `migrations` VALUES ('15', '2017_06_02_095517_create_product_table', '4');
INSERT INTO `migrations` VALUES ('17', '2017_06_11_105629_create_advertise_table', '6');
INSERT INTO `migrations` VALUES ('18', '2017_06_11_112646_create_script', '7');
INSERT INTO `migrations` VALUES ('19', '2017_06_11_143541_create_baner_table', '8');

-- ----------------------------
-- Table structure for module
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `module_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_action` longtext COLLATE utf8_unicode_ci,
  `module_status` tinyint(4) DEFAULT NULL,
  `module_order_no` int(11) DEFAULT NULL,
  `module_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of module
-- ----------------------------
INSERT INTO `module` VALUES ('4', 'Module', 'App\\Http\\Controllers\\Manager\\Module', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', '1', '1496713553');
INSERT INTO `module` VALUES ('129', 'App\\Http\\Controllers\\Manager\\Category', 'App\\Http\\Controllers\\Manager\\Category', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('130', 'App\\Http\\Controllers\\Manager\\Trash', 'App\\Http\\Controllers\\Manager\\Trash', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:7:\"restore\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('131', 'App\\Http\\Controllers\\Manager\\Product', 'App\\Http\\Controllers\\Manager\\Product', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('132', 'App\\Http\\Controllers\\Manager\\News', 'App\\Http\\Controllers\\Manager\\News', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('138', 'App\\Http\\Controllers\\Manager\\Banner', 'App\\Http\\Controllers\\Manager\\Banner', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('139', 'App\\Http\\Controllers\\Manager\\Role', 'App\\Http\\Controllers\\Manager\\Role', 'a:4:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";i:3;s:6:\"delete\";}', '1', null, null);
INSERT INTO `module` VALUES ('140', 'App\\Http\\Controllers\\Manager\\Users', 'App\\Http\\Controllers\\Manager\\Users', 'a:3:{i:0;s:8:\"listView\";i:1;s:6:\"delete\";i:2;s:9:\"changeass\";}', '1', null, null);
INSERT INTO `module` VALUES ('142', 'App\\Http\\Controllers\\Manager\\Static', 'App\\Http\\Controllers\\Manager\\Static', 'a:3:{i:0;s:8:\"listView\";i:1;s:7:\"getItem\";i:2;s:8:\"postItem\";}', '1', null, null);
INSERT INTO `module` VALUES ('143', 'App\\Http\\Controllers\\Manager\\Order', 'App\\Http\\Controllers\\Manager\\Order', 'a:1:{i:0;s:8:\"listView\";}', '1', null, null);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_intro` text COLLATE utf8_unicode_ci,
  `news_content` longtext COLLATE utf8_unicode_ci,
  `news_media` longtext COLLATE utf8_unicode_ci,
  `news_status` tinyint(4) DEFAULT NULL,
  `news_created` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'sang-minion', '<p>si&ecirc;u khuyễn mại &nbsp;tại donhoredep.com</p>', '<p>si&ecirc;u khuyễn mại &nbsp;tại donhoredep.com</p>', '05-44-31-18-06-2017-3128045972185513348.jpg', '1', '1497066892', 'sieu-khuyen-mai', 'sieu-khuyen-mai', 'sieu-khuyen-mai');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(12) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_infor` text COLLATE utf8_unicode_ci,
  `order_total` int(10) DEFAULT NULL,
  `order_status` tinyint(4) DEFAULT NULL,
  `order_srouces` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_created` int(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_user_email_index` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_cate_id` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_intro` text COLLATE utf8_unicode_ci,
  `product_details` longtext COLLATE utf8_unicode_ci,
  `product_price_input` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_price_saleof` int(11) DEFAULT NULL,
  `product_order_no` int(11) DEFAULT NULL,
  `product_media` text COLLATE utf8_unicode_ci,
  `product_multi_media` text COLLATE utf8_unicode_ci,
  `product_video` text COLLATE utf8_unicode_ci,
  `product_vote` text COLLATE utf8_unicode_ci,
  `product_status` int(5) DEFAULT NULL,
  `product_cheapest` tinyint(4) DEFAULT NULL,
  `product_gif` tinyint(4) DEFAULT NULL,
  `product_most` tinyint(4) DEFAULT NULL,
  `product_news` tinyint(4) DEFAULT NULL,
  `product_buy_most` tinyint(4) DEFAULT NULL,
  `product_best` tinyint(4) DEFAULT NULL,
  `product_created` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('4', 'LG-150', 'dongholonginesnamlg-150', '22', '28', 'Đồng hồ longines nam', '', '', null, '599000', null, '1', '04-15-23-18-06-2017-17425397321406206176.jpg', 'a:7:{i:0;s:43:\"04-20-22-18-06-2017-3586685441030833053.jpg\";i:1;s:44:\"04-20-22-18-06-2017-17425396981406206176.jpg\";i:2;s:44:\"04-20-22-18-06-2017-17425397321406206176.jpg\";i:3;s:44:\"04-20-22-18-06-2017-17425397641406206176.jpg\";i:4;s:44:\"04-20-22-18-06-2017-17425397871406206176.jpg\";i:5;s:44:\"04-14-43-18-06-2017-17425397641406206176.jpg\";i:6;s:44:\"04-05-32-18-06-2017-17425396981406206176.jpg\";}', 'a:3:{i:0;s:41:\"https://www.youtube.com/embed/4iUZTK9VN4A\";i:1;s:41:\"https://www.youtube.com/embed/4iUZTK9VN4A\";i:2;s:41:\"https://www.youtube.com/embed/4iUZTK9VN4A\";}', null, '1', '1', null, null, '1', '1', '1', '1497776424', 'dong-ho-longines', 'dong-ho-longines', 'dong-ho-longines');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_permission` longtext COLLATE utf8_unicode_ci,
  `role_order_no` int(11) DEFAULT NULL,
  `role_status` tinyint(4) DEFAULT NULL,
  `role_created` int(11) DEFAULT NULL,
  `allow_upload` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('11', 'Admin', 'a:10:{s:37:\"App\\Http\\Controllers\\Manager\\Category\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}s:34:\"App\\Http\\Controllers\\Manager\\Trash\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:7:\"restore\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}s:36:\"App\\Http\\Controllers\\Manager\\Product\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}s:33:\"App\\Http\\Controllers\\Manager\\News\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}s:35:\"App\\Http\\Controllers\\Manager\\Banner\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}s:33:\"App\\Http\\Controllers\\Manager\\Role\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:4:\"\"1\"/\";s:6:\"delete\";s:4:\"\"1\"/\";}s:34:\"App\\Http\\Controllers\\Manager\\Users\";a:3:{s:8:\"listView\";s:4:\"\"1\"/\";s:6:\"delete\";s:4:\"\"1\"/\";s:9:\"changeass\";s:4:\"\"1\"/\";}s:35:\"App\\Http\\Controllers\\Manager\\Static\";a:3:{s:8:\"listView\";s:4:\"\"1\"/\";s:7:\"getItem\";s:4:\"\"1\"/\";s:8:\"postItem\";s:4:\"\"1\"/\";}s:34:\"App\\Http\\Controllers\\Manager\\Order\";a:1:{s:8:\"listView\";s:4:\"\"1\"/\";}s:35:\"App\\Http\\Controllers\\Manager\\Module\";a:4:{s:8:\"listView\";s:3:\"\"1\"\";s:7:\"getItem\";s:3:\"\"1\"\";s:8:\"postItem\";s:3:\"\"1\"\";s:6:\"delete\";s:3:\"\"1\"\";}}', '1', '1', '1496722064', '1');

-- ----------------------------
-- Table structure for static
-- ----------------------------
DROP TABLE IF EXISTS `static`;
CREATE TABLE `static` (
  `static_id` int(10) NOT NULL AUTO_INCREMENT,
  `static_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `static_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `static_status` tinyint(4) DEFAULT NULL,
  `static_content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`static_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of static
-- ----------------------------
INSERT INTO `static` VALUES ('1', 'footer-left', 'footer-left', '1', '<h4>ĐỒNG HỒ RẺ ĐẸP</h4>\r\n\r\n<ul>\r\n	<li><strong>Trụ sở ch&iacute;nh:&nbsp;</strong>Số 15 ng&otilde; 178 Kim Hoa, quận Đống Đa, H&agrave; Nội</li>\r\n	<li><strong>VP.HCM:&nbsp;</strong>122/ 65 B&ugrave;i Đinh Tu&yacute;, quận B&igrave;nh Thạnh, TP. Hồ Ch&iacute; Minh</li>\r\n	<li><strong>Điện thoại:&nbsp;</strong>097.175.2847</li>\r\n	<li><strong>Email:&nbsp;</strong>hoangthanhquan@gmail.com</li>\r\n	<li><strong>Website:&nbsp;</strong>Http://donghoredep.com</li>\r\n</ul>');
INSERT INTO `static` VALUES ('2', 'hostline', 'hostline', '1', '0977323589');
INSERT INTO `static` VALUES ('3', 'zalo', 'zalo', '1', '0971752847');
INSERT INTO `static` VALUES ('4', 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', '1', '<p>B&agrave;i viết hướng dẫn mua h&agrave;ng</p>');
INSERT INTO `static` VALUES ('5', 'Hướng dẫn thanh toán', 'huong-dan-thanh-toan', '1', '<p>Hướng dẫn thanh to&aacute;n</p>');
INSERT INTO `static` VALUES ('6', 'Phương thức giao hàng', 'phuong-thuc-giao-hang', '1', '<p>Phương thức giao h&agrave;ng</p>');
INSERT INTO `static` VALUES ('7', 'Chính sách bảo hành', 'chinh-sach-bao-hanh', '1', '<p>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh</p>');
INSERT INTO `static` VALUES ('8', 'Chính sách đổi trả hàng', 'chinh-sach-doi-tra-hang', '1', '<p>Ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng</p>');
INSERT INTO `static` VALUES ('9', 'Chính sách vận chuyển', 'chinh-sach-van-chuyen', '1', '<p>Ch&iacute;nh s&aacute;ch vận chuyển</p>');
INSERT INTO `static` VALUES ('10', 'Tiêu chí bán hàng', 'tieu-chi-ban-hang', '1', '<p>Ti&ecirc;u ch&iacute; b&aacute;n h&agrave;ng</p>');
INSERT INTO `static` VALUES ('11', 'footer-bottom', 'footer-bottom', '1', '<p>Copyright &copy; 2017 by Đồng Hồ Rẻ Đẹp</p>');

-- ----------------------------
-- Table structure for trash
-- ----------------------------
DROP TABLE IF EXISTS `trash`;
CREATE TABLE `trash` (
  `trash_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `trash_obj_id` int(11) DEFAULT NULL,
  `trash_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trash_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trash_content` longtext COLLATE utf8_unicode_ci,
  `trash_one_media` longtext COLLATE utf8_unicode_ci,
  `trash_multi_media` longtext COLLATE utf8_unicode_ci,
  `trash_folder_media` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trash_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`trash_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of trash
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_last_login` int(11) DEFAULT NULL,
  `user_last_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', '11', 'Bùi tiến sang minion', 'Hòa bình- Việt nam', '0988817208', '1498032561', '::1', '1', 'tiensang93@gmail.com', '$2y$10$bT1pMo8ROWWIynSSF.3RCuQPzxUvdHkzcyHMhI18z0G1sXwftfix2', '5CxiHLMA8JMMNRQfFPuNGPWsicaGuhS5FzKcH9qciTvshysVKbEk3j91zCcL', '2017-06-07 09:00:53', '2017-06-21 15:09:21');
