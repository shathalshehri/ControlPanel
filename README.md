# Control Panel
1. Create local SQL Server database (I used MAMP)

2. Create a table 

```sql
 -- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 13, 2022 at 07:44 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IOT`
--

-- --------------------------------------------------------

--
-- Table structure for table `remote`
--

CREATE TABLE `remote` (
  `forward` varchar(7) NOT NULL,
  `left` varchar(4) NOT NULL,
  `stop` varchar(4) NOT NULL,
  `right` varchar(5) NOT NULL,
  `backward` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

3. Design an interface for a control panel page using HTML/CSS to control the robot movements (Forward, Backward, Left, Right,Stop).
1.Conecting the control panel page with a database, so when you click Forward it will insert to the database the letter (F) and it will read the letter that have been inserted to the database and when you click Left it will insert and read to/from the databse (L) and so on...

