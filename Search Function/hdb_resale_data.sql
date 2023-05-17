CREATE TABLE `hdb_resale_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(225) NOT NULL,
  `town` varchar(255) NOT NULL,
  `flat_type` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `storey_range` varchar(255) NOT NULL,
  `floor_area_sqm` float NOT NULL,
  `lease_commencement_date` year NOT NULL,
  `resale_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
