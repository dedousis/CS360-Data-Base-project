-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 23 Ιαν 2017 στις 17:13:04
-- Έκδοση διακομιστή: 10.1.9-MariaDB
-- Έκδοση PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `ccc`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `company`
--

CREATE TABLE `company` (
  `Company_num` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Expiration_Date` date NOT NULL,
  `Balance` double NOT NULL,
  `Debit` double NOT NULL,
  `Credit_Limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `company`
--

INSERT INTO `company` (`Company_num`, `Name`, `Expiration_Date`, `Balance`, `Debit`, `Credit_Limit`) VALUES
(1234, 'Galaxy Hotels', '2017-09-21', 150000, 0, 50000),
(2368, 'ABC Channel', '2018-09-21', 300000, 0, 100000),
(2847, 'Travel Tours', '2018-02-23', 90000, 3000, 40000),
(3256, 'Meribel Oils', '2017-09-16', 49000, 0, 20000);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `consumer`
--

CREATE TABLE `consumer` (
  `Consumer_num` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Expiration_Date` date NOT NULL,
  `Balance` double NOT NULL,
  `Debit` double NOT NULL,
  `Credit_Limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `consumer`
--

INSERT INTO `consumer` (`Consumer_num`, `Name`, `Expiration_Date`, `Balance`, `Debit`, `Credit_Limit`) VALUES
(12, 'Maria', '2027-01-15', 1000, 4950, 500),
(1564, 'Tom', '2027-01-15', 10261, 150, 500),
(2345, 'makis', '2027-01-15', 2000, 50, 500),
(7890, 'ermis', '2027-01-15', 2000, 200, 500),
(56789, 'Lagertha', '2027-01-15', 2000, 0, 500),
(123456789, 'floki', '2027-01-15', 2000, 20, 500);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Company_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Company_num`) VALUES
(1649, 'George', 12),
(2487, 'Harry', 2847),
(3748, 'Nick', 2847),
(4555, 'Donald', 1234),
(5687, 'Marry', 3256),
(6589, 'John', 2368);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `merchant`
--

CREATE TABLE `merchant` (
  `Merchant_num` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Debit` double NOT NULL,
  `Total_Profit` double NOT NULL,
  `Share` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `merchant`
--

INSERT INTO `merchant` (`Merchant_num`, `Name`, `Debit`, `Total_Profit`, `Share`) VALUES
(901, 'Aegean', 430.5, 4804, 0.5),
(1994, 'Gid Fruits', 2, 2500, 0.5),
(12345, 'Aluminia O makis', 483.55, 11000, 0.5),
(67890, 'Tesla Motors', 15, 2030, 0.5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `transaction`
--

CREATE TABLE `transaction` (
  `Trans_id` int(200) NOT NULL,
  `Client_name` varchar(20) DEFAULT NULL,
  `Merchant_name` varchar(20) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Type` enum('Credit','Debit') NOT NULL,
  `Merchant_num` int(11) DEFAULT NULL,
  `Consumer_num` int(11) DEFAULT NULL,
  `Company_num` int(11) DEFAULT NULL,
  `Employee_ID` int(11) DEFAULT NULL,
  `Company_name` varchar(20) DEFAULT NULL,
  `Returned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `transaction`
--

INSERT INTO `transaction` (`Trans_id`, `Client_name`, `Merchant_name`, `Amount`, `Date`, `Type`, `Merchant_num`, `Consumer_num`, `Company_num`, `Employee_ID`, `Company_name`, `Returned`) VALUES
(171, 'anna', 'Aluminia O makis', 200, '2017-01-23', 'Debit', 12345, 1200, NULL, NULL, NULL, 1),
(203, 'Tom', 'Aegean', 200, '2017-01-23', 'Credit', 901, 1564, NULL, NULL, NULL, 1),
(232, 'Maria', 'Aegean', 120, '2017-01-23', 'Credit', 901, 12, NULL, NULL, NULL, 0),
(265, 'anna', 'Aluminia O makis', -1, '2017-01-23', 'Debit', 12345, 1200, NULL, NULL, NULL, 0),
(305, 'Tom', 'Aegean', 200, '2017-01-23', 'Credit', 901, 1564, NULL, NULL, NULL, 1),
(897, 'Tom', 'Aegean', -1, '2017-01-23', 'Debit', 901, 1564, NULL, NULL, NULL, 0),
(1665, 'Tom', 'Aegean', -1, '2017-01-23', 'Credit', 901, 1564, NULL, NULL, NULL, 0),
(1795, 'Maria', 'Tesla Motors', 30, '2017-01-23', 'Debit', 67890, 12, NULL, NULL, NULL, 0),
(1961, 'Tom', 'Aegean', -1, '2017-01-23', 'Credit', 901, 1564, NULL, NULL, NULL, 0),
(2211, NULL, 'Tesla Motors', -1, '2017-01-18', 'Debit', 49273, NULL, 12, 1649, 'Apple', 0),
(2304, 'xristoforos', 'Tesla Motors', 1000, '2017-01-18', 'Debit', 49273, 1, NULL, NULL, NULL, 1),
(2334, NULL, 'Gid Fruits', -1, '2017-01-23', 'Debit', 1994, NULL, 12, 1649, 'Apple', 0),
(2977, 'xristoforos', 'Tesla Motors', -1, '2017-01-18', 'Debit', 49273, 1, NULL, NULL, NULL, 0),
(3127, NULL, 'Gid Fruits', 19, '2017-01-23', 'Debit', 1994, NULL, 12, 1649, 'Apple', 1),
(3686, 'Tom', 'Aegean', -1, '2017-01-23', 'Debit', 901, 1564, NULL, NULL, NULL, 0),
(4118, 'Tom', 'Aegean', 111, '2017-01-23', 'Debit', 901, 1564, NULL, NULL, NULL, 1),
(4749, NULL, 'Aluminia O makis', 1000, '2017-01-23', 'Debit', 12345, NULL, 3256, 5687, 'Meribel Oils', 0),
(4760, NULL, 'Tesla Motors', 1000, '2017-01-18', 'Debit', 49273, NULL, 12, 16, 'Apple', 0);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Company_num`);

--
-- Ευρετήρια για πίνακα `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`Consumer_num`);

--
-- Ευρετήρια για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`Merchant_num`);

--
-- Ευρετήρια για πίνακα `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Trans_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
