CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(101, 'Bike', 1),
(103, 'Car', 1),
(104, 'Fruits', 1),
(105, 'Vegetables', 1),
(108, 'Motors', 1),
(109, 'Bike', 1);

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_total_price` double(8,2) NOT NULL,
  `product_order_qty` int(5) NOT NULL,
  `order_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`order_id`, `product_id`, `order_date`, `order_total_price`, `product_order_qty`, `order_status`) VALUES
(16, 218, '2021-01-26 15:29:07', 52.50, 5, 1),
(17, 217, '2021-01-26 15:29:46', 250.00, 10, 1),
(18, 219, '2021-01-26 17:00:58', 25.00, 5, 1),
(19, 220, '2022-01-19 06:41:58', 1.50, 1, 1),
(20, 218, '2022-01-26 09:15:02', 105.00, 10, 1);

CREATE TABLE `product` (
  `product_image` varchar(100) NOT NULL,
  `product_id` int(12) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(15) NOT NULL,
  `product_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`product_image`, `product_id`, `product_name`, `product_price`, `product_qty`, `product_status`) VALUES
('183154224260102ee840a24.png', 217, 'Apple', 25.00, 40, 1),
('156135219460102f7e00941.png', 218, 'Cucumber', 10.50, 85, 1),
('1325332831601035ae4e573.png', 219, 'Lemon', 5.00, 95, 1),
('974482858601035ea2f6e5.png', 220, 'Chili', 1.50, 999, 1),
('905045626601049c2686d8.png', 221, 'Orange', 20.50, 50, 1),
('1735525725625a686e2ee31.jpg', 222, 'RAM', 10.00, 1, 2);

CREATE TABLE `sales_manager` (
  `salesman_id` varchar(15) NOT NULL,
  `salesman_pass` varchar(150) NOT NULL,
  `salesman_name` varchar(50) NOT NULL,
  `salesman_contact` varchar(14) NOT NULL,
  `salesman_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sales_manager` (`salesman_id`, `salesman_pass`, `salesman_name`, `salesman_contact`, `salesman_email`) VALUES
('atik', '827ccb0eea8a706c4c34a16891f84e7b', 'Md. Atikul Haider', '01700000600', 'mpatowary183096@bscse.uiu.ac.bd'),
('jahid', '827ccb0eea8a706c4c34a16891f84e7b', 'Md. Jahidul Islam', '01700000600', 'mislam152212@bscse.uiu.ac.bd');

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `proID_FK` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD PRIMARY KEY (`salesman_id`);

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
