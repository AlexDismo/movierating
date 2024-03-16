-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: database
-- Время создания: Мар 16 2024 г., 23:46
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lamp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(3) UNSIGNED DEFAULT NULL,
  `biography` mediumtext,
  `country` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `name`, `age`, `biography`, `country`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 'Leonardo DiCaprio', 49, 'Leonardo Wilhelm DiCaprio (born November 11, 1974) is an American actor and film producer. Known for his work in biopics and period films, DiCaprio is the recipient of numerous accolades, including an Academy Award, a British Academy Film Award, and three Golden Globe Awards. As of 2019, his films have grossed over $7.2 billion worldwide, and he has been placed eight times in annual rankings of the world\'s highest-paid actors.', 'USA', 'actors/cbdf5d06a0cc978024237d13268e4074.jpg', '2024-03-11 00:32:06', '2024-03-11 00:32:06'),
(3, 'Rebecca Ferguson', 40, 'Rebecca Louisa Ferguson Sundström (born October 19, 1983) is a Swedish actress. She began her acting career with the Swedish soap opera Nya tider (1999–2000) and went on to star in the slasher film Drowning Ghost (2004). She came to international prominence with her portrayal of Elizabeth Woodville in the British television miniseries The White Queen (2013), for which she was nominated for a Golden Globe for Best Actress in a Miniseries or Television Film. In 2023, she starred in the Apple TV+ science fiction drama series Silo.', 'Sweden', 'actors/fd985a3d937ea46d3080287042335bbb.webp', '2024-03-11 00:34:49', '2024-03-11 00:34:49'),
(4, 'Sydney Sweeney', 26, 'Sydney Bernice Sweeney is an American actress. She gained mainstream attention in the Netflix series Everything Sucks! (2018) for her role as Emaline and has portrayed Eden in the Hulu series The Handmaid\'s Tale (2018) and Alice in the HBO miniseries Sharp Objects (2018). Since 2019, she has starred as Cassie Howard in the HBO teen drama series Euphoria and as Olivia Mossbacher in The White Lotus. In film, she had a role in Quentin Tarantino\'s 2019 comedy-drama Once Upon a Time in Hollywood, portraying Snake, a member of the Manson Family.', 'USA', 'actors/8fed509532fd9a7872cbafc2120c736f.webp', '2024-03-11 00:35:38', '2024-03-11 00:35:38'),
(5, 'Jason Statham', 56, 'Jason Statham (born July 26, 1967) is an English actor. He is known for portraying characters in various action-thriller films who are typically tough, hardboiled, gritty, or violent.  Statham began practicing Chinese martial arts, kickboxing, and karate recreationally in his youth while working at local market stalls. An avid footballer and diver, he was a member of Britain\'s national diving team and competed for England in the 1990 Commonwealth Games. Shortly after, he was asked to model for French Connection, Tommy Hilfiger, and Levi\'s in various advertising campaigns. His past history working at market stalls inspired his casting in the Guy Ritchie crime films Lock, Stock and Two Smoking Barrels (1998) and Snatch (2000).', 'UK', 'actors/96c6cddcac3a08848f4a4884de6f8a76.webp', '2024-03-11 00:36:12', '2024-03-11 00:36:12'),
(6, 'Rainn Wilson', 58, 'Rainn Dietrich Wilson (born January 20, 1966) is an American actor and comedian. He is primarily known for his role as the egomaniacal Dwight Schrute on the American version of the television comedy The Office. He has also directed two episodes of The Office: the sixth season\'s \"The Cover-Up\" and the seventh season\'s \"Classy Christmas\".  Description above from the Wikipedia article Rainn Wilson, licensed under CC-BY-SA, full list of contributors on Wikipedia.', 'USA', 'actors/88971679070643c761ad36326e3ab604.webp', '2024-03-11 00:36:55', '2024-03-11 00:36:55'),
(7, 'Li Bingbing', 51, 'Li Bingbing (Chinese: 李冰冰; born February 27, 1973 in Harbin, China). She is an actress and producer, known for Transformers: Age of Extinction (2014), Resident Evil: Retribution(2012) and Detective Dee: The Mystery of the Phantom Flame (2010). Li\'s first big break came in 1999 when she played a kindhearted cop in the film \"Seventeen Years\" (Guo nian hui jia). This film won her the Best Asian Actress award in the 2000 Singapore International Film Festival. In 2009, she was named a WWF Earth Hour Global Ambassador.', 'China', 'actors/285b9f4afd792f225f26602c23c88fdd.webp', '2024-03-11 00:37:30', '2024-03-11 00:37:30'),
(8, 'Jeremy Piven', 58, 'Jeremy Samuel Piven (born July 26, 1965) is an American film producer and actor best known for his role as Ari Gold in the television series Entourage for which he has won three Primetime Emmy Awards as well as several other nominations for Best Supporting Actor.', 'USA', 'actors/df620d0d0dcdd8e53e2115038da25b3a.webp', '2024-03-11 00:39:29', '2024-03-11 00:39:29'),
(9, 'Timothée Chalamet', 28, 'Timothée Hal Chalamet (born December 27, 1995) is an American actor.  He began his career appearing in the drama series Homeland in 2012. Two years later, he made his film debut in the comedy-drama Men, Women & Children and appeared in Christopher Nolan\'s science fiction film Interstellar. He came into attention in Luca Guadagnino\'s coming-of-age film Call Me by Your Name (2017). Alongside supporting roles in Greta Gerwig\'s films Lady Bird (2017) and Little Women (2019), he took on starring roles in Beautiful Boy (2018) and Dune (2021).', 'USA', 'actors/9338738895bb11016009a125525a7f05.webp', '2024-03-11 00:39:56', '2024-03-11 00:39:56'),
(10, 'Jenna Ortega', 21, 'Jenna Marie Ortega (born September 27, 2002) is an American actress. She began her career as a child actress, receiving recognition for her role as young Jane on The CW comedy-drama series Jane the Virgin (2014–2019). She had her breakthrough for starring as Harley Diaz on the Disney Channel series Stuck in the Middle (2016–2018), for which she won an Imagen Award. She played Ellie Alves in the second season of the Netflix thriller series You in 2019 and starred in the Netflix family film Yes Day (2021).  Ortega received critical praise for her performance in the teen drama The Fallout (2021), and went on to star in the slasher films X (2022), Scream (2022) and its sequel Scream VI (2023), establishing herself as a scream queen. She starred as Wednesday Addams in the Netflix horror comedy series Wednesday (2022), for which she received nominations for a Primetime Emmy Award, a Golden Globe Award and a SAG Award.', 'USA', 'actors/c92c604b8dba52ea60639b3355aca436.webp', '2024-03-11 00:40:35', '2024-03-11 00:40:35'),
(11, 'Jackie Chan', 69, 'Jackie Chan (Chinese: 成龍; born 7 April 1954), born Chan Kong-sang, is a Hong Kong actor, action choreographer, filmmaker, comedian, producer, martial artist, screenwriter, entrepreneur, singer and stunt performer. In his movies, he is known for his acrobatic fighting style, comic timing, use of improvised weapons, and innovative stunts. Jackie Chan has been acting since the 1970s and has appeared in over 100 films.  Chan has received stars on the Hong Kong Avenue of Stars and the Hollywood Walk of Fame. As a cultural icon, Chan has been referenced in various pop songs, cartoons, and video games. Chan is also a Cantopop and Mandopop star, having released a number of albums and sung many of the theme songs for the films in which he has starred.', 'Hong Kong', 'actors/8989f2d6a8e0534445af6323a0788f83.webp', '2024-03-11 00:41:37', '2024-03-11 00:41:37'),
(12, 'Chris Tucker', 52, 'Christopher \"Chris\" Tucker (born August 31, 1971) is an American actor and comedian, best known for his roles as Detective James Carter in the Rush Hour trilogy and Smokey in the 1995 film Friday. Tucker was born in Atlanta, Georgia, the youngest son of Mary Louise and Norris Tucker. Tucker was raised in Decatur, Georgia. After graduating from Columbia High School, he moved to Los Angeles to pursue a career in comedy and movies. In 1992, Tucker was a frequent performer on Def Comedy Jam. ', 'USA', 'actors/3cc1923ca9d24738224a89ecdeff5326.webp', '2024-03-11 00:42:17', '2024-03-11 00:42:17'),
(13, 'Kate Winslet', 48, 'Kate Elizabeth Winslet (born October 5, 1975) is an English actress. Known for her work in independent films, particularly period dramas, as well as for her portrayals of headstrong and complicated women, she has received numerous accolades, including an Academy Award, a Grammy Award, two Primetime Emmy Awards, three British Academy Film Awards, and five Golden Globe Awards.  Winslet studied drama at the Redroofs Theatre School. Her first screen appearance, at age 15, was in the British television series Dark Season (1991). ', 'UK', 'actors/4711e3d9c314e230b7e705b134edcc8f.webp', '2024-03-11 00:43:33', '2024-03-11 00:43:33'),
(14, 'Billy Zane', 58, 'William George \"Billy\" Zane, Jr. (born February 24, 1966) is an American actor, producer and director. He is probably best known for his roles as Caledon \"Cal\" Hockley in Titanic, The Phantom from The Phantom, John Wheeler in Twin Peaks and Mr. E in CQ.', 'USA', 'actors/ba83ae6c807213a942965535be196494.webp', '2024-03-11 00:44:02', '2024-03-11 00:44:02'),
(15, 'Theo James', 39, 'Theodore Peter James Kinnaird Taptiklis (born 16 December 1984) is an English actor. He is known for portraying Tobias \"Four\" Eaton in The Divergent Series film trilogy. James starred in the horror films Underworld: Awakening (2012) and Underworld: Blood Wars (2016), the action film How It Ends (2018), and the science fiction film Archive (2020). In television, he appeared in the crime drama series Golden Boy (2012) and the romance series The Time Traveler\'s Wife (2022).', 'UK', 'actors/52d7e2b216655ce160544c0191b6df24.webp', '2024-03-11 01:22:37', '2024-03-11 01:22:37'),
(16, 'Ansel Elgort', 29, 'Ansel Elgort (born March 14, 1994) is an American actor and singer. He began his acting career with a supporting role in the horror film Carrie (2013) and gained wider recognition for starring as a teenage cancer patient in the romantic drama film The Fault in Our Stars (2014) and for his supporting role in The Divergent Series (2014–2016). In 2017, he played the title character in Edgar Wright\'s action thriller Baby Driver, for which he received a Golden Globe Award nomination for Best Actor in a Motion Picture – Musical or Comedy. He is also known for his lead role in The Goldfinch (2019) and his performance in the lead role of Tony in Steven Spielberg\'s 2021 film version of West Side Story.', 'USA', 'actors/f0d7aa9ed6391ebba00113a34430e5cf.webp', '2024-03-11 01:23:01', '2024-03-11 01:23:01'),
(17, 'Cillian Murphy', 47, 'Cillian Murphy (born 25 May 1976) is an Irish actor.  He made his professional debut in Enda Walsh\'s 1996 play Disco Pigs, a role he later reprised in the 2001 screen adaptation. His early notable film credits include the horror film 28 Days Later (2002), the dark comedy Intermission (2003), the thriller Red Eye (2005), the Irish war drama The Wind That Shakes the Barley (2006), and the science fiction thriller Sunshine (2007). He played a transgender Irish woman in the comedy-drama Breakfast on Pluto (2005), which earned him a Golden Globe Award nomination.', 'Ireland', 'actors/47a1ac5f85f80782d1aab781a0048547.webp', '2024-03-11 01:29:14', '2024-03-11 01:29:14'),
(18, 'Robert Downey Jr.', 58, 'Robert John Downey Jr. (born April 4, 1966) is an American actor and producer. His career has been characterized by critical and popular success in his youth, followed by a period of substance abuse and legal troubles, before a resurgence of commercial success later in his career. In 2008, Downey was named by Time magazine among the 100 most influential people in the world, and from 2013 to 2015, he was listed by Forbes as Hollywood\'s highest-paid actor.', 'USA', 'actors/9e8ab5e9ee4d7932510e84312986d2c1.webp', '2024-03-11 01:31:31', '2024-03-11 01:31:31'),
(19, 'Emily Blunt', 41, 'Emily Olivia Laura Blunt (born 23 February 1983) is a British actress. She is the recipient of several accolades, including a Golden Globe Award and a Screen Actors Guild Award, in addition to nominations for three British Academy Film Awards. Forbes ranked her as one of the highest-paid actresses in the world in 2020.', 'UK', 'actors/b85944fa186f57190758d68610584e2e.webp', '2024-03-11 01:31:59', '2024-03-11 01:31:59');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Comedy', '2024-01-21 20:49:23', '2024-01-21 20:49:23'),
(2, 'Drama', '2024-02-05 21:17:19', '2024-02-05 21:17:19'),
(3, 'Crime', '2024-02-05 21:17:51', '2024-02-05 21:17:51'),
(4, 'Action', '2024-03-11 01:24:02', '2024-03-11 01:24:02'),
(5, 'Adventure', '2024-03-11 01:24:10', '2024-03-11 01:24:10'),
(6, 'Romantic', '2024-03-11 01:24:17', '2024-03-11 01:24:17'),
(7, 'Thriller', '2024-03-11 01:24:34', '2024-03-11 01:24:34');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `duration` int(3) UNSIGNED NOT NULL DEFAULT '111',
  `age_limit` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `country` varchar(255) NOT NULL DEFAULT 'a',
  `budget` int(11) NOT NULL DEFAULT '0',
  `preview` varchar(255) DEFAULT NULL,
  `release_date` varchar(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `duration`, `age_limit`, `country`, `budget`, `preview`, `release_date`, `created_at`, `updated_at`) VALUES
(11, 'Titanic ', '101-year-old Rose DeWitt Bukater tells the story of her life aboard the Titanic, 84 years later. A young Rose boards the ship with her mother and fiancé. Meanwhile, Jack Dawson and Fabrizio De Rossi win third-class tickets aboard the ship. Rose tells the whole story from Titanic\'s departure through to its death—on its first and last voyage—on April 15, 1912.', 314, 13, 'US', 200000000, 'movies/f05302dea615408f8f2262fd04030c70.jpg', '1997', '2024-03-11 00:57:53', '2024-03-11 00:57:53'),
(12, 'Insurgent', 'Beatrice Prior must confront her inner demons and continue her fight against a powerful alliance which threatens to tear her society apart.', 139, 13, 'USA', 110000000, 'movies/9c059345865869e201fe80ac12fa4e67.jpg', '2015', '2024-03-11 01:26:14', '2024-03-11 01:26:14'),
(13, 'Baby Driver', 'After being coerced into working for a crime boss, a young getaway driver finds himself taking part in a heist doomed to fail.', 153, 0, 'USA', 34000000, 'movies/7c92e784cbee7d27bb39459b4d899e4a.jpg', '2017', '2024-03-11 01:27:46', '2024-03-11 01:27:46'),
(14, 'Inception', 'Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person\'s idea into a target\'s subconscious.', 228, 13, 'USA', 160000000, 'movies/98beefabdc5bc5b9790834ddc931b21d.jpg', '2010', '2024-03-11 01:30:16', '2024-03-11 01:30:16'),
(15, 'Oppenheimer ', 'The story of J. Robert Oppenheimer\'s role in the development of the atomic bomb during World War II.', 301, 0, 'USA', 100000000, 'movies/d1ef82152c078ee452bb14690260a885.jpg', '2023', '2024-03-11 01:33:01', '2024-03-11 01:33:01'),
(16, 'Iron Man', 'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.', 206, 13, 'USA', 140000000, 'movies/1068f64cb39309de9097f0f3f4a2c8e3.jpg', '2008', '2024-03-11 01:34:27', '2024-03-11 01:34:27');

-- --------------------------------------------------------

--
-- Структура таблицы `movies_actors`
--

CREATE TABLE `movies_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movies_actors`
--

INSERT INTO `movies_actors` (`movie_id`, `actor_id`) VALUES
(11, 2),
(11, 13),
(11, 14),
(12, 13),
(12, 15),
(12, 16),
(13, 16),
(14, 2),
(14, 17),
(15, 17),
(15, 18),
(15, 19),
(16, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `movies_categories`
--

CREATE TABLE `movies_categories` (
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movies_categories`
--

INSERT INTO `movies_categories` (`movie_id`, `category_id`) VALUES
(11, 2),
(12, 4),
(12, 5),
(12, 7),
(13, 3),
(13, 4),
(14, 4),
(15, 2),
(16, 4),
(16, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `movie_id` int(11) UNSIGNED DEFAULT NULL,
  `review` mediumtext,
  `rating` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'aaa@gmail.com', '$2y$10$EMKn6Oy8QwaqJFY9sf43xeFQ16.4VhNgLKK3G0qqbi03kK6S6i7MG', 1, '2024-01-21 20:48:28', '2024-01-21 20:48:28'),
(2, 'Alex', 'alex@gmail.com', '$2y$10$pB5PXV/XLEVCBQ4V0YLhPOmGK4XoxezEwUyjFZjVRSSud/1NJdm1e', 0, '2024-02-16 23:12:17', '2024-02-16 23:12:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users_movies`
--

CREATE TABLE `users_movies` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_movies`
--

INSERT INTO `users_movies` (`movie_id`, `user_id`, `data`) VALUES
(15, 1, '1100'),
(16, 1, '1100');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD PRIMARY KEY (`movie_id`,`actor_id`);

--
-- Индексы таблицы `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD PRIMARY KEY (`movie_id`,`category_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_movies`
--
ALTER TABLE `users_movies`
  ADD PRIMARY KEY (`movie_id`,`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
