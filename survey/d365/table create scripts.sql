LOAD DATA INFILE 'C:/Users/User/Documents/ms901.csv' 
INTO TABLE poll_qst
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;



CREATE TABLE `poll_answer365` (
  `ans_id` int(6) NOT NULL,
  `dt_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `exam_no` varchar(100) NOT NULL,
  `qst_id` int(6) NOT NULL,
  `opt` varchar(50) NOT NULL,
  `correct` varchar(50) NOT NULL,
  `mark` int(1) NOT NULL
  
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


MODIFY dt_created datetime DEFAULT CURRENT_TIMESTAMP

--
ALTER TABLE `poll_answer365`
  ADD PRIMARY KEY (`ans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll_answer365`
--
ALTER TABLE `poll_answer365`
  MODIFY `ans_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;