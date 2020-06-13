# ClientServiceControl
A php app to manage user serivces.
Here you can see the .sql script 
CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `company_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`) VALUES
(1, 'Parallel Devs', ' 400m Sur de la POPs de Curridabat., Frente a AMPM. Portón Blanco, Casa blanca., San José, Curridabat'),
(2, 'Parallel Devs', '400m Sur de la POPs de Curridabat., Frente a AMPM. Portón Blanco, Casa blanca., San José, Curridabat'),
(3, 'Parallel Devs', '400m Sur de la POPs de Curridabat., Frente a AMPM. Portón Blanco, Casa blanca., San José, Curridabat'),
(4, 'Empresa Admin', 'Cartago'),
(5, 'Parallel Devs', 'Curriadabat ');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `expire_date`, `service_type_id`, `description`) VALUES
(1, '2020-06-20', 1, 'Hosting  de la empresa aaaa'),
(2, '2020-06-15', 4, 'Dominio  www.aaa.com para la empresa aaa.'),
(5, '2020-06-16', 2, 'servicio de correos para la empresa aaa'),
(6, '2020-06-23', 3, 'Mantenimiento para la empresa aaa'),
(7, '2020-06-10', 1, 'Hosting de la empresa bbb');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `service_type_id` int(11) NOT NULL,
  `type_of_service` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`service_type_id`, `type_of_service`) VALUES
(1, 'Hosting'),
(2, 'Correo'),
(3, 'Mantenimiento'),
(4, 'Dominio');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(45) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_last_name` varchar(45) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_password`, `user_name`, `user_last_name`, `rol_id`, `company_id`) VALUES
(1, 'ajosue19@gmail.com', '$2y$10$YtYd0baDWYReHdmE8U4aSOCluH..otzERv1YuWVtZIg7zZ4h1EZj6', 'Allan', 'Solano Salazar', 1, 1),
(2, 'marcosoto@gmail.com', '$2y$10$xqj7KVtJPYnE4MKZ5xNBaOfPWjGj1KKlMd6.CeWB4502wOU7rLHsm', 'Marco', 'Soto Sibaja', 2, 1),
(3, 'sofia@gmail.com', '$2y$10$2wu0wY3dKSOu6QF9FyndP.vX2Ql7qP2q454y7TffBmXpfsYcCzx0S', 'Sofia', 'Salazar Marin', 1, 1),
(4, 'julimena@gmail.com', '$2y$10$cVR2LHFIPeld5lXv5TjXRu5vhsSGATbqVBF6zhTvoS1BtBF/2C1/S', 'Julian', 'Mena', 1, 1),
(5, 'julimena@gmail.com', '$2y$10$s2lQMJD/iJ8GD.AXNMwt1O9E1Nqmab0fpTWCyFyiel0bxCcYMK3Fi', 'Julian', 'Mena', 2, 1),
(6, 'adriana@gmail.com', '$2y$10$rCBdZ/vy1mIQxWtgyrdvKOAWtYaozZ28./BcXCErl0yNfF/h35mtu', 'Adriana', 'Salazar Marin', 1, 2),
(7, 'jasorez@gmail.com', '$2y$10$RaiEI8gIT2alZqez1lDvROVLR1nHCnyGcF9CG2rtFu7f3jDjzNp6S', 'Juan', 'Solano Ramirez', 2, 3),
(9, 'admin', '$2y$10$EOORSyzKCN/XmRwZZGeZFOUF.eXUWnYcEmIRoYC8rAEvcCRLaHrYO', 'Allan Josue', 'Solano Salazar', 3, 4),
(10, 'hernansolano@gmail.com', '$2y$10$P2VgF.YwT5l9bo1nraAanen3iHVWk0rF8FK5qeNl0PUz74.k/qkbK', 'Hernan ', 'Solano', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `rol_id` int(11) NOT NULL,
  `rol_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`rol_id`, `rol_name`) VALUES
(1, 'Company Owner'),
(2, 'Company Admin'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `user_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`user_id`, `service_id`) VALUES
(1, 6),
(2, 5),
(1, 2),
(6, 1),
(7, 6),
(3, 2),
(4, 1),
(5, 6),
(2, 7),
(1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `fk_service_service_type` (`service_type_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`service_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_rol` (`rol_id`),
  ADD KEY `fk_user_company` (`company_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_service` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `service_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`service_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `user_role` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_service`
--
ALTER TABLE `user_service`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
