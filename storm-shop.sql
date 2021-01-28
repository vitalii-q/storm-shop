-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2021 г., 20:12
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `storm-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `notification_id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `notification_id`, `type`, `views`, `created_at`, `updated_at`) VALUES
(9, 11, 'Подписка', 1, '2021-01-11 15:03:32', '2021-01-14 13:22:45'),
(12, 61, 'Сообщение', 1, '2021-01-11 16:13:50', '2021-01-14 13:22:45'),
(18, 13, 'Подписка', 1, '2021-01-12 17:05:28', '2021-01-14 13:32:54'),
(21, 40, 'Заказ', 1, '2021-01-14 06:49:53', '2021-01-14 13:32:54'),
(22, 14, 'Подписка', 1, '2021-01-14 13:29:55', '2021-01-14 13:30:18'),
(23, 18, 'Комментарий', 1, '2021-01-14 14:12:35', '2021-01-15 04:03:29'),
(24, 19, 'Комментарий', 1, '2021-01-14 14:47:38', '2021-01-15 04:03:29'),
(31, 15, 'Подписка', 1, '2021-01-15 04:03:11', '2021-01-15 04:03:29'),
(33, 27, 'Комментарий', 1, '2021-01-15 04:33:40', '2021-01-15 04:34:00'),
(34, 41, 'Заказ', 1, '2021-01-15 04:35:45', '2021-01-15 04:35:58'),
(35, 65, 'Сообщение', 1, '2021-01-15 04:37:20', '2021-01-15 04:37:35'),
(36, 42, 'Заказ', 1, '2021-01-15 04:39:31', '2021-01-15 04:40:51');

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE `advantages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `title`, `title_en`, `text`, `text_en`, `icon_class`, `created_at`, `updated_at`) VALUES
(1, 'БЕСПЛАТНАЯ ДОСТАВКА', 'FREE SHIPPING', 'Бесплатная доставка при заказе на сумму выше 2000₽', 'Free Shipping On All Order Or Order above $250', 'flaticon-delivery', NULL, NULL),
(2, '100% ДЕНЕЖНАЯ ГАРАНТИЯ', '100% MONEY GUARANTEE', 'Просто верните товар в течение 30 дней для обмена.', 'Simply Return it With 30 Days For an Exchange.', 'flaticon-money-bag', NULL, NULL),
(3, 'ПОДДЕРЖКА 24/7', 'SUPPORT 24/7', 'Связь с нами 24 часа в сутки 7 дней в неделю', 'Contact Us 24 Hours a Day 7 Days a Week', 'flaticon-support', NULL, NULL),
(4, 'СПОСОБ ОПЛАТЫ', 'PAYMENT METHOD', 'Мы обеспечиваем безопасную оплату', 'We Ensure Secure Payment', 'flaticon-pay', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_filterable` tinyint NOT NULL DEFAULT '0',
  `is_required` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `name_en`, `code`, `is_filterable`, `is_required`, `created_at`, `updated_at`) VALUES
(1, 'Размер', 'Size', 'size', 0, 0, NULL, NULL),
(2, 'Цвет', 'Color', 'color', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint NOT NULL,
  `attribute_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(11, 21, 1, NULL, NULL),
(15, 23, 1, NULL, NULL),
(16, 23, 2, NULL, NULL),
(17, 24, 1, NULL, NULL),
(18, 24, 2, NULL, NULL),
(19, 25, 1, NULL, NULL),
(20, 25, 2, NULL, NULL),
(21, 26, 1, NULL, NULL),
(22, 26, 2, NULL, NULL),
(23, 27, 1, NULL, NULL),
(24, 27, 2, NULL, NULL),
(25, 28, 1, NULL, NULL),
(26, 28, 2, NULL, NULL),
(27, 29, 1, NULL, NULL),
(28, 29, 2, NULL, NULL),
(29, 30, 1, NULL, NULL),
(30, 30, 2, NULL, NULL),
(32, 18, 1, NULL, NULL),
(33, 1, 1, NULL, NULL),
(34, 1, 2, NULL, NULL),
(35, 4, 1, NULL, NULL),
(36, 4, 2, NULL, NULL),
(37, 6, 1, NULL, NULL),
(38, 6, 2, NULL, NULL),
(39, 2, 1, NULL, NULL),
(40, 2, 2, NULL, NULL),
(41, 3, 1, NULL, NULL),
(42, 3, 2, NULL, NULL),
(45, 7, 1, NULL, NULL),
(46, 7, 2, NULL, NULL),
(47, 8, 1, NULL, NULL),
(48, 8, 2, NULL, NULL),
(49, 9, 1, NULL, NULL),
(50, 9, 2, NULL, NULL),
(51, 10, 1, NULL, NULL),
(52, 10, 2, NULL, NULL),
(53, 11, 1, NULL, NULL),
(54, 11, 2, NULL, NULL),
(55, 13, 1, NULL, NULL),
(56, 13, 2, NULL, NULL),
(57, 14, 1, NULL, NULL),
(58, 14, 2, NULL, NULL),
(59, 20, 1, NULL, NULL),
(61, 22, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attribute_id`, `name`, `name_en`, `created_at`, `updated_at`) VALUES
(1, '#f7f7f7', 2, 'Белый', 'White', NULL, NULL),
(2, '#1ec7a6', 2, 'Бирюзовый', 'Turquoise', NULL, NULL),
(3, '#3700ff', 2, 'Синий', 'Blue', NULL, NULL),
(4, '#02a8f3', 2, 'Голубой', 'Blue', NULL, NULL),
(5, '#ed2b2b', 2, 'Красный', 'Red', NULL, NULL),
(6, '#4bba5b', 2, 'Зеленый', 'Green', NULL, NULL),
(7, '#bf0b26', 2, 'Вишневый', 'Cherry', NULL, NULL),
(8, '#f28f00', 2, 'Оранжевый', 'Orange', NULL, NULL),
(9, '#222222', 2, 'Черный', 'Black', NULL, NULL),
(10, '#9cb130', 2, 'Салатовый', '', NULL, NULL),
(11, 'XS', 1, 'XS', 'XS', NULL, NULL),
(12, 'S', 1, 'S', 'S', NULL, NULL),
(13, 'M', 1, 'M', 'M', NULL, NULL),
(14, 'L', 1, 'L', 'L', NULL, NULL),
(15, 'XL', 1, 'XL', 'XL', NULL, NULL),
(16, 'XXL', 1, 'XXL', 'XXL', NULL, NULL),
(17, '#ff00ff', 2, 'Розовый', NULL, '2021-01-12 17:00:26', '2021-01-12 17:00:26');

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `preview_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_text_en` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `title_en`, `code`, `user_id`, `category_id`, `preview_text`, `preview_text_en`, `text`, `text_en`, `image`, `views`, `created_at`, `updated_at`) VALUES
(2, 'Новые коллекции мировых брендов', 'New collections of world brands', 'styling_belt_bags_2', 1, 1, 'Молодым брендам важно пересмотреть и актуализировать свою бизнес-модель . Fast-fashion, а это в основном бренды из сегмента масс-маркет, уже давно не учитывают реальные потребности аудитории и заваливают ее новыми коллекциями, сокращая жизненный цикл предыдущих.', 'It is important for a young brand to revise and update its business model. Fast-fashion, and these are mainly brands in the mass market segment, have not taken into account the real needs of the audience for a long time and flooded it with new collections, the shortened life cycle of previous periods.', 'Молодым брендам важно пересмотреть и актуализировать свою бизнес-модель . Fast-fashion, а это в основном бренды из сегмента масс-маркет, уже давно не учитывают реальные потребности аудитории и заваливают ее новыми коллекциями, сокращая жизненный цикл предыдущих.\r\n<br><br>\r\nСразу два серьезных игрока fashion-рынка выступили с критикой против быстрой моды. В середине мая бельгийский кутюрье и основатель одноименного бренда Дрис ван Нотен в открытом письме заявил о необходимости пересмотреть подход к производству. Он призвал уменьшить объемы, перенести календарь распродаж, чтобы увеличить количество покупок по полной стоимости, а также заменить традиционные показы и презентации онлайн-мероприятиями. Инициатива ван Нотена стала поводом для организации видеофорума, на котором топ-менеджеры, байеры и дизайнеры обсуждали необходимость трансформации принятой системы.\r\n<br><br>\r\nЕще раньше, в апреле, Джорджио Армани в открытом письме заявил, что бренд откажется от перепроизводства и продлит срок продаж сезонных коллекций. Модельер также раскритиковал быструю моду и призвал коллег отказаться от бесконечного круга новых коллекций. \r\n<br><br>\r\nВедущие мировые бренды задумались над тем, чтобы в буквальном смысле остановить фабрики. Молодые бренды в кризис начали понимать, что необходимо подумать над тем, как сделать свое производство более автономным и устойчивым перед новыми угрозами.', 'It is important for young brands to revise and update their business model. Fast-fashion, and these are mainly brands from the mass market segment, have not taken into account the real needs of the audience for a long time and flooded it with new collections, shortening the life cycle of the previous ones.\r\n<br><br>\r\nTwo serious players of the fashion market at once criticized fast fashion. In mid-May, the Belgian couturier and founder of the eponymous brand Dries van Noten, in an open letter, announced the need to reconsider the approach to production. He called for downsizing, rescheduling sales to increase full-value purchases, and replacing traditional screenings and presentations with online events. Van Noten\'s initiative was the reason for organizing a video forum, where top managers, buyers and designers discussed the need to transform the adopted system.\r\n<br><br>\r\nEarlier, in April, Giorgio Armani said in an open letter that the brand would abandon overproduction and extend the sale of seasonal collections. The designer also criticized fast fashion and urged colleagues to abandon the endless circle of new collections.\r\n<br><br>\r\nThe world\'s leading brands are thinking about literally stopping factories. During the crisis, young brands began to understand that it was necessary to think about how to make their production more autonomous and resilient to new threats.', 'storage\\images\\blog\\big-blog-2.jpg', 15, NULL, '2021-01-15 04:33:15'),
(3, 'Спортивные новинки', 'Sports novelties', 'styling_belt_bags_3', 1, 2, 'Если вы фанат спортивного стиля, в вашем гардеробе должны быть такие вещи, как:', 'If you are a sports fan, your wardrobe should include things like: If you are a sports fan, your wardrobe should include:', 'Если вы фанат спортивного стиля, в вашем гардеробе должны быть такие вещи, как:\r\n<br><br>\r\nолимпийки, поло, толстовки, коротенькие теннисные юбки,  куртки свободного кроя, парки, анораки,  худи, леггинсы,  тенниски, водолазки, свитшоты,трапицеевидные платья и платья прямых фасонов, бермуды, пуховики, ветровки, джемперы, шорты широкого кроя, удобные велосипедки, модные брюки-карго, спортивные платья, выполненные из гладких синтетических тканей и натуральных материалов на подобии трикотажа и хлопка.\r\n<br><br>\r\nСпортивная одежда уже давно отошла от строгих норм и правил. И если подумать, это очень хорошо.\r\nНо все же стилисты предлагают свою классификацию подвидов спортивного стиля, выделяя такие виды, как:\r\n<ul>\r\n<li style=\"text-align: justify;\">необыкновенный спорт-шик,</li>\r\n<li style=\"text-align: justify;\">городской спортивный стиль,</li>\r\n<li style=\"text-align: justify;\">строгий военный стиль милитари,</li>\r\n<li style=\"text-align: justify;\">эффектный жокейский спортивный стиль,</li>\r\n<li style=\"text-align: justify;\">в чем-то небрежный стиль кэжуал,</li>\r\n<li style=\"text-align: justify;\">модный стиль сафари,</li>\r\n<li style=\"text-align: justify;\">уличный стиль одежды,</li>\r\n<li style=\"text-align: justify;\">универсальный джинсовый стиль.</li>\r\n</ul>\r\nСреди названых подвидов большой популярностью пользуется спортивный стиль одежды кэжуал, который сейчас предпочитает практически большинство молодых людей.\r\n<br><br>\r\nХотя в этом стиле наблюдается небрежность, на самом деле, одежда кэжуал продумана до мелочей. Например, для кэжуал приемлемо сочетать джинсы с другими вещами спортивного гардероба, дополнив этот комплект туфлями на небольшом каблучке и прямоугольной сумкой.\r\n<br><br>\r\nКак мы уже говорили классический спортивный стиль приемлет самую разнообразную цветовую гамму, а вот виды спортивного стиля уже основываются на определенных оттенках, которые и отличают ту или иную разновидность друг от друга.\r\n<br><br>\r\nТак городскому спортивному стилю присущи спокойные и даже приглушенные оттенки. Спортивный стиль милитари выбирает зеленый, горчичный, оливковый и коричневый цвета, а для жокейского стиля свойственно сочетать пастельные тона с более выраженными цветами, например, рыжим, зеленым, черным, коричневым и т.д.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt rrrrr', 'storage\\images\\blog\\big-blog-3.jpg', 14, NULL, '2021-01-15 04:33:09'),
(6, 'Тренды 2021', 'Trends 2021', 'Trends2021', 1, 2, 'Говорят, что тренды больше не в моде. Потому что к чему нам маркетинговые уловки, провоцирующие перепотребление и перепроизводство? От этого плохо природе, а если плохо природе, значит плохо всем. Простое и вполне логичное объяснение, но с трендами не все так однозначно.', 'They say that trends are no longer in fashion. Because why do we need marketing gimmicks that provoke overconsumption and overproduction? This is bad for nature, and if bad for nature, then bad for everyone. A simple and quite logical explanation, but not everything is so simple with trends.', '<p class=\"mb-60\">\r\nДизайнеры на карантине славно поработали, ничего дикого не изобрели, а вот применимых к жизни идей хоть отбавляй. Смотрите и выбирайте, что подойдет именно вам. Кидаться на все тренды сразу, полагаем, никто не станет.\r\n</p>\r\n\r\n<blockquote class=\"blockquote mb-60\">\r\n<p class=\"mb-30\">\r\n<sup><i class=\"flaticon-left-quotes-sign\"></i></sup>\r\nГоворят, что тренды больше не в моде. Потому что к чему нам маркетинговые уловки, провоцирующие перепотребление и перепроизводство? От этого плохо природе, а если плохо природе, значит плохо всем. Простое и вполне логичное объяснение, но с трендами не все так однозначно. \r\n<sub><i class=\"flaticon-right-quotes-symbol\"></i></sub>\r\n</p>\r\n\r\n<footer class=\"blockquote-footer\">\r\n<a href=\"#!\" class=\"admin\">Георг Ствен</a><cite title=\"Source Title\"> Георг Ствен из Нью Йорка, 13 января, 2021</cite>\r\n</footer>\r\n</blockquote>\r\n\r\n<p class=\"m-0\">\r\nС одной стороны, да, они подогревают интерес к товарам. Но если отказываться от них, логично было бы отказаться и от рекламы, и от показов, погубить индустрию навсегда и успокоиться. Мы ведь этого не хотим. К тому же человеку свойственно всюду искать ориентиры. Базовая одежда — это, конечно, прекрасно, но не все готовы довольствоваться исключительно ею. Да и трендовые вещи не такие уж одноразовые. Как известно, мода циклична, а значит, все, что актуально сейчас, еще не раз вернется.\r\n</p>', '<p class=\"mb-60\">\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt\r\n</p>\r\n\r\n<blockquote class=\"blockquote mb-60\">\r\n<p class=\"mb-30\">\r\n<sup><i class=\"flaticon-left-quotes-sign\"></i></sup>\r\nLorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.\r\n<sub><i class=\"flaticon-right-quotes-symbol\"></i></sub>\r\n</p>\r\n\r\n<footer class=\"blockquote-footer\">\r\n<a href=\"#!\" class=\"admin\">George Stven</a><cite title=\"Source Title\"> George Stven from New Youk, On Jun 13, 2021</cite>\r\n</footer>\r\n</blockquote>\r\n\r\n<p class=\"m-0\">\r\nDolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n</p>', 'storage/files/blog/big-blog-1.jpg', 33, '2021-01-14 13:54:29', '2021-01-15 04:33:57');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `name_en`, `code`, `description`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Красота', 'Beauty', 'beauty', '', '', '', NULL, NULL),
(2, 'Мода', 'Fashion', 'fashion', '', '', '', NULL, NULL),
(3, 'Еда', 'Food', 'food', '', '', '', NULL, NULL),
(4, 'Стиль жизни', 'Life Style', 'life style', '', '', '', NULL, NULL),
(5, 'Путешествия', 'Travel', 'mobiles31', NULL, NULL, NULL, NULL, '2020-12-13 11:44:33');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `name`, `email`, `comment`, `article_id`, `user_id`, `created_at`, `updated_at`) VALUES
(18, 'Elena', 'elena@mail.ru', 'Мне понравилось!', 6, 4, '2021-01-14 14:12:35', '2021-01-14 14:12:35'),
(19, 'Admin', 'vitalicheg28@mail.ru', 'Очень познавательно.', 2, 1, '2021-01-14 14:47:38', '2021-01-14 14:47:38'),
(27, 'Кирилл', 'kirill@mail.ru', 'Отличная статья', 6, 7, '2021-01-15 04:33:40', '2021-01-15 04:33:40');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint NOT NULL,
  `tag_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(4, 2, 2, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 3, 5, NULL, NULL),
(8, 3, 6, NULL, NULL),
(10, 6, 1, NULL, NULL),
(11, 6, 2, NULL, NULL),
(13, 8, 3, NULL, NULL),
(14, 8, 4, NULL, NULL),
(15, 9, 3, NULL, NULL),
(16, 9, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`, `name_en`, `code`, `description`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Gucci', 'gucci', 'Gucci мода 2021', 'Gucci fashion 2021', '', NULL, NULL),
(2, 'Prada', 'Prada', 'prada', 'Prada мода 2021', 'Prada fashion 2021', '', NULL, NULL),
(3, 'Versace', 'Versace', 'versace', 'Versace мода 2021', 'Versace fashion 2021', '', NULL, NULL),
(4, 'Louis Vuitton', 'Louis Vuitton', 'louis_vuitton', 'Louis Vuitton мода 2021', 'Louis Vuitton fashion 2021', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_en`, `code`, `description`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Куртки', 'Jackets', 'jackets', 'Мода 2021', 'Fashion 2021', '', NULL, NULL),
(2, 'Толстовки', 'Sweatshirts', 'sweatshirts', 'Мода 2021', 'Fashion 2021', '', NULL, NULL),
(3, 'Рубашки', 'Shirts', 'shirts', 'Мода 2021', 'Fashion 2021', '', NULL, NULL),
(4, 'Джинсы', 'Jeans', 'jeans', 'Мода 2021', 'Fashion 2021', '', NULL, NULL),
(5, 'Аксессуары', 'Accessories', 'accessories', 'Мода 2021', 'Fashion 2021', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` tinyint NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `symbol`, `is_main`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'RUB', '₽', 1, 1, NULL, '2021-01-07 16:21:04'),
(2, 'USD', '$', 0, 0.0136087103, NULL, '2021-01-15 04:38:37'),
(3, 'EUR', '€', 0, 0.0112246043, NULL, '2021-01-15 04:38:37');

-- --------------------------------------------------------

--
-- Структура таблицы `desires`
--

CREATE TABLE `desires` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `desires`
--

INSERT INTO `desires` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(31, 1, 10, '2020-12-30 16:59:08', '2020-12-30 16:59:08'),
(32, 1, 8, '2020-12-30 17:00:02', '2020-12-30 17:00:02'),
(34, 1, 9, '2020-12-30 17:15:36', '2020-12-30 17:15:36'),
(35, 1, 6, '2020-12-30 17:17:36', '2020-12-30 17:17:36'),
(37, 4, 2, '2021-01-12 16:30:17', '2021-01-12 16:30:17'),
(38, 4, 4, '2021-01-12 16:31:04', '2021-01-12 16:31:04'),
(39, 1, 4, '2021-01-14 07:18:14', '2021-01-14 07:18:14');

-- --------------------------------------------------------

--
-- Структура таблицы `main_slider`
--

CREATE TABLE `main_slider` (
  `id` bigint UNSIGNED NOT NULL,
  `text_top` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_top_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_bottom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_bottom_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text-left',
  `image` text COLLATE utf8mb4_unicode_ci,
  `button` tinyint NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `main_slider`
--

INSERT INTO `main_slider` (`id`, `text_top`, `text_top_en`, `text`, `text_en`, `text_bottom`, `text_bottom_en`, `text_position`, `image`, `button`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Получите скидку до 15%', 'Get up to 15% discount', 'Модная обувь 2021', 'Fashion Shoes 2021', 'Ваш мир моды', 'Your world of fashion', 'text-center', 'storage/files/pages/main/slider/shoes-1.jpg', 1, 'http://storm-shop.loc/catalog', NULL, '2021-01-05 03:43:26'),
(2, NULL, NULL, 'Спортивные новинки', 'Sports news', 'Ваш мир моды', 'Your world of fashion', 'text-left', 'storage/files/pages/main/slider/shoes-2.jpg', 1, 'http://storm-shop.loc/catalog', NULL, '2021-01-05 03:49:53'),
(3, 'Последние коллекции', 'Latest collections', 'Мировых брендов', 'World brands', NULL, NULL, 'text-right', 'storage/files/pages/main/slider/shoes-3.jpg', 1, 'http://storm-shop.loc/catalog', NULL, '2021-01-05 03:49:36');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `file`, `message`, `created_at`, `updated_at`) VALUES
(61, 'Genady', 'genady@mail.com', 'storage/messages_files/0pU3hOrB.png', 'Сообщение с файлом', '2021-01-11 16:13:50', '2021-01-11 16:13:50'),
(65, 'Кирилл', 'kirill@mail.ru', NULL, 'Поздравляю с открытием!', '2021-01-15 04:37:19', '2021-01-15 04:37:19');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2020_11_24_092811_create_categories_table', 1),
(35, '2020_11_24_184404_create_advantages_table', 1),
(36, '2020_11_27_122155_create_orders_table', 1),
(40, '2020_12_07_192813_create_brands_table', 4),
(41, '2020_12_08_143423_create_team_table', 5),
(45, '2020_12_08_190214_create_messages_table', 6),
(48, '2020_12_09_140235_create_subscriptions_table', 7),
(58, '2020_12_09_182534_create_blog_categories_table', 9),
(60, '2020_12_15_085400_create_blog_comments_table', 10),
(62, '2020_12_15_124036_create_attributes_table', 11),
(67, '2020_12_15_140250_create_skus_table', 13),
(68, '2020_12_15_143130_create_sku_value_table', 13),
(69, '2020_12_18_132744_create_attribute_product_table', 14),
(71, '2020_11_23_185517_create_main_slider_table', 15),
(79, '2020_11_24_113234_create_products_table', 16),
(80, '2020_12_09_165739_create_blog_table', 17),
(81, '2014_10_12_000000_create_users_table', 18),
(82, '2020_12_21_094258_create_tags_table', 19),
(83, '2020_12_21_102120_create_blog_tag_table', 20),
(85, '2020_11_30_073352_create_order_sku_table', 21),
(86, '2020_12_29_121130_create_desires_table', 22),
(87, '2020_12_15_130625_create_attribute_value_table', 23),
(89, '2021_01_07_120752_create_currencies_table', 24),
(90, '2021_01_11_063126_create_admin_notifications_table', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` enum('cash_payment','payment_by_card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `currency_id`, `sum`, `created_at`, `updated_at`, `shipping_city`, `shipping_street`, `shipping_apartment`, `message`, `payment_method`) VALUES
(25, 3, 1, 'Саша', 'Царук', '+7985065754', 'vitalicheg28@mail.ru', 1, 9097, '2020-12-28 08:32:05', '2021-01-08 16:03:42', 'Moscow', 'street 45', '45', NULL, 'cash_payment'),
(26, 1, 2, 'Евгений', 'Ушаков', '+7 (978) 536 23 85', 'user@mail.ru', 1, 20296, '2020-12-28 09:44:22', '2020-12-28 09:44:22', 'Moscow', 'street 45', '45', 'Комментарий комментарий', 'cash_payment'),
(27, 2, 1, 'Вася', 'Иванов', '+7 (978) 536 23 851', 'vitalicheg28@mail.ru', 1, 2499, '2020-12-28 10:13:38', '2021-01-08 16:15:51', 'Moscow', 'street 45', '45', NULL, 'cash_payment'),
(28, 4, 2, 'User', 'Userov', '+7 (978) 536 23 85', 'user@mail.ru', 1, 1299, '2021-01-03 16:00:31', '2021-01-08 16:15:21', 'Москва', 'Николоямская 12', '34', NULL, 'cash_payment'),
(29, 1, 2, 'User', 'Userov', '+7 (978) 536 23 85', 'user@mail.ru', 1, 1299, '2021-01-03 16:06:52', '2021-01-03 16:06:52', 'Москва', 'Николоямская 12', '34', NULL, 'cash_payment'),
(31, 2, NULL, 'Анастасия', 'Семенова', '+7985574334', 'semenova@mail.ru', 1, 6299, '2021-01-04 05:19:45', '2021-01-08 16:15:31', 'Yaroslavl', 'street 45', '45', NULL, 'cash_payment'),
(32, 1, 1, 'Admin', 'Test', '+7985065754', 'vitalicheg28@mail.ru', 1, 5596, '2021-01-06 15:30:57', '2021-01-06 15:30:57', 'Moscow', 'street 45', '45', NULL, 'cash_payment'),
(40, 1, 1, 'Admin', 'Admin', '+7985065754', 'vitalicheg28@mail.ru', 2, 17.6, '2021-01-14 06:49:53', '2021-01-14 06:49:53', 'Moscow', 'street 45', '45', NULL, 'cash_payment'),
(41, 1, 7, 'Кирилл', 'Летов', '+7985574334', 'kirill@mail.ru', 1, 3098, '2021-01-15 04:35:45', '2021-01-15 04:35:45', 'Sevastopol', 'street 45', '45', NULL, 'cash_payment'),
(42, 1, 7, 'Кирилл', 'Летов', '+7985574334', 'kirill@mail.ru', 2, 107.47, '2021-01-15 04:39:31', '2021-01-15 04:39:31', 'Sevastopol', 'street 45', '45', NULL, 'cash_payment');

-- --------------------------------------------------------

--
-- Структура таблицы `order_sku`
--

CREATE TABLE `order_sku` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_sku`
--

INSERT INTO `order_sku` (`id`, `order_id`, `product_id`, `count`, `options`, `created_at`, `updated_at`) VALUES
(1, 25, 41, 1, 'XS,#f28f00', NULL, NULL),
(2, 25, 35, 1, 'M,#02a8f3', NULL, NULL),
(3, 25, 37, 1, 'XL,#222222', NULL, NULL),
(4, 26, 34, 1, 'XS,#ed2b2b', NULL, NULL),
(5, 26, 40, 2, 'XS,#ed2b2b', NULL, NULL),
(6, 26, 39, 1, 'XS,#1ec7a6', NULL, NULL),
(7, 27, 42, 1, 'XS,#f28f00', NULL, NULL),
(8, 28, 45, 1, 'M,#bf0b26', NULL, NULL),
(9, 29, 45, 1, 'M,#bf0b26', NULL, NULL),
(10, 30, 43, 1, 'XXL,#ed2b2b', NULL, NULL),
(11, 31, 56, 1, 'S,#3700ff', NULL, NULL),
(12, 32, 37, 4, 'XL,#222222', NULL, NULL),
(13, 33, 38, 1, 'M,#f28f00', NULL, NULL),
(14, 33, 37, 3, 'XL,#222222', NULL, NULL),
(15, 33, 33, 1, 'XS,#1ec7a6', NULL, NULL),
(16, 34, 33, 2, 'XS,#1ec7a6', NULL, NULL),
(17, 34, 37, 3, 'XL,#222222', NULL, NULL),
(18, 35, 61, 2, 'M,#222222', NULL, NULL),
(19, 35, 37, 5, 'XL,#222222', NULL, NULL),
(20, 36, 55, 2, 'S,#222222', NULL, NULL),
(21, 37, 45, 1, 'M,#bf0b26', NULL, NULL),
(22, 39, 43, 1, 'XXL,#ed2b2b', NULL, NULL),
(23, 40, 55, 1, 'S,#222222', NULL, NULL),
(24, 41, 51, 1, 'L,#222222', NULL, NULL),
(25, 41, 45, 1, 'M,#bf0b26', NULL, NULL),
(26, 42, 57, 1, 'XL,#9cb130', NULL, NULL),
(27, 42, 46, 2, 'XL,#222222', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vitalicheg28@mail.ru', '$2y$10$40/W9WhX5dNhqUrbvS6fyuXtPfbiEdY8MiMnmzhiwnkIgMrfa5KSO', '2021-01-13 06:06:51');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_bottom` text COLLATE utf8mb4_unicode_ci,
  `description_bottom_en` text COLLATE utf8mb4_unicode_ci,
  `information` text COLLATE utf8mb4_unicode_ci,
  `information_en` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `new` tinyint NOT NULL DEFAULT '0',
  `sale` tinyint NOT NULL DEFAULT '0',
  `bestseller` tinyint NOT NULL DEFAULT '0',
  `image_1` text COLLATE utf8mb4_unicode_ci,
  `image_2` text COLLATE utf8mb4_unicode_ci,
  `image_3` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `name_en`, `code`, `category_id`, `brand_id`, `description`, `description_en`, `description_bottom`, `description_bottom_en`, `information`, `information_en`, `price`, `new`, `sale`, `bestseller`, `image_1`, `image_2`, `image_3`, `created_at`, `updated_at`) VALUES
(1, 'Современная толстовка', 'Modern sweatshirt', 'modern_sweatshirt', 2, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 1399, 1, 0, 1, 'storage/files/catalog/img-1 (detail).jpg', 'storage/files/catalog/img-2 (detail).jpg', 'storage/files/catalog/img-3 (detail).jpg', NULL, '2020-12-20 08:43:57'),
(2, 'Куртка демисезонная', 'Demi-season jacket', 'demi-season jacket', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 3499, 0, 1, 0, 'storage/files/catalog/img-2.jpg', '', '', NULL, '2020-12-20 10:21:30'),
(3, 'Рубашка модная', 'Fashionable shirt', 'fashionable shirt', 3, 3, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 1299, 0, 1, 1, 'storage/files/catalog/img-3.jpg', '', '', NULL, '2020-12-20 09:48:02'),
(4, 'Куртка стильная', 'Stylish jacket', 'stylish jacket', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 6299, 1, 1, 0, 'storage/files/catalog/img-4.jpg', '', '', NULL, '2020-12-20 10:10:36'),
(5, 'Куртка мужская', 'Men\'s jacket', 'mens_jacket', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 3500, 0, 0, 1, 'storage/files/catalog/img-5.jpg', '', '', NULL, '2020-12-20 10:18:43'),
(6, 'Свитер кашемировый', 'Сashmere sweater', 'cashmere_sweater', 2, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 2499, 0, 0, 0, 'storage/files/catalog/img-6.jpg', '', '', NULL, '2020-12-23 06:01:48'),
(7, 'Рубашка деловая', 'Business shirt', 'business_shirt', 3, 3, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 1299, 0, 1, 0, 'storage/files/catalog/img-7.jpg', '', '', NULL, '2020-12-20 10:10:52'),
(8, 'Свитер молодежный', 'Youth sweater', 'youth_sweater', 2, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 2699, 0, 0, 0, 'storage/files/catalog/img-8.jpg', '', '', NULL, NULL),
(9, 'Куртка женская', 'Female jacket', 'female_jacket', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 3199, 1, 0, 1, 'storage/files/catalog/img-9.jpg', '', '', NULL, '2020-12-20 10:19:02'),
(10, 'Куртка длинная', 'Long jacket', 'long_jacket', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 6399, 1, 1, 1, 'storage/files/catalog/img-10.jpg', '', '', NULL, '2020-12-20 10:20:39'),
(11, 'Свитер с воротником', 'Collar sweater', 'collar_sweater', 2, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 2299, 1, 0, 0, 'storage/files/catalog/img-11.jpg', '', '', NULL, '2020-12-20 10:21:42'),
(12, 'Водолазка', 'Turtleneck', 'turtleneck', 2, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 1500, 0, 0, 0, 'storage/files/catalog/img-12.jpg', '', '', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `name_en`, `code`, `category_id`, `brand_id`, `description`, `description_en`, `description_bottom`, `description_bottom_en`, `information`, `information_en`, `price`, `new`, `sale`, `bestseller`, `image_1`, `image_2`, `image_3`, `created_at`, `updated_at`) VALUES
(13, 'Куртка с капюшоном', 'Jacket with a hood', 'jacket_with_a_hood', 1, 1, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 4699, 0, 0, 0, 'storage/files/catalog/img-1.jpg', '', '', NULL, '2020-12-30 14:03:24'),
(14, 'Брюки стильные', 'Stylish trousers', 'stylish_trousers', 4, 4, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 1799, 0, 0, 0, 'storage/files/catalog/img-3.jpg', '', '', NULL, '2020-12-30 14:04:08'),
(15, 'Куртка fashion 2021', 'Jacket fashion 2021', 'jacket_fashion_2021', 1, 2, 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени \r\n                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому \r\n                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, \r\n                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки \r\n                направлений прогрессивного развития.', 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. \r\n                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas \r\n                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>\r\n                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus \r\n                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum \r\n                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.', 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает \r\n                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности \r\n                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении \r\n                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra \r\n                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas \r\n                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet \r\n                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>\r\n                Praesent semper pharetra justo, sed tempor nulla ultrices id. \r\n                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, \r\n                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.', 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем \r\n                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в \r\n                значительной степени обуславливает создание форм развития.', 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor \r\n                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at \r\n                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut \r\n                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non \r\n                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>\r\n                Sed malesuada nunc non urna rutrum, sit \r\n                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id \r\n                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.', 6299, 0, 0, 0, 'storage/files/catalog/img-4.jpg', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `skus`
--

CREATE TABLE `skus` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `skus`
--

INSERT INTO `skus` (`id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(33, 1, 5, NULL, '2020-12-21 14:28:07', '2020-12-21 14:28:07'),
(34, 1, 5, NULL, '2020-12-21 14:28:18', '2020-12-21 14:28:18'),
(35, 1, 10, NULL, '2020-12-21 14:28:37', '2020-12-21 14:28:37'),
(36, 1, 5, NULL, '2020-12-21 14:29:00', '2020-12-21 14:29:00'),
(37, 1, 10, NULL, '2020-12-21 14:29:25', '2020-12-21 14:29:25'),
(38, 1, 10, NULL, '2020-12-21 17:13:25', '2020-12-21 17:13:25'),
(39, 4, 10, NULL, '2020-12-23 05:58:15', '2020-12-23 05:58:15'),
(40, 4, 5, NULL, '2020-12-23 05:58:27', '2020-12-23 05:58:27'),
(41, 4, 5, NULL, '2020-12-23 05:58:57', '2020-12-23 05:58:57'),
(42, 6, 15, NULL, '2020-12-23 06:02:11', '2020-12-23 06:02:11'),
(43, 2, 50, NULL, '2020-12-30 13:22:42', '2020-12-30 13:22:42'),
(44, 3, 10, NULL, '2020-12-30 13:59:35', '2020-12-30 13:59:35'),
(45, 7, 5, NULL, '2020-12-30 14:00:49', '2020-12-30 14:00:49'),
(46, 8, 10, NULL, '2020-12-30 14:01:34', '2020-12-30 14:01:34'),
(47, 9, 5, NULL, '2020-12-30 14:02:08', '2020-12-30 14:02:08'),
(48, 10, 15, NULL, '2020-12-30 14:02:33', '2020-12-30 14:02:33'),
(49, 11, 4, NULL, '2020-12-30 14:03:03', '2020-12-30 14:03:03'),
(50, 13, 5, NULL, '2020-12-30 14:03:43', '2020-12-30 14:03:43'),
(51, 14, 8, NULL, '2020-12-30 14:04:24', '2020-12-30 14:04:24'),
(52, 2, 10, NULL, '2020-12-31 09:32:06', '2020-12-31 09:32:06'),
(53, 2, 20, NULL, '2020-12-31 09:32:44', '2020-12-31 09:32:44'),
(54, 3, 5, NULL, '2020-12-31 09:34:26', '2020-12-31 09:34:26'),
(55, 3, 15, NULL, '2020-12-31 09:34:53', '2020-12-31 09:34:53'),
(56, 4, 15, NULL, '2020-12-31 09:38:41', '2020-12-31 09:38:41'),
(57, 6, 20, NULL, '2020-12-31 15:03:49', '2020-12-31 15:03:49'),
(58, 9, 30, NULL, '2020-12-31 15:04:54', '2020-12-31 15:04:54'),
(60, 2, 15, NULL, '2021-01-03 15:29:43', '2021-01-03 15:29:43'),
(61, 10, 30, NULL, '2021-01-04 08:23:49', '2021-01-04 08:23:49'),
(66, 11, 10, NULL, '2021-01-12 17:00:54', '2021-01-12 17:00:54');

-- --------------------------------------------------------

--
-- Структура таблицы `sku_value`
--

CREATE TABLE `sku_value` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint NOT NULL,
  `sku_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sku_value`
--

INSERT INTO `sku_value` (`id`, `attribute_value_id`, `sku_id`, `created_at`, `updated_at`) VALUES
(17, 11, 33, '2020-12-21 14:28:07', '2020-12-21 14:28:07'),
(18, 2, 33, '2020-12-21 14:28:07', '2020-12-21 14:28:07'),
(19, 11, 34, '2020-12-21 14:28:18', '2020-12-21 14:28:18'),
(20, 5, 34, '2020-12-21 14:28:18', '2020-12-21 14:28:18'),
(21, 13, 35, '2020-12-21 14:28:37', '2020-12-21 14:28:37'),
(22, 4, 35, '2020-12-21 14:28:37', '2020-12-21 14:28:37'),
(23, 11, 36, '2020-12-21 14:29:00', '2020-12-21 14:29:00'),
(24, 8, 36, '2020-12-21 14:29:00', '2020-12-21 14:29:00'),
(25, 15, 37, '2020-12-21 14:29:25', '2020-12-21 14:29:25'),
(26, 9, 37, '2020-12-21 14:29:25', '2020-12-21 14:29:25'),
(27, 13, 38, '2020-12-21 17:13:25', '2020-12-21 17:13:25'),
(28, 8, 38, '2020-12-21 17:13:25', '2020-12-21 17:13:25'),
(29, 11, 39, '2020-12-23 05:58:15', '2020-12-23 05:58:15'),
(30, 2, 39, '2020-12-23 05:58:15', '2020-12-23 05:58:15'),
(31, 11, 40, '2020-12-23 05:58:27', '2020-12-23 05:58:27'),
(32, 5, 40, '2020-12-23 05:58:27', '2020-12-23 05:58:27'),
(33, 11, 41, '2020-12-23 05:58:57', '2020-12-23 05:58:57'),
(34, 8, 41, '2020-12-23 05:58:57', '2020-12-23 05:58:57'),
(35, 11, 42, '2020-12-23 06:02:11', '2020-12-23 06:02:11'),
(36, 8, 42, '2020-12-23 06:02:11', '2020-12-23 06:02:11'),
(37, 16, 43, '2020-12-30 13:22:42', '2020-12-30 13:22:42'),
(38, 5, 43, '2020-12-30 13:22:42', '2020-12-30 13:22:42'),
(39, 12, 44, '2020-12-30 13:59:35', '2020-12-30 13:59:35'),
(40, 3, 44, '2020-12-30 13:59:35', '2020-12-30 13:59:35'),
(41, 13, 45, '2020-12-30 14:00:49', '2020-12-30 14:00:49'),
(42, 7, 45, '2020-12-30 14:00:49', '2020-12-30 14:00:49'),
(43, 15, 46, '2020-12-30 14:01:34', '2020-12-30 14:01:34'),
(44, 9, 46, '2020-12-30 14:01:34', '2020-12-30 14:01:34'),
(45, 15, 47, '2020-12-30 14:02:08', '2020-12-30 14:02:08'),
(46, 6, 47, '2020-12-30 14:02:08', '2020-12-30 14:02:08'),
(47, 14, 48, '2020-12-30 14:02:33', '2020-12-30 14:02:33'),
(48, 4, 48, '2020-12-30 14:02:33', '2020-12-30 14:02:33'),
(49, 11, 49, '2020-12-30 14:03:03', '2020-12-30 14:03:03'),
(50, 10, 49, '2020-12-30 14:03:03', '2020-12-30 14:03:03'),
(51, 15, 50, '2020-12-30 14:03:43', '2020-12-30 14:03:43'),
(52, 5, 50, '2020-12-30 14:03:43', '2020-12-30 14:03:43'),
(53, 14, 51, '2020-12-30 14:04:25', '2020-12-30 14:04:25'),
(54, 9, 51, '2020-12-30 14:04:25', '2020-12-30 14:04:25'),
(55, 15, 52, '2020-12-31 09:32:06', '2020-12-31 09:32:06'),
(56, 5, 52, '2020-12-31 09:32:06', '2020-12-31 09:32:06'),
(57, 14, 53, '2020-12-31 09:32:44', '2020-12-31 09:32:44'),
(58, 5, 53, '2020-12-31 09:32:44', '2020-12-31 09:32:44'),
(59, 12, 54, '2020-12-31 09:34:26', '2020-12-31 09:34:26'),
(60, 4, 54, '2020-12-31 09:34:26', '2020-12-31 09:34:26'),
(61, 12, 55, '2020-12-31 09:34:53', '2020-12-31 09:34:53'),
(62, 9, 55, '2020-12-31 09:34:53', '2020-12-31 09:34:53'),
(63, 12, 56, '2020-12-31 09:38:41', '2020-12-31 09:38:41'),
(64, 3, 56, '2020-12-31 09:38:41', '2020-12-31 09:38:41'),
(65, 15, 57, '2020-12-31 15:03:49', '2020-12-31 15:03:49'),
(66, 10, 57, '2020-12-31 15:03:49', '2020-12-31 15:03:49'),
(67, 15, 58, '2020-12-31 15:04:54', '2020-12-31 15:04:54'),
(68, 10, 58, '2020-12-31 15:04:54', '2020-12-31 15:04:54'),
(71, 14, 60, '2021-01-03 15:29:43', '2021-01-03 15:29:43'),
(72, 2, 60, '2021-01-03 15:29:44', '2021-01-03 15:29:44'),
(73, 13, 61, '2021-01-04 08:23:49', '2021-01-04 08:23:49'),
(74, 9, 61, '2021-01-04 08:23:49', '2021-01-04 08:23:49'),
(80, 14, 66, '2021-01-12 17:00:54', '2021-01-12 17:00:54'),
(81, 17, 66, '2021-01-12 17:00:54', '2021-01-12 17:00:54');

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'emailvcxd@mail.ru', 1, '2020-12-10 08:34:25', '2020-12-10 08:34:25'),
(3, NULL, 'subscription@test.com', 1, '2020-12-10 08:37:05', '2020-12-10 08:37:05'),
(11, 1, 'email@mail.ru', 1, '2021-01-11 15:03:32', '2021-01-11 15:03:32'),
(13, 4, 'elena@mail.ru', 1, '2021-01-12 17:05:28', '2021-01-12 17:05:28'),
(14, 1, 'email123@mail.ru', 1, '2021-01-14 13:29:55', '2021-01-14 13:29:55'),
(15, 1, 'email12345@mail.ru', 1, '2021-01-15 04:03:10', '2021-01-15 04:03:10');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `name_en`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Мода', 'Fashion', 'fashion', NULL, NULL),
(2, 'Одежда', 'Clothing', 'clothing', NULL, NULL),
(3, 'Ювилирные украшения', 'Jewelry', 'jewelry', NULL, NULL),
(4, 'Аксессуары', 'Accessories', 'accessories', NULL, NULL),
(5, 'Обувь', 'Shoes', 'shoes', NULL, NULL),
(6, 'Спорт', 'Sport', 'sport', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `name`, `name_en`, `description`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Евгений', 'MR Eugene', 'Генеральный директор и основатель', 'CEO & Founder', 'images\\about\\our_team\\img-1.jpg', NULL, NULL),
(2, 'Альберт', 'Mr Albert', 'Основатель', 'Founder', 'images\\about\\our_team\\img-2.jpg', NULL, NULL),
(3, 'Кристина', 'Ms christina', 'Менеджер по дизайну', 'Design Manager', 'images\\about\\our_team\\img-3.jpg', NULL, NULL),
(4, 'Ксения', 'Ms Ksenia', 'Обслуживание клиентов', 'Client Care', 'images\\about\\our_team\\img-4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `privilege` tinyint NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `privilege`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `address`, `city`, `street`, `apartment`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', NULL, NULL, 'vitalicheg28@mail.ru', '+7985065754', NULL, NULL, NULL, NULL, 'storage/users/qZdoJtgP_F0.jpg', NULL, '$2y$10$UAMyWvQUDwCyMCiIbgdc5OpHwB3eAPAeXEODMYPd8fKmMlEJvKOAi', 'ViXeS3MOVpIKjxpjbIndWioIdCy8AsuSaGPo4E4deChqfqNWG1ivGm03e1Qg', NULL, '2020-12-27 17:06:25'),
(2, 0, 'User', 'Userovich', 'Userov', 'user@mail.ru', '+7 (978) 536 23 85', NULL, 'Москва', 'Николоямская 12', '34', 'storage/users/EgGqhZyW_E4.jpg', NULL, '$2y$10$oWv0HZC7ktulvlOnX8uOWuuPWHqwbAuRHlP69KqgVOIATlV5wEe2.', '2leQsH9BmOWNYhMa864W1trVQ9sWx6nqqPtCDm4rpKKgKQYeVLERNBYIGB2J', NULL, '2020-12-27 15:50:52'),
(4, 0, 'Elena', 'Леонтьевна', 'Smirnova', 'elena@mail.ru', '+7985574334', NULL, NULL, NULL, NULL, 'storage/users/SdeCsZArErw.jpg', NULL, '$2y$10$pmc3JbyiByeTZs9AbV6TS.tQFmwvppiuag0hTEZM.Nny.Jdzq7ttq', NULL, '2021-01-12 16:28:54', '2021-01-12 16:35:37'),
(7, 0, 'Кирилл', NULL, 'Летов', 'kirill@mail.ru', NULL, NULL, NULL, NULL, NULL, 'storage/users/EgGqhZyW_E4.jpg', NULL, '$2y$10$uAtkv4dhN/qJ2tOQNVMMOeukwhS7Z/x9XEZc0nmRaueHAlyrGaoI2', NULL, '2021-01-15 04:29:46', '2021-01-15 04:32:49');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `desires`
--
ALTER TABLE `desires`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_slider`
--
ALTER TABLE `main_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_sku`
--
ALTER TABLE `order_sku`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sku_value`
--
ALTER TABLE `sku_value`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `desires`
--
ALTER TABLE `desires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `main_slider`
--
ALTER TABLE `main_slider`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `order_sku`
--
ALTER TABLE `order_sku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `skus`
--
ALTER TABLE `skus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `sku_value`
--
ALTER TABLE `sku_value`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
