-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2021 at 06:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delta_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_work_id_foreign` (`work_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `work_id`, `created_at`, `updated_at`) VALUES
(2, 'storage/Blogs/_blogs_586-1635171960.jpg', 2, '2021-10-18 06:35:45', '2021-10-25 12:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

DROP TABLE IF EXISTS `blog_translations`;
CREATE TABLE IF NOT EXISTS `blog_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_translations_blog_id_locale_unique` (`blog_id`,`locale`),
  KEY `blog_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_translations`
--

INSERT INTO `blog_translations` (`id`, `blog_id`, `locale`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'What is Lorem Ipsum?', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2021-10-18 06:35:45', '2021-10-18 08:48:42'),
(4, 2, 'ar', 'ما مدى تنافسية التسويق الإبداعي الخاص بك؟', '<p>التسويق الإبداعي مصطلح شامل ويمكن أن يغطي العديد من جوانب عملية التسويق. بمعنى أن التسويق الإبداعي ليس المجال الوحيد لتسويق الأشخاص في أقسام التسويق</p>', '2021-10-18 06:35:45', '2021-10-18 06:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'gehadkassap', 'gehadkassap@gmail.com', '01010919799', 'test bulk', 'nable an infrastructure with advanced technologies thatdelivers not only on performance, but also on investment, As a leading end-to-end solutions integrator', '2021-10-20 09:31:08', '2021-10-20 09:31:08'),
(2, 'sites', 'Mosherif91@gmail.com', '01010212599', 'test bulk', 'After that, we need to store image name into the database.', '2021-10-20 09:37:23', '2021-10-20 09:37:23'),
(4, 'rokya', 'hamid@gmail.com', '01010252699', 'Finally real view', 'Riyadh ( Kingdom of Saudi Arabia). 26 Al Zafer Street, Madkour Station, next to Banque Misr - Haram - Giza', '2021-10-20 09:57:01', '2021-10-20 09:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_translations`
--

DROP TABLE IF EXISTS `general_translations`;
CREATE TABLE IF NOT EXISTS `general_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `general_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `general_translations_general_id_locale_unique` (`general_id`,`locale`),
  KEY `general_translations_locale_index` (`locale`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

DROP TABLE IF EXISTS `icons`;
CREATE TABLE IF NOT EXISTS `icons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `link`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.facebook.com/people/Ahmed-Ahmed/100058114007663', 'fab fa-facebook-f', '2021-10-25 05:17:17', '2021-10-25 05:17:17'),
(2, 'linkedin', 'https://www.linkedin.com/in/delta-itech-9a3806200/', 'fab fa-linkedin-in', '2021-10-25 05:18:32', '2021-10-25 05:18:32'),
(3, 'pinterest', 'https://deltaitech.com/www.pinterest.com', 'fab fa-pinterest', '2021-10-25 05:19:28', '2021-10-25 05:19:28'),
(4, 'twitter', 'https://twitter.com/deltaitech', 'fab fa-twitter', '2021-10-25 05:20:14', '2021-10-25 05:20:14'),
(5, 'instagram', 'https://deltaitech.com/www.instagram.com', 'fab fa-instagram', '2021-10-25 05:21:12', '2021-10-25 05:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_06_16_103420_create_sessions_table', 1),
(6, '2021_10_17_101100_create_general_translations_table', 1),
(7, '2021_10_17_143316_create_works_table', 1),
(8, '2021_10_17_143406_create_work_translations_table', 1),
(9, '2021_10_17_143659_create_portfolios_table', 1),
(10, '2021_10_17_143726_create_portfolio_translations_table', 1),
(11, '2021_10_17_143925_create_plans_table', 1),
(12, '2021_10_17_143939_create_plan_translations_table', 1),
(13, '2021_10_17_150449_create_blogs_table', 1),
(14, '2021_10_17_150459_create_blog_translations_table', 1),
(15, '2021_10_17_151316_create_contacts_table', 1),
(16, '2021_10_17_151559_create_testmonials_table', 1),
(17, '2021_10_17_151625_create_testmonial_translations_table', 1),
(18, '2021_10_18_062132_create_sliders_table', 1),
(19, '2021_10_20_062608_create_services_table', 2),
(20, '2021_10_20_063324_create_service_translations_table', 2),
(21, '2021_10_24_082226_create_settings_table', 3),
(22, '2021_10_24_082246_create_setting_translations_table', 3),
(23, '2021_10_25_064624_create_icons_table', 4),
(24, '2021_10_25_103614_create_pages_table', 5),
(25, '2021_10_25_103629_create_page_translations_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `identifier`, `image`, `created_at`, `updated_at`) VALUES
(1, 'portfolio', NULL, '2021-10-25 10:02:33', '2021-10-25 10:02:33'),
(2, 'aboutus', '[\"storage\\/Pages\\/About\\/pages_about_407-1635163638.png\",\"storage\\/Pages\\/About\\/pages_about_505-1635163638.png\",\"storage\\/Pages\\/About\\/pages_about_641-1635163638.png\",\"storage\\/Pages\\/About\\/pages_about_961-1635163638.png\"]', '2021-10-25 10:07:18', '2021-10-25 10:07:18'),
(3, 'service', NULL, '2021-10-25 10:17:26', '2021-10-25 10:17:26'),
(4, 'blog', NULL, '2021-10-25 11:26:50', '2021-10-25 11:26:50'),
(5, 'plan', NULL, '2021-10-25 11:38:53', '2021-10-25 11:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

DROP TABLE IF EXISTS `page_translations`;
CREATE TABLE IF NOT EXISTS `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`),
  KEY `page_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'OUR RECENT WORK & PROJECTS', '<p>We have one simple focus, for example, to enable an infrastructure with advanced technologies that not only deliver performance, but also on investment, as a leader in end-to-end solution integration</p>', '2021-10-25 10:02:33', '2021-10-25 10:54:43'),
(2, 1, 'ar', 'أعمالنا الأخيرة & مشاريعنا', '<p>لدينا تركيز واحد بسيط ، على سبيل المثال ، لتمكين بنية تحتية بتقنيات متقدمة لا تقدم فقط الأداء ، ولكن أيضًا على الاستثمار ، بصفتنا شركة رائدة في تكامل الحلول الشاملة</p>', '2021-10-25 10:02:33', '2021-10-25 10:02:33'),
(3, 2, 'en', 'Work with us to get the best services.', '<p>we have one simple focus i.e., to enable an infrastructure with advanced technologies thatdelivers not only on performance, but also on investment, As a leading end-to-end solutions integrator, we harness our vast resourses and specialized skills, with our strategic partnerships and broad regional presence to offer expert technology solution to</p>', '2021-10-25 10:07:18', '2021-10-25 11:55:40'),
(4, 2, 'ar', 'اعمل معنا لتحصل علي افضل الخدمات', '<p>لدينا تركيز واحد بسيط ، على سبيل المثال ، لتمكين بنية تحتية بتقنيات متقدمة لا تقدم فقط الأداء ، ولكن أيضًا على الاستثمار ، بصفتنا شركة رائدة في تكامل الحلول الشاملة ، فإننا نسخر مواردنا الواسعة ومهاراتنا المتخصصة ، من خلال شراكاتنا الاستراتيجية و تواجد إقليمي واسع لتقديم حلول تقنية</p>', '2021-10-25 10:07:18', '2021-10-25 11:55:40'),
(5, 3, 'en', 'Our awesome Services', '<p>We Can Give Facilities!</p>', '2021-10-25 10:17:26', '2021-10-25 11:00:28'),
(6, 3, 'ar', 'خدماتنا', '<pre>\r\nيمكننا إعطاء تسهيلات !</pre>', '2021-10-25 10:17:26', '2021-10-25 11:00:28'),
(7, 4, 'en', 'Learn More Form Blog', '<p>As a app web crawler expert, I help organizations adjust to the expanding significance of&nbsp; internet promoting</p>', '2021-10-25 11:26:50', '2021-10-25 11:27:03'),
(8, 4, 'ar', 'الاخبار والمقالات', '<p>اخبار ومقالات خاصه بالتكنولوجيا والخدمات التي نقدمها</p>', '2021-10-25 11:26:50', '2021-10-25 11:26:50'),
(9, 5, 'en', 'Choose Your Plan', '<p>World&#39;s most influential and respected business advisor and system integrator.</p>', '2021-10-25 11:38:53', '2021-10-25 11:38:53'),
(10, 5, 'ar', 'اختر خطتك', '<p>مستشار الأعمال ومتكامل الأنظمة الأكثر نفوذاً واحترامًا في العالم.</p>', '2021-10-25 11:38:53', '2021-10-25 11:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, '200', '2021-10-24 05:35:12', '2021-10-24 05:35:12'),
(2, '49', '2021-10-24 05:53:42', '2021-10-24 05:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `plan_translations`
--

DROP TABLE IF EXISTS `plan_translations`;
CREATE TABLE IF NOT EXISTS `plan_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkeddec` text COLLATE utf8mb4_unicode_ci,
  `uncheckeddec` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plan_translations_plan_id_locale_unique` (`plan_id`,`locale`),
  KEY `plan_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_translations`
--

INSERT INTO `plan_translations` (`id`, `plan_id`, `locale`, `name`, `checkeddec`, `uncheckeddec`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Monthly Billing', '<p>Email Accounts</p>', '<ol>\r\n	<li>Email Accounts</li>\r\n</ol>', '2021-10-24 05:35:12', '2021-10-24 06:19:28'),
(2, 1, 'ar', 'الفواتير الشهرية', '<ol>\r\n	<li>&nbsp;4 شوكات مجانية كل شهر</li>\r\n</ol>', '<ol>\r\n	<li>نطاق ترددي غير محدود</li>\r\n	<li>4 شوكات مجانية كل شهر</li>\r\n</ol>', '2021-10-24 05:35:12', '2021-10-24 06:19:28'),
(3, 2, 'en', 'Quarterly Billing', '<ul>\r\n	<li>Full access</li>\r\n	<li>Unlimited Bandwidth</li>\r\n</ul>', '<ul>\r\n	<li>Email Accounts</li>\r\n	<li>4 Free Forks Every Months</li>\r\n</ul>', '2021-10-24 05:53:42', '2021-10-24 05:53:42'),
(4, 2, 'ar', 'الفواتير ربع السنوية', '<ul>\r\n	<li>الوصول الكامل</li>\r\n	<li>نطاق ترددي غير محدود</li>\r\n</ul>', '<ul>\r\n	<li>4 شوكات مجانية كل شهر</li>\r\n	<li>حسابات البريد الإلكتروني</li>\r\n</ul>', '2021-10-24 05:53:42', '2021-10-24 05:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_work_id_foreign` (`work_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `work_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'storage/Portfolios/_portfolios_497-1634629947.jpg', '2021-10-19 05:52:27', '2021-10-19 05:52:27'),
(2, 2, 'storage/Portfolios/_portfolios_907-1634630005.jpg', '2021-10-19 05:53:25', '2021-10-19 05:53:25'),
(4, 1, 'storage/Portfolios/_portfolios_452-1634635686.jpg', '2021-10-19 07:28:06', '2021-10-19 07:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_translations`
--

DROP TABLE IF EXISTS `portfolio_translations`;
CREATE TABLE IF NOT EXISTS `portfolio_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_translations_portfolio_id_locale_unique` (`portfolio_id`,`locale`),
  KEY `portfolio_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_translations`
--

INSERT INTO `portfolio_translations` (`id`, `portfolio_id`, `locale`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'kwadr madad', '<p>kwadr madad</p>', '2021-10-19 05:52:27', '2021-10-19 05:52:27'),
(2, 1, 'ar', 'كوادر للاستقدام', '<p>كوادر للاستقدام</p>', '2021-10-19 05:52:27', '2021-10-19 05:52:27'),
(3, 2, 'en', 'Hisham Askar and Partners Group', '<p>Hisham Askar and Partners Group</p>', '2021-10-19 05:53:25', '2021-10-19 05:53:25'),
(4, 2, 'ar', 'مجموعة هشام عسكر وشركاه', '<p>مجموعة هشام عسكر وشركاه</p>', '2021-10-19 05:53:25', '2021-10-19 05:53:25'),
(8, 4, 'ar', 'الملا للاستشارات الادارية', '<p>الملا للاستشارات الادارية</p>', '2021-10-19 07:28:06', '2021-10-19 07:28:06'),
(7, 4, 'en', 'MMC', '<p>MMC</p>', '2021-10-19 07:28:06', '2021-10-19 07:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'storage/Services/_services_126-1634714274.png', '2021-10-20 05:05:53', '2021-10-20 05:17:54'),
(2, 'storage/Services/_services_737-1634713762.png', '2021-10-20 05:09:22', '2021-10-20 05:09:22'),
(3, 'storage/Services/_services_943-1634715442.png', '2021-10-20 05:37:22', '2021-10-20 05:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

DROP TABLE IF EXISTS `service_translations`;
CREATE TABLE IF NOT EXISTS `service_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_translations_service_id_locale_unique` (`service_id`,`locale`),
  KEY `service_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_translations`
--

INSERT INTO `service_translations` (`id`, `service_id`, `locale`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Delta Information Technology Company', 'we have one simple focus i.e., to enable an infrastructure with advanced technologies thatdelivers not only on performance, but also on investment, As a leading end-to-end solutions integrator, we harness our vast resourses and specialized skills, with our strategic partnerships and broad regional presence to offer expert technology solution to', '2021-10-20 05:05:53', '2021-10-24 10:58:23'),
(2, 1, 'ar', 'شركة دلتا لتكنولوجيا المعلومات', 'لدينا تركيز واحد بسيط ، على سبيل المثال ، لتمكين بنية تحتية بتقنيات متقدمة لا تقدم فقط الأداء ، ولكن أيضًا على الاستثمار ، بصفتنا شركة رائدة في تكامل الحلول الشاملة ، فإننا نسخر مواردنا الواسعة ومهاراتنا المتخصصة ، من خلال شراكاتنا الاستراتيجية و تواجد إقليمي واسع لتقديم حلول تقنية', '2021-10-20 05:05:53', '2021-10-24 10:58:23'),
(3, 2, 'en', 'Website Design', '<p>Get a professional design and attractive colors that suit your business and identity. Delta delivers eye catching innovation to make a customer&#39;s first impression.</p>', '2021-10-20 05:09:22', '2021-10-20 05:09:22'),
(4, 2, 'ar', 'تطوير المواقع الالكترونية', '<p>نحن نطور أنواعًا مختلفة من مواقع الويب الرائعة بما في ذلك (&nbsp;التجارة الإلكترونية - ونظام إدارة المحتوى الديناميكي والمخصص ) وما إلى ذلك يتمتع فريق تطوير الويب لدينا بمعرفة كبيرة بأفضل موقع ويب يتم إنشاؤه بأحدث الاتجاهات في تصميم صفحة الويب وملاحظات متكررة لإدراك الاحتياجات والمتطلبات الناشئة للعملاء الحديثين التي تناسب الأعمال الحديثة تمامًا</p>', '2021-10-20 05:09:22', '2021-10-20 05:09:22'),
(5, 3, 'en', 'Mobile Application Programming', '<p>The Net and Hybrid application is downloaded in the App Store and Google Play, while the web application is a special programming for Internet pages, but it is compatible with mobile phones. However, the mobile site codes differ from the main site codes, and when dealing with the site, it reads the type of the user&#39;s device; If it is of a mobile type, it displays the website pages of the mobile application, but if it is a desktop computer type device, it displays the user&rsquo;s normal websi</p>', '2021-10-20 05:37:22', '2021-10-20 06:14:48'),
(6, 3, 'ar', 'برمجة تطبيقات الهاتف المحمول', '<p>يتم تحميل تطبيق النيتف والهايبرد في الآب ستور وجوجل بلاي، بينما تطبيق الويب هو برمجة خاصة لصفحات الإنترنت لكنها متوافقة مع الهواتف الجوالة غير أن أكواد الموقع الخاص بالجوال تختلف عن أكواد الموقع الرئيسي، وحين التعامل مع الموقع يقوم بقراءة نوعية جهاز المستخدم؛ فإذا كان من نوعية الجوال يعرض له صفحات الموقع الخاصة بتطبيق الجوال، أما إذا ان جهاز من نوع كمبيوتر مكتبي فإنه يقوم بعرض الموقع العادي للمستخدم.<br />\r\n&nbsp;</p>', '2021-10-20 05:37:22', '2021-10-20 06:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qIP4F3lBbpIpiG6wk00ZCMiSjYV7CK5G8EdPNjNV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMkliY2tldlhZMVEwNk1ET044OWo1S2p3ZU85czZYZEdZQmNhMHRFMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRVFZqVWpOelBUa2JkeWVYa0x1c01PT2NwbEpUU3JEcnRqMDNJNTVxblcxdndtVEpmVlhmQyI7fQ==', 1635173928);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpsLink` text COLLATE utf8mb4_unicode_ci,
  `sales` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ventures` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `phone`, `email`, `image`, `gpsLink`, `sales`, `rate`, `ventures`, `created_at`, `updated_at`) VALUES
(1, 'storage/Settings/_settings_878-1635084591.png', '01000291432', 'info@delta.com', 'storage/Settings/_settings_489-1635080593.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13818.894534013876!2d31.182481300000003!3d30.016091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1635087293406!5m2!1sar!2seg\" width=\"2000\" height=\"320\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '25', '96', '31', '2021-10-24 10:23:42', '2021-10-24 12:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

DROP TABLE IF EXISTS `setting_translations`;
CREATE TABLE IF NOT EXISTS `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formTo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `name`, `desc`, `small_desc`, `address`, `formTo`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Delta Information Technology Company', 'we have one simple focus i.e., to enable an infrastructure with advanced technologies thatdelivers not only on performance, but also on investment, As a leading end-to-end solutions integrator, we harness our vast resourses and specialized skills, with our strategic partnerships and broad regional presence to offer expert technology solution to', 'Delta Information Technology, Import & Export based Riyadh ( Kingdom of Saudi Arabia) Delta Information Technology are a leading IT, Telecommunication and Security Sustem Infrastructure Product, Services and Solution.', 'Riyadh ( Kingdom of Saudi Arabia). 26 Al Zafer Street, Madkour Station, next to Banque Misr - Haram - Giza', 'Sun - Tus: 8.30 am - 5.30 pm', '2021-10-24 10:23:42', '2021-10-24 10:23:42'),
(2, 1, 'ar', 'شركة دلتا لتكنولوجيا المعلومات', 'لدينا تركيز واحد بسيط ، على سبيل المثال ، لتمكين بنية تحتية بتقنيات متقدمة لا تقدم فقط الأداء ، ولكن أيضًا على الاستثمار ، بصفتنا شركة رائدة في تكامل الحلول الشاملة ، فإننا نسخر مواردنا الواسعة ومهاراتنا المتخصصة ، من خلال شراكاتنا الاستراتيجية و تواجد إقليمي واسع لتقديم حلول تقنية', 'شركة دلتا لتقنية المعلومات والاستيراد والتصدير ومقرها الرياض (المملكة العربية السعودية) شركة دلتا لتكنولوجيا المعلومات هي شركة رائدة في مجال تكنولوجيا المعلومات والاتصالات والأمن منتجات وخدمات وحلول Sustem للبنية التحتية.', 'الرياض (المملكة العربية السعودية)\r\n26 شارع الظافر محطة مدكور بجوار بنك مصر- الهرم – الجيزة', 'من 8:30 صباحا الي 5:30 مساءا', '2021-10-24 10:23:42', '2021-10-24 10:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'storage/Sliders/_sliders_536-1634644572.png', '2021-10-19 09:56:12', '2021-10-19 09:56:12'),
(2, 'storage/Sliders/_sliders_560-1634644579.jpg', '2021-10-19 09:56:19', '2021-10-19 09:56:19'),
(3, 'storage/Sliders/_sliders_205-1634644585.png', '2021-10-19 09:56:25', '2021-10-19 09:56:25'),
(4, 'storage/Sliders/_sliders_333-1634644596.jpg', '2021-10-19 09:56:36', '2021-10-19 09:56:36'),
(6, 'storage/Sliders/_sliders_780-1634645281.png', '2021-10-19 10:07:37', '2021-10-19 10:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `testmonials`
--

DROP TABLE IF EXISTS `testmonials`;
CREATE TABLE IF NOT EXISTS `testmonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testmonials`
--

INSERT INTO `testmonials` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'storage/Testmonials/_testmonials_888-1634640467.jpg', '2021-10-19 08:47:47', '2021-10-19 08:47:47'),
(4, 'storage/Testmonials/_testmonials_653-1634641918.webp', '2021-10-19 09:11:58', '2021-10-19 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `testmonial_translations`
--

DROP TABLE IF EXISTS `testmonial_translations`;
CREATE TABLE IF NOT EXISTS `testmonial_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `testmonial_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `testmonial_translations_testmonial_id_locale_unique` (`testmonial_id`,`locale`),
  KEY `testmonial_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testmonial_translations`
--

INSERT INTO `testmonial_translations` (`id`, `testmonial_id`, `locale`, `name`, `desc`, `job`, `created_at`, `updated_at`) VALUES
(5, 3, 'en', 'Gehad kassap', '<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'developer', '2021-10-19 08:47:47', '2021-10-19 08:47:47'),
(6, 3, 'ar', 'جهاد كساب', '<p dir=\"rtl\">لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور</p>\r\n\r\n<p dir=\"rtl\">أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد</p>\r\n\r\n<p dir=\"rtl\">أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس</p>\r\n\r\n<p dir=\"rtl\">أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت</p>\r\n\r\n<p dir=\"rtl\">نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا</p>\r\n\r\n<p dir=\"rtl\">كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم.</p>', 'مبرمجه', '2021-10-19 08:47:47', '2021-10-19 08:47:47'),
(7, 4, 'en', 'mohamed ali', '<p>Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>', 'manger', '2021-10-19 09:11:58', '2021-10-19 09:11:58'),
(8, 4, 'ar', 'محمد علي', '<p dir=\"rtl\">سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم</p>\r\n\r\n<p dir=\"rtl\">دولاريمكيو لايودانتيوم,توتام ريم أبيرأم,أيكيو أبسا كيواي أب أللو أنفينتوري فيرأتاتيس ايت</p>\r\n\r\n<p dir=\"rtl\">كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم</p>', 'مدير', '2021-10-19 09:11:58', '2021-10-19 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'deltacompany', 'delta@delta.com', NULL, '$2y$10$QTVjUjNzPTkbdyeXkLusMOOcplJTSrDrtj03I55qnW1vwmTJfVXfC', 'superadmin', NULL, '2021-10-19 04:32:33', '2021-10-19 04:32:33'),
(2, 'delta', 'admin@admin.com', NULL, '$2y$10$P.f7WYvrePbRAAUEkhIIVequT/1vOVF/2Z2tDuXL2/Y2pj/U1dfSy', 'admin', NULL, '2021-10-19 11:35:23', '2021-10-24 09:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-10-18 05:59:06', '2021-10-18 05:59:06'),
(2, '2021-10-18 06:07:43', '2021-10-18 06:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `work_translations`
--

DROP TABLE IF EXISTS `work_translations`;
CREATE TABLE IF NOT EXISTS `work_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_translations_work_id_locale_unique` (`work_id`,`locale`),
  KEY `work_translations_locale_index` (`locale`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_translations`
--

INSERT INTO `work_translations` (`id`, `work_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Web Design', '2021-10-18 05:59:06', '2021-10-18 06:18:00'),
(2, 1, 'ar', 'تصميم مواقع', '2021-10-18 05:59:06', '2021-10-18 05:59:06'),
(3, 2, 'en', 'Social Marketing', '2021-10-18 06:07:43', '2021-10-18 06:07:43'),
(4, 2, 'ar', 'سوشيال ماركتنج', '2021-10-18 06:07:43', '2021-10-18 06:07:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
