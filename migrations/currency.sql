CREATE TABLE IF NOT EXISTS `currencies` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `symbol` varchar(10) DEFAULT NULL,
    `currency` varchar(3) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

-- https://www.html-code-generator.com/mysql/country-name-table

INSERT INTO `countries` (`id`, `symbol`, `currency`) VALUES
(1, '$', 'USD')