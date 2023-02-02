-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2022 г., 10:18
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taxi2`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `AboutInfo` (IN `uLogin` VARCHAR(45))  BEGIN
SELECT * FROM `user` WHERE login = uLogin;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `CarTrip` (IN `uID` INT, IN `cID` INT)  SELECT c.name, u.name, c.image, cu.increase
FROM `car_user` cu
LEFT join car c on c.ID = cu.car_id
LEFT JOIN user u on u.ID =  cu.user_id
WHERE cu.user_id = uID AND cu.car_id = cID$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `GetUser` (IN `uID` INT)  BEGIN
SELECT * FROM user WHERE user.ID = uID;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `GetUsers` ()  BEGIN
	SELECT * FROM user;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `a`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `a` (
`ID` int
,`reg_number` varchar(10)
,`mechanic_id` int
,`car_class_id` int
,`car_brand_id` int
,`car_type_id` int
,`vin_number` varchar(20)
,`name` varchar(45)
);

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `ID` int NOT NULL,
  `reg_number` varchar(10) NOT NULL,
  `mechanic_id` int DEFAULT NULL,
  `car_class_id` int NOT NULL,
  `car_brand_id` int NOT NULL,
  `car_type_id` int NOT NULL,
  `vin_number` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`ID`, `reg_number`, `mechanic_id`, `car_class_id`, `car_brand_id`, `car_type_id`, `vin_number`, `name`, `image`) VALUES
(1, 'с666ех', 4, 1, 1, 5, '4Y1SL65848Z411439', 'S 350 d 4MATIC Premium белый Седан АКПП', '../pics/benz-s-350.jpeg'),
(2, 'к692ео', NULL, 4, 3, 1, '4Y1SL65848Z461439', 'Granta', '../pics/lada.png'),
(3, 'к692аа', 4, 2, 1, 4, '4Y1SL65848Z411438', 'Arocs', '../pics/arocs.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `car_brand`
--

CREATE TABLE `car_brand` (
  `ID` int NOT NULL,
  `brand` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `car_brand`
--

INSERT INTO `car_brand` (`ID`, `brand`) VALUES
(2, 'Audi'),
(4, 'Hyundai Motor'),
(3, 'Lada'),
(1, 'Mercedes-Benz'),
(5, 'Mitsubishi Motors');

-- --------------------------------------------------------

--
-- Структура таблицы `car_class`
--

CREATE TABLE `car_class` (
  `ID` int NOT NULL,
  `class` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `car_class`
--

INSERT INTO `car_class` (`ID`, `class`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Структура таблицы `car_type`
--

CREATE TABLE `car_type` (
  `ID` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `capacity` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `car_type`
--

INSERT INTO `car_type` (`ID`, `type`, `capacity`) VALUES
(1, 'Легковой', '4 человека'),
(4, 'Грузовой', '20 куб.м'),
(5, 'Бизнес-класс', '4 человека');

-- --------------------------------------------------------

--
-- Структура таблицы `car_user`
--

CREATE TABLE `car_user` (
  `ID` int NOT NULL,
  `increase` decimal(5,2) NOT NULL,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `car_user`
--

INSERT INTO `car_user` (`ID`, `increase`, `user_id`, `car_id`) VALUES
(1, '500.00', 5, 1),
(2, '120.00', 2, 2),
(3, '650.00', 2, 3),
(4, '650.00', 5, 3);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `drivers_with_id`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `drivers_with_id` (
`type` varchar(45)
,`name` varchar(30)
,`surname` varchar(45)
,`patronymic` varchar(45)
,`login` varchar(45)
,`password` varchar(45)
,`ID` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `driver_rating`
--

CREATE TABLE `driver_rating` (
  `ID` int NOT NULL,
  `rating` int NOT NULL,
  `trip_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `ID` int NOT NULL,
  `med_book` varchar(12) DEFAULT NULL,
  `user_id` int NOT NULL,
  `employee_type_id` int NOT NULL,
  `SNILS` varchar(15) NOT NULL,
  `passport_id` varchar(12) NOT NULL,
  `salary` decimal(7,2) NOT NULL,
  `drive_licence` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`ID`, `med_book`, `user_id`, `employee_type_id`, `SNILS`, `passport_id`, `salary`, `drive_licence`) VALUES
(3, '24657299', 5, 2, '488935470789', '9415550011', '37000.77', '89213463619'),
(19, '24657299', 2, 2, '488935470737', '9415550019', '30000.00', '89213463619'),
(20, NULL, 4, 4, '488935470737', '9415550011', '35000.00', NULL),
(26, '75934693', 58, 2, '7563843', '8674585', '56000.00', '2980367');

-- --------------------------------------------------------

--
-- Структура таблицы `employee_type`
--

CREATE TABLE `employee_type` (
  `ID` int NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `employee_type`
--

INSERT INTO `employee_type` (`ID`, `type`) VALUES
(3, 'admin'),
(2, 'driver'),
(4, 'mechanic'),
(1, 'user');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `get_drivers`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `get_drivers` (
`type` varchar(45)
,`name` varchar(30)
,`surname` varchar(45)
,`patronymic` varchar(45)
,`login` varchar(45)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `id`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `id` (
`ID` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `trip`
--

CREATE TABLE `trip` (
  `ID` int NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int NOT NULL,
  `car_user_id` int NOT NULL,
  `road_time` datetime NOT NULL,
  `dispatch_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `trip`
--

INSERT INTO `trip` (`ID`, `date`, `user_id`, `car_user_id`, `road_time`, `dispatch_address`, `payment`) VALUES
(3, '2022-06-03 00:00:00', 3, 2, '2022-06-06 00:00:00', 'харченко 16', '479.88'),
(4, '2022-05-31 00:00:00', 3, 1, '2022-06-02 00:00:00', 'москва, красная площадь', '1333.00'),
(6, '2022-06-03 00:00:00', 3, 3, '2022-06-11 00:00:00', 'to', '6931.60'),
(18, '2022-06-24 00:00:00', 3, 1, '2022-07-01 00:00:00', 'харченко 16 spb', '4665.50'),
(19, '2022-05-29 00:00:00', 3, 2, '2022-06-03 00:00:00', 'Пушкинская 145', '799.80');

-- --------------------------------------------------------

--
-- Структура таблицы `trip_archive`
--

CREATE TABLE `trip_archive` (
  `ID` int NOT NULL,
  `actual` bit(1) NOT NULL,
  `trip_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `trip_archive`
--

INSERT INTO `trip_archive` (`ID`, `actual`, `trip_id`) VALUES
(1, b'0', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `ID` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `employee_id` int DEFAULT NULL,
  `employee_type_id` int DEFAULT NULL,
  `surname` varchar(45) NOT NULL,
  `patronymic` varchar(45) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID`, `name`, `employee_id`, `employee_type_id`, `surname`, `patronymic`, `phone_number`, `login`, `password`) VALUES
(2, 'Анатолий', 26, 2, 'Карпов', 'Мухтарович', '88005553535', 'karpp', '434343'),
(3, 'Админ', 26, 3, 'админ', NULL, '88005553536', 'admin', '777'),
(4, 'Михаил', 26, 4, 'Соловьёв', NULL, '88005553537', 'mixa_cool', 'nemixa'),
(5, 'deus', 26, 2, 'rider', NULL, '89608437774', 'deusrider', 'samepass'),
(20, '35y4', 26, 4, 'g4', '45h4', 'h4h54', 'g45', '45h'),
(58, 'Ренат', 26, 2, 'Зарубин', 'Самсонович', '88005553535', 'renzaR', 'rzr');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `users`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `users` (
`ID` int
,`name` varchar(30)
,`employee_id` int
,`employee_type_id` int
,`surname` varchar(45)
,`patronymic` varchar(45)
,`phone_number` varchar(15)
,`login` varchar(45)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `user_drivers`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `user_drivers` (
`ID` int
,`name` varchar(30)
,`employee_id` int
,`employee_type_id` int
,`surname` varchar(45)
,`patronymic` varchar(45)
,`phone_number` varchar(15)
,`login` varchar(45)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Структура для представления `a`
--
DROP TABLE IF EXISTS `a`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `a`  AS SELECT `car`.`ID` AS `ID`, `car`.`reg_number` AS `reg_number`, `car`.`mechanic_id` AS `mechanic_id`, `car`.`car_class_id` AS `car_class_id`, `car`.`car_brand_id` AS `car_brand_id`, `car`.`car_type_id` AS `car_type_id`, `car`.`vin_number` AS `vin_number`, `car`.`name` AS `name` FROM `car` ;

-- --------------------------------------------------------

--
-- Структура для представления `drivers_with_id`
--
DROP TABLE IF EXISTS `drivers_with_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `drivers_with_id`  AS SELECT `et`.`type` AS `type`, `u`.`name` AS `name`, `u`.`surname` AS `surname`, `u`.`patronymic` AS `patronymic`, `u`.`login` AS `login`, `u`.`password` AS `password`, `u`.`ID` AS `ID` FROM ((`employee` `e` left join `employee_type` `et` on((`e`.`employee_type_id` = `et`.`ID`))) left join `user` `u` on((`e`.`user_id` = `u`.`ID`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `get_drivers`
--
DROP TABLE IF EXISTS `get_drivers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `get_drivers`  AS SELECT `et`.`type` AS `type`, `u`.`name` AS `name`, `u`.`surname` AS `surname`, `u`.`patronymic` AS `patronymic`, `u`.`login` AS `login`, `u`.`password` AS `password` FROM ((`user` `u` join `employee` `e` on((`e`.`user_id` = `u`.`ID`))) join `employee_type` `et` on((`et`.`ID` = `u`.`employee_type_id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `id`
--
DROP TABLE IF EXISTS `id`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `id`  AS SELECT `user`.`ID` AS `ID` FROM `user` ;

-- --------------------------------------------------------

--
-- Структура для представления `users`
--
DROP TABLE IF EXISTS `users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `users`  AS SELECT `user`.`ID` AS `ID`, `user`.`name` AS `name`, `user`.`employee_id` AS `employee_id`, `user`.`employee_type_id` AS `employee_type_id`, `user`.`surname` AS `surname`, `user`.`patronymic` AS `patronymic`, `user`.`phone_number` AS `phone_number`, `user`.`login` AS `login`, `user`.`password` AS `password` FROM `user` ;

-- --------------------------------------------------------

--
-- Структура для представления `user_drivers`
--
DROP TABLE IF EXISTS `user_drivers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `user_drivers`  AS SELECT `user`.`ID` AS `ID`, `user`.`name` AS `name`, `user`.`employee_id` AS `employee_id`, `user`.`employee_type_id` AS `employee_type_id`, `user`.`surname` AS `surname`, `user`.`patronymic` AS `patronymic`, `user`.`phone_number` AS `phone_number`, `user`.`login` AS `login`, `user`.`password` AS `password` FROM `user` WHERE (`user`.`employee_type_id` = 2) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `reg_number` (`reg_number`,`vin_number`),
  ADD KEY `FK_100` (`mechanic_id`),
  ADD KEY `FK_59` (`car_type_id`),
  ADD KEY `FK_62` (`car_brand_id`),
  ADD KEY `FK_65` (`car_class_id`);

--
-- Индексы таблицы `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `brand` (`brand`);

--
-- Индексы таблицы `car_class`
--
ALTER TABLE `car_class`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `class` (`class`);

--
-- Индексы таблицы `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Индексы таблицы `car_user`
--
ALTER TABLE `car_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_id` (`user_id`,`car_id`),
  ADD KEY `FK_72` (`car_id`),
  ADD KEY `FK_75` (`user_id`);

--
-- Индексы таблицы `driver_rating`
--
ALTER TABLE `driver_rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_107` (`user_id`),
  ADD KEY `FK_110` (`trip_id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `med_book` (`med_book`,`SNILS`,`passport_id`,`drive_licence`),
  ADD KEY `FK_28` (`employee_type_id`),
  ADD KEY `FK_31` (`user_id`);

--
-- Индексы таблицы `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Индексы таблицы `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_87` (`car_user_id`),
  ADD KEY `FK_90` (`user_id`);

--
-- Индексы таблицы `trip_archive`
--
ALTER TABLE `trip_archive`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_97` (`trip_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `phone_number` (`login`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `FK_34` (`employee_type_id`),
  ADD KEY `FKK_1` (`employee_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `car_class`
--
ALTER TABLE `car_class`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `car_type`
--
ALTER TABLE `car_type`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `car_user`
--
ALTER TABLE `car_user`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `driver_rating`
--
ALTER TABLE `driver_rating`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trip`
--
ALTER TABLE `trip`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `trip_archive`
--
ALTER TABLE `trip_archive`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_57` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`ID`),
  ADD CONSTRAINT `FK_60` FOREIGN KEY (`car_brand_id`) REFERENCES `car_brand` (`ID`),
  ADD CONSTRAINT `FK_63` FOREIGN KEY (`car_class_id`) REFERENCES `car_class` (`ID`),
  ADD CONSTRAINT `FK_98` FOREIGN KEY (`mechanic_id`) REFERENCES `user` (`ID`);

--
-- Ограничения внешнего ключа таблицы `car_user`
--
ALTER TABLE `car_user`
  ADD CONSTRAINT `FK_70` FOREIGN KEY (`car_id`) REFERENCES `car` (`ID`),
  ADD CONSTRAINT `FK_73` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Ограничения внешнего ключа таблицы `driver_rating`
--
ALTER TABLE `driver_rating`
  ADD CONSTRAINT `FK_105` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FK_108` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`ID`);

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_26` FOREIGN KEY (`employee_type_id`) REFERENCES `employee_type` (`ID`),
  ADD CONSTRAINT `FK_29` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Ограничения внешнего ключа таблицы `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `FK_85` FOREIGN KEY (`car_user_id`) REFERENCES `car_user` (`ID`),
  ADD CONSTRAINT `FK_88` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Ограничения внешнего ключа таблицы `trip_archive`
--
ALTER TABLE `trip_archive`
  ADD CONSTRAINT `FK_95` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`ID`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_32` FOREIGN KEY (`employee_type_id`) REFERENCES `employee_type` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
