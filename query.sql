ALTER TABLE `company_info` ADD `cheques_payable` VARCHAR(255) NULL DEFAULT NULL AFTER `account_no`;






ALTER TABLE `booking` ADD `invoice_descriptio` TEXT NULL DEFAULT NULL AFTER `late_booking_reason`;




ALTER TABLE `booking` ADD `price_with_vat` DOUBLE(10,2) NOT NULL DEFAULT '0.00' AFTER `invoice_price`, ADD `price_without_vat` DOUBLE(10,2) NOT NULL DEFAULT '0.00' AFTER `price_with_vat`;



ALTER TABLE `booking` ADD `advance_payment_amount` DOUBLE(10,2) NOT NULL AFTER `invoice_descriptio`;






ALTER TABLE `booking` CHANGE `trip_status` `trip_status` INT(11) NULL DEFAULT '0' COMMENT '1=>Start, 2=>Complete,3=>Breakdown, 4=>Cancel';
