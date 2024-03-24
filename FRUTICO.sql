-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2024 pada 13.28
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frutico`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `quantity`, `created_by`) VALUES
(22, 25, 2, 58),
(39, 25, 2, 54),
(41, 31, 2, 54),
(43, 25, 2, 65),
(44, 25, 2, 83),
(57, 31, 2, 62),
(58, 25, 4, 87),
(59, 25, 4, 77),
(60, 26, 2, 77);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `firstname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `firstname`, `lastname`, `email`, `transaction_id`, `created_at`, `created_by`) VALUES
(1, '130.00', 2, 'Cholid', 'Afiddrus W', 'cholid@gmail.com', '2833', NULL, NULL),
(23, '264000.00', 0, 'User', 'Baru', 'afid12345678@gmail.com', '2395', 1695022166, 58),
(24, '264000.00', 10, 'User', 'Baru', 'afid12345678@gmail.com', '5801', 1695027202, 58),
(25, '264000.00', 10, 'User', 'Baru', 'afid12345678@gmail.com', '5323', NULL, 58),
(26, '264000.00', 10, 'User', 'Baru', 'afid12345678@gmail.com', '4220', 1695106532, 58),
(27, '172000.00', 0, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '9564', 1695107366, 54),
(28, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4120', 1695107503, 54),
(29, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '5799', 1695175429, 54),
(30, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '8773', 1695175449, 54),
(31, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '3415', 1695175867, 54),
(32, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '0912', 1695175885, 54),
(33, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4837', 1695177066, 54),
(40, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '6433', 1695182996, 54),
(41, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '1472', 1695191949, 54),
(42, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '0501', 1695192217, 54),
(43, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '7405', 1695271649, 54),
(45, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '8077', 1695271960, 54),
(46, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4786', 1695276815, 54),
(47, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4911', 1695277321, 54),
(48, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '2867', 1695277623, 54),
(49, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '2408', 1695279479, 54),
(50, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '0867', 1695279761, 54),
(51, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '2465', 1695285272, 54),
(57, '172000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '1802', 1695350604, 54),
(58, '342000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '8559', 1695366988, 54),
(59, '389000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '6180', 1695369769, 54),
(60, '389000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '9717', 1695369777, 54),
(61, '389000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4850', 1695370204, 54),
(62, '451000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '3207', 1695633053, 54),
(63, '451000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '4030', 1695638074, 54),
(64, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '5411', 1695727876, 54),
(65, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '0302', 1695728257, 54),
(66, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '7684', 1695728276, 54),
(67, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '2867', 1695728336, 54),
(68, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '7412', 1695728403, 54),
(69, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '5324', 1695728444, 54),
(70, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '2504', 1695728456, 54),
(71, '62000.00', 10, 'Cholid', 'Afiddrus  W', 'cholid@gmail.com', '6678', 1695728592, 54),
(270, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '4188', 1708305144, 62),
(271, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '2925', 1708305335, 62),
(272, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '4210', 1708305538, 62),
(273, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '7348', 1708305607, 62),
(276, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '3340', 1708306327, 62),
(278, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '7435', 1708306812, 62),
(279, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '3596', 1708307023, 62),
(280, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '6552', 1708307361, 62),
(286, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '6953', 1708308459, 62),
(287, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '9548', 1708308589, 62),
(288, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '1742', 1708308839, 62),
(289, '295000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '2669', 1708308886, 62),
(290, '414000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '7504', 1708309167, 62),
(291, '414000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '3370', 1708315490, 62),
(292, '192000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '8810', 1708315838, 62),
(293, '130000.00', 10, 'Hirouda', 'Kun', 'hirouda@gmail.com', '1332', 1708398546, 62),
(411, '75000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '7089', 1710872250, 84),
(412, '86000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '9800', 1710900552, 84),
(413, '86000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '8308', 1710900907, 84),
(414, '80000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '1599', 1710903127, 84),
(415, '86000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '2585', 1710904033, 84),
(416, '86000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '4794', 1710975822, 84),
(417, '236000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '1380', 1711094520, 84),
(420, '80000.00', 2, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '8147', 1711242614, 84),
(433, '0.00', 10, '', '', '', '3949', 1711280762, 84),
(434, '0.00', 10, '', '', '', '8496', 1711280824, 84),
(435, '0.00', 10, '', '', '', '1909', 1711281661, 84),
(436, '0.00', 10, '', '', '', '8372', 1711282213, 84),
(437, '0.00', 10, '', '', '', '3140', 1711282265, 84),
(438, '0.00', 10, '', '', '', '1823', 1711282273, 84),
(439, '0.00', 10, '', '', '', '2788', 1711282283, 84),
(440, '0.00', 10, '', '', '', '2434', 1711282621, 84),
(441, '0.00', 10, '', '', '', '5850', 1711282629, 84),
(442, '0.00', 10, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '3995', 1711286178, 84),
(443, '0.00', 10, 'Frontend', 'User 6', 'frontenduser6@gmail.com', '9210', 1711286190, 84);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_addresses`
--

CREATE TABLE `order_addresses` (
  `order_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_addresses`
--

INSERT INTO `order_addresses` (`order_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(43, 'Address', 'City', 'State', 'Country', NULL),
(278, 'address', 'city', 'state', 'Indonesia', 'zipcode'),
(279, 'address', 'city', 'state', '', 'zipcode'),
(280, 'address', 'city', 'state', 'Country', 'zipcode'),
(286, 'address', 'city', 'state', 'country', 'zipcode'),
(287, 'address', 'city', 'state', 'country', 'zipcode'),
(288, 'address', 'city', 'state', 'country', 'zipcode'),
(289, 'address', 'city', 'state', 'country', 'zipcode'),
(290, 'address', 'city', 'state', 'country', 'zipcode'),
(291, 'address', 'city', 'state', 'country', 'zipcode'),
(292, 'address', 'city', 'state', 'country', 'zipcode'),
(293, 'address', 'city', 'state', 'country', 'zipcode'),
(411, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(412, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(413, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(414, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(415, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(416, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(417, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(420, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04'),
(433, '', '', '', '', ''),
(434, '', '', '', '', ''),
(435, '', '', '', '', ''),
(436, '', '', '', '', ''),
(437, '', '', '', '', ''),
(438, '', '', '', '', ''),
(439, '', '', '', '', ''),
(440, '', '', '', '', ''),
(441, '', '', '', '', ''),
(442, '', '', '', '', ''),
(443, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `product_name`, `product_id`, `unit_price`, `order_id`, `quantity`) VALUES
(1, 'Strawberry', 48, '15000.00', 70, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `stock` int(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `stock`) VALUES
(25, 'Grape ', '<p>Grapes are a rich source of antioxidants. They may help&nbsp;<strong>boost heart health, prevent cancer, manage blood pressure, and protect the eyes</strong>, among other benefits.</p>\r\n', '/products/msJbArlB_LK6Dt3PS_f1h7w3Dpkgnx-S/product-img-2.jpg', '40000.00', 1, 1694074416, 1694144814, 54, 54, 78),
(26, 'Lemon', '<p>Lemons contain a high amount of vitamin C, soluble fiber, and plant compounds that give them a number of health benefits. Lemons may&nbsp;<strong>aid weight loss and reduce your risk of heart disease, anemia, kidney stones, digestive issues, and cancer</strong>.&nbsp;Lemon can boost hydration, prevent the formation of kidney stones, create an alkaline atmosphere in the body, and is rich in antioxidants which are responsible to protect against cellular damage. Overall&nbsp;<strong>lemon can be consumed by a kidney disease patient in reasonable quantity without any problems</strong>.</p>\r\n', '/products/B7l955knVmH1Vvu1GCJNgfe9PNdfdwQo/product-img-3.jpg', '25000.00', 1, 1694138521, 1694138521, 54, 54, 0),
(31, 'Apple', '<p>Eating one medium apple a day may help lower blood pressure, cholesterol, and inflammation all of which support a healthy heart. Eat the peel when you can as the fiber and polyphenols found in the peel benefit heart health. Apples can strengthen your lungs. <strong>The phytochemicals and fiber in apples have antioxidant effects that may protect a cell&#39;s DNA from oxidative damage, which is a precursor to cancer.</strong></p>\r\n', '/products/X6NqYCqIVzjjEcsy2xCdo5VexcMEoF6G/product-img-5.jpg', '33000.00', 1, 1695731283, 1695731283, 54, 54, -1),
(36, 'Banana', '<p>Bananas contain essential nutrients that may&nbsp;<strong>enhance heart health, help manage blood pressure, and boost a person&#39;s mood</strong>, among other benefits.</p>\r\n', '/products/12c9ss6fdX3npLKnyNYxkPWAMsbsEKP1/product-img-7.jpg', '43000.00', 1, 1695777997, 1695778056, 54, 54, 29),
(37, 'Raspberry', '<p>Raspberries are low in calories but high in fiber, vitamins, minerals and antioxidants.They may&nbsp;<strong>protect against diabetes, cancer, obesity, arthritis and even provide anti-aging effects</strong>.&nbsp;</p>\r\n', '/products/2secjLs5ArY7Osksgep2FVxR1mc6-X3E/product-img-6.jpg', '75000.00', 1, 1695778401, 1695780116, 54, 54, 18),
(38, 'Avocado', '<p>Eating avocados regularly may benefit health in several ways, including&nbsp;<strong>protecting against heart disease, improving overall diet quality, improving satiety, and promoting gut health.</strong></p>\r\n', '/products/q2n7rvxyI8FrFUIEj9oq5GizYabg9grw/avocado.jpg', '205000.00', 1, 1695778916, 1695780067, 54, 54, 35),
(39, 'Orange', '<p>In addition to vitamin C, oranges have other nutrients that keep your body healthy. The fiber in oranges can&nbsp;<strong>keep blood sugar levels in check and reduce high cholesterol to prevent cardiovascular disease</strong>.&nbsp;.</p>\r\n', '/products/M-Q55QYN9kvZNCxe47Qv-xyxLaO1ILDA/orange.jpg', '45000.00', 1, 1695779687, 1695780009, 54, 54, 23),
(40, 'Watermelon', '<p>Watermelon is also rich in potassium, which works to&nbsp;<strong>lower blood pressure and supports nerve functioning</strong>, and vitamin B6, which helps the body break down the proteins that you eat.</p>\r\n', '/products/7B1D7sdrG7Zwrr7frnAYZURPnoaSbjd8/watermelon.jpg', '18000.00', 1, 1695779781, 1707186954, 54, 72, 15),
(41, 'Pineapple', '<p>The vitamins and minerals in pineapple could help&nbsp;<strong>shorten viral and bacterial infections and strengthen your bones</strong>. There&#39;s also a little evidence that pineapple may help prevent cancer.</p>\r\n', '/products/Xhv21actNXmKPS7zwdq_5C4fDcN_jOyk/pineapple.jpg', '38000.00', 1, 1695780363, 1707187016, 54, 72, 10),
(43, 'Mango', '<p>Mango is rich in vitamins, minerals, and antioxidants, and it has been associated with many health benefits, including&nbsp;<strong>potential anticancer effects, as well as improved immunity and digestive and eye health</strong>.</p>\r\n', '/products/Pnf7NIMxutBAMSigG3TPh_U6vkGo7quf/Mango.jpg', '35900.00', 1, 1695780453, 1695780453, 54, 54, 23),
(44, 'Guava', '<p>Guavas enhance immunity due to their high vitamin C content, aid in diabetes management, promote heart health, assist in weight loss, and improve digestion.</p>\r\n', '/products/p-C555ThMl-ADfuM9PwtfFxf4rz1hnj6/guava.jpg', '19900.00', 1, 1695780731, 1695781017, 54, 54, 26),
(45, 'Pomegranate', '<p>Consuming pomegranates regularly&nbsp;<strong>can cure many diseases</strong>. Cholesterol, high blood pressure, obesity and heart ailments are some of them.&nbsp;</p>\r\n', '/products/DC5aWZSWqoWSn-o5f9R6UgiJgbRXaQs2/pomegranate.jpeg', '100000.00', 1, 1695780857, 1695780989, 54, 54, 31),
(46, 'Dragon Fruit', '<p>Dragon fruit is high in vitamin C and other antioxidants, which are good for your immune system. It can&nbsp;<strong>boost your iron levels</strong>. Iron is important for moving oxygen through your body and giving you energy, and dragon fruit has iron. And the vitamin C in dragon fruit helps your body take in and use the iron.</p>\r\n', '/products/zeILeb0-FgfLfTJUKqTqD8L05nyZGSYR/dragon fruit.jpg', '32000.00', 1, 1695780949, 1695780949, 54, 54, 23),
(47, 'Raspberry', '<p>Raspberries are low in calories but high in fiber, vitamins, minerals and antioxidants.They may&nbsp;<strong>protect against diabetes, cancer, obesity, arthritis and even provide anti-aging effects</strong>.&nbsp;</p>\r\n', '/products/2secjLs5ArY7Osksgep2FVxR1mc6-X3E/product-img-6.jpg', '75000.00', 1, 1695778401, 1695780116, 54, 54, 28),
(48, 'Strawberry', '<p>The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit.&nbsp;</p>\r\n', '/products/QzV8g9KBVWrQt80P8MFz36eodNQ7wY2R/product-img-1.jpg', '15000.00', 1, 1693464086, 1707970848, 54, 72, 12),
(50, 'Grape ', '<p>Grapes are a rich source of antioxidants. They may help&nbsp;<strong>boost heart health, prevent cancer, manage blood pressure, and protect the eyes</strong>, among other benefits.</p>\r\n', '/products/msJbArlB_LK6Dt3PS_f1h7w3Dpkgnx-S/product-img-2.jpg', '40000.00', 1, 1694074416, 1694144814, 54, 54, 31),
(51, 'Lemon', '<p>Lemons contain a high amount of vitamin C, soluble fiber, and plant compounds that give them a number of health benefits. Lemons may&nbsp;<strong>aid weight loss and reduce your risk of heart disease, anemia, kidney stones, digestive issues, and cancer</strong>.&nbsp;Lemon can boost hydration, prevent the formation of kidney stones, create an alkaline atmosphere in the body, and is rich in antioxidants which are responsible to protect against cellular damage. Overall&nbsp;<strong>lemon can be consumed by a kidney disease patient in reasonable quantity without any problems</strong>.</p>\r\n', '/products/B7l955knVmH1Vvu1GCJNgfe9PNdfdwQo/product-img-3.jpg', '25000.00', 1, 1694138521, 1694138521, 54, 54, 34),
(52, 'Apple', '<p>Eating one medium apple a day may help lower blood pressure, cholesterol, and inflammation all of which support a healthy heart. Eat the peel when you can as the fiber and polyphenols found in the peel benefit heart health. Apples can strengthen your lungs. <strong>The phytochemicals and fiber in apples have antioxidant effects that may protect a cell&#39;s DNA from oxidative damage, which is a precursor to cancer.</strong></p>\r\n', '/products/X6NqYCqIVzjjEcsy2xCdo5VexcMEoF6G/product-img-5.jpg', '33000.00', 1, 1695731283, 1695731283, 54, 54, 47),
(53, 'Banana', '<p>Bananas contain essential nutrients that may&nbsp;<strong>enhance heart health, help manage blood pressure, and boost a person&#39;s mood</strong>, among other benefits.</p>\r\n', '/products/12c9ss6fdX3npLKnyNYxkPWAMsbsEKP1/product-img-7.jpg', '43000.00', 1, 1695777997, 1695778056, 54, 54, 37),
(54, 'Pineapple', '<p>The vitamins and minerals in pineapple could help&nbsp;<strong>shorten viral and bacterial infections and strengthen your bones</strong>. There&#39;s also a little evidence that pineapple may help prevent cancer and even help fertility by improving the quality of sperm.</p>\r\n', '/products/Xhv21actNXmKPS7zwdq_5C4fDcN_jOyk/pineapple.jpg', '38000.00', 1, 1695780363, 1695780363, 54, 54, 28),
(55, 'Avocado', '<p>Eating avocados regularly may benefit health in several ways, including&nbsp;<strong>protecting against heart disease, improving overall diet quality, improving satiety, and promoting gut health.</strong></p>\r\n', '/products/q2n7rvxyI8FrFUIEj9oq5GizYabg9grw/avocado.jpg', '205000.00', 1, 1695778916, 1695780067, 54, 54, 12),
(56, 'Dragon Fruit', '<p>Dragon fruit is high in vitamin C and other antioxidants, which are good for your immune system. It can&nbsp;<strong>boost your iron levels</strong>. Iron is important for moving oxygen through your body and giving you energy, and dragon fruit has iron. And the vitamin C in dragon fruit helps your body take in and use the iron.</p>\r\n', '/products/zeILeb0-FgfLfTJUKqTqD8L05nyZGSYR/dragon fruit.jpg', '32000.00', 1, 1695780949, 1695780949, 54, 54, 5),
(58, 'Apple', '<p>Eating one medium apple a day may help lower blood pressure, cholesterol, and inflammation all of which support a healthy heart. Eat the peel when you can as the fiber and polyphenols found in the peel benefit heart health. Apples can strengthen your lungs. <strong>The phytochemicals and fiber in apples have antioxidant effects that may protect a cell&#39;s DNA from oxidative damage, which is a precursor to cancer.</strong></p>\r\n', '/products/X6NqYCqIVzjjEcsy2xCdo5VexcMEoF6G/product-img-5.jpg', '33000.00', 1, 1695731283, 1695731283, 54, 54, 0),
(59, 'Watermelon', '<p>Watermelon is also rich in potassium, which works to&nbsp;<strong>lower blood pressure and supports nerve functioning</strong>, and vitamin B6, which helps the body break down the proteins that you eat and also boosts the immune system and nerve function.</p>\r\n', '/products/7B1D7sdrG7Zwrr7frnAYZURPnoaSbjd8/watermelon.jpg', '18000.00', 1, 1695779781, 1695779781, 54, 54, 0),
(60, 'Pineapple', '<p>The vitamins and minerals in pineapple could help&nbsp;<strong>shorten viral and bacterial infections and strengthen your bones</strong>. There&#39;s also a little evidence that pineapple may help prevent cancer and even help fertility by improving the quality of sperm.</p>\r\n', '/products/Xhv21actNXmKPS7zwdq_5C4fDcN_jOyk/pineapple.jpg', '38000.00', 1, 1695780363, 1695780363, 54, 54, 0),
(62, 'Lemon', '<p>Lemons contain a high amount of vitamin C, soluble fiber, and plant compounds that give them a number of health benefits. Lemons may&nbsp;<strong>aid weight loss and reduce your risk of heart disease, anemia, kidney stones, digestive issues, and cancer</strong>.&nbsp;Lemon can boost hydration, prevent the formation of kidney stones, create an alkaline atmosphere in the body, and is rich in antioxidants which are responsible to protect against cellular damage. Overall&nbsp;<strong>lemon can be consumed by a kidney disease patient in reasonable quantity without any problems</strong>.</p>\r\n', '/products/B7l955knVmH1Vvu1GCJNgfe9PNdfdwQo/product-img-3.jpg', '25000.00', 1, 1694138521, 1694138521, 54, 54, 0),
(70, 'Kiwi', '<p>Kiwi</p>\r\n', NULL, '5000.00', 1, 1710871626, 1710871626, 71, 71, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_history`
--

CREATE TABLE `purchase_history` (
  `user_id` int(68) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, NULL, NULL, 'admin', 'mH_OK8W43SK9ZDsFyArSu4mYc-L-UWfz', '123456', NULL, 'admin@example.com', 9, 1692763539, 1692763539, '123456'),
(49, 'John', 'haha', '1234568789', 'wQ89UXGbijnAYGWcXU6QCm1wC2wDG6Yo', '$2y$13$Ls6uvT/aAf0cvqMflEY9suLsM5oKID3gvwVvwtGs4SzXpku9fSvZy', NULL, 'adminnnnnnn@example.com', 9, 1693276897, 1693276897, 'hYkOwpFgfj3Tt5XSxjdit6C0dUZzFAkb_1693276897'),
(50, 'John', 'haha', 'johndoe', '88-D-aBWzyg-xfIQSFgcND5ffMukCZGe', '$2y$13$5DCIkxyawY83eGLZHT4VYO4WoLcaqi0oz5yAU4nAzCh.gcjyt13tK', NULL, 'johndoe@example.com', 9, 1693276970, 1693276970, 'yKaEu_K46hKka0urQZMKiyx2Dxiiwk8f_1693276970'),
(52, 'John', 'haha', '123456878', 'zrKHr7PecUDMcJ-h-u-uySCCNlY6ZkS2', '$2y$13$rwHeL3dOIK6TwdrGIQADluYfUoZJ5EA6gST5vL2H2jwfxcmq3jOla', NULL, 'adminnnnnn@example.com', 9, 1693278048, 1693278048, 'okymzD59fXi_RVzSSsldXLHZ3xWoVtzV_1693278047'),
(54, 'Cholid', 'Afiddrus  W', 'cholid', '$2y$10$DnCM4a.meo1WWpRoUcltz.m.h', '$2y$10$DnCM4a.meo1WWpRoUcltz.m.hCqxXkie.JvgDd9/4FRNNpwYF3rim', '123456', 'cholid@gmail.com', 9, 0, 1693886649, '123456'),
(57, 'cholid', 'afiddrus', 'wijayanto', '', '$2y$13$rwHeL3dOIK6TwdrGIQADluYfUoZJ5EA6gST5vL2H2jwfxcmq3jOla', 'Ekh_KtHO7jdEFXXj-13AdK-M5_0Cid17_1693986851', 'cholid@example.com', 10, 0, 1693986851, NULL),
(58, 'User', 'Baru', 'User Baru', 'FsE__1JTnTgc0wxawFzGnlAd37HitvRO', '$2y$13$1oT/dKEKu2JokoIAILB5cus2xnpSgWDVYbfwdDG8bwNb8T2gKKra6', '12345678', 'afid12345678@gmail.com', 11, 1694069887, 1694069887, 'fV5E5vWNXCAHD1SymUZrqDQYE-E2GJS7_1694069887'),
(59, 'Admin', 'Hadir', '1', '', '', NULL, 'hahaha@gmail.com', 10, 1695912478, 1695912478, NULL),
(61, 'cholid', 'afiddrus', 'cholid aw', '', '', NULL, 'tes@gmail.com', 10, 1695987672, 1695987672, NULL),
(62, 'Hirouda', 'Kun', 'Hirouda', 'i7LHgcFwLSJDW9wTxUvGNMQslTYD2lyy', '$2y$13$BWExrHi/2nDNVW4imvSiuu7Wc34kTZFj/F.7usja4SPUSIRo.3pie', NULL, 'hirouda@gmail.com', 10, 1700456064, 1700456064, 'aSqWRqPkOCXMEiT_JDQu1FgZn4ixxdZl_1700456064'),
(63, 'Hirouda', 'Tzy', 'Hiroudaa', '8z3iQ66iet4B36OkNGyPjPCXnRyVTZMl', '$2y$13$8eG6N9WcLsD1uWEjRsrSQ.94FTdjzmBJ/2gIEtd4WGW3hlkCX9JVG', NULL, 'tessss@gmail.com', 10, 1700525322, 1700525322, 'QptWinHx6K33psqwjywwO5dcSPSBLdX-_1700525322'),
(65, 'Muhammad', 'Afrizal', 'Frontend', 'GO4qxmxdx72tbZxvlUVyWIjEQSG1lsfU', '$2y$13$A4Ze9BTMqOovvNQt0R9l6uBt6RDtkxR6YpHFvkKWGbiQPu4agCyy.', NULL, 'frontend@gmail.com', 9, 1700526054, 1700526054, 'xMd4-X0mJYlCySmII0oOv80r0z5XgM6j_1700526054'),
(66, 'Cholid Afiddrus', 'Wijayanto', 'CholidAW', 'NH5yBQtgYt3Udv74eV8aPw7rR2aubwxV', '$2y$13$CN/eh2NKgdRDuG34gg.TpOTCqugx43E1E5q3BpsOFa7ZG8SpFZVgy', NULL, '541211045@student.smktelkom-pwt.sch.id', 9, 1700526154, 1700526154, 'b-znn29X9J2bIxev0HqbXyhLl4yQByss_1700526154'),
(71, 'backend', 'Admin', 'Backend', 'GVsPhLqcMjmAlj4f5NPJ8z6Rh4avcuiJ', '$2y$13$.Ulbj1rarMnhxU/foz4Xq.ry6rmiQvE/Ic8xIYatQTft9.JOQpwlq', NULL, 'backend@gmail.com', 11, 1700530755, 1700530755, NULL),
(72, 'Backend 1', 'Admin', 'Backend 1', 'pxQC4EDvJ9bgqUVhoNPODdpEegLbcvTr', '$2y$13$R4e09jK0AwL0RYeV.jVSx.ZhQx5YlhaleUSOmLZi4iyM0y3VR4//W', 'hF4md7u85mN00FvGtlS3rUVBXegZv6a6_1700531579', 'backend1@gmail.com', 12, 1700531581, 1700531581, 'p_7uuSS08QI5cCUUlF7cQghx6fw5TV9o_1700531579'),
(77, 'Frontend', 'User', 'Frontend User', 'cwarAIsLKuidywT8q8ve24z42W_Fp1Ew', '$2y$13$psSphamRPendCObrtw4VO.RkBiOtQ4d93aCbrhEze.LnRHkdgKmDi', NULL, 'frontenduser@gmail.com', 10, 1700614078, 1700614078, 'LGVN4mAtNCN38-cv8fLZqVxKk_oQBIuQ_1700614078'),
(78, 'Frontend ', 'User 2', 'Frontend User 2', 'ZHmyJDCvie_mzDU5i2Kmp9LhgbSI3BQ7', '$2y$13$lmZfKJ9YZet9gB2v3wKMCOEgMkxNkdsqonetPygYcWQlTERg.thcO', NULL, 'frontenduser2@gmail.com', 9, 1700614395, 1700614395, 'i4-ddBFBNNQeGgeVKoL2cFXFApa2RgLe_1700614395'),
(79, 'Frontend', 'User 4', 'Frontend User 4', 'RkdBkHDRmmm9rXLRJrRgnvAMMtMapgFX', '$2y$13$.P4to6owsX8rkiX7AyAa5u7wUwUR.l9u4lQ/9aFifJLLLrNoupETW', NULL, 'frontenduser4@gmail.com', 9, 1700614610, 1700614610, 'gCp-f9J8LpxuDADdAAZwlv67c830V3mi_1700614610'),
(83, 'Frontend ', 'User 5', 'Frontend User 5', '5xeoA0e1SI2Hq1sgPsn67PeE2JKJzG1Y', '$2y$13$qVizVAP7jUgwNftTxQgh8uXUmpofGiTUT7OCV0gAGVvqsBUNt7HaO', NULL, 'frontenduser5@gmail.com', 10, 1700615537, 1700615537, 'a7XQcm-tCy7OpxVU4vRLsmc-UqY1Cqfw_1700615537'),
(84, 'Frontend', 'User 6', 'Frontend User 6', 'WJUDorql5yrDJh5TcAm5Eqsyb7f7v8qA', '$2y$13$YQ1Jv8XOiWPeiU7PRW8UfuyTFnvrmqC98.uAgNHqMKTEQYnmlOIh6', NULL, 'frontenduser6@gmail.com', 10, 1700616044, 1700616044, 'y7xDYnxloik_12FoN9g8u3bW8EdY6gyK_1700616044'),
(87, 'User', 'Frontend', 'frontenddd', 'YryAtd7aoAPGq_os8mADu79Y0Sn-1O4l', '$2y$13$pCemSM66J4QPL8Ulfbwe3O/gCAJ9E2uAQaxRfXdjGrm33skVG74hu', NULL, 'userfrontend@gmail.com', 10, 1708563704, 1708563704, 'cYCz9F55VNU0kj4wAq0Ylv4_dB0fVBUb_1708563704'),
(88, 'firstname', 'lastname', 'username', 'LDkaYBhpaRq2biAs9-PwqcGwGe4ufQv7', '$2y$13$lrc6wxMmcNl7GFbYhgL6oOrPntI8B4IdKh1p3sfkOrYly3cypKcDC', NULL, 'email@email.com', 10, 1709178747, 1709178747, 'QbSzmfYmgr0BPGjknrWFeHbf21FFJ-X1_1709178747');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(1, 54, 'adress2', 'city', 'state', 'country', ''),
(2, 58, 'adress3', 'cityy', 'statee', 'countryy', ''),
(3, 62, 'address', 'city', 'state', 'country', 'zipcode'),
(4, 83, 'addresss', 'city', 'state', 'country', 'frontend123456'),
(5, 77, 'Jl Sokadrana No 4', 'Purwokerto', 'Jawa Tengah', 'Indonesia', '04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-cart_items-product_id` (`product_id`),
  ADD KEY `idx-cart_items-created_by` (`created_by`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-orders-created_by` (`created_by`);

--
-- Indeks untuk tabel `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx-order_addresses-order_id` (`order_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-order_items-product_id` (`product_id`),
  ADD KEY `idx-order_items-order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-products-created_by` (`created_by`),
  ADD KEY `idx-products-updated_by` (`updated_by`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indeks untuk tabel `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_addresses-user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `fk-cart_items-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-cart_items-product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk-orders-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD CONSTRAINT `fk-order_addresses-order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk-order_items-order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-order_items-product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk-products-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-products-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `fk-user_addresses-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
