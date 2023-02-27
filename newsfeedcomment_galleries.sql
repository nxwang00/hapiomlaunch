CREATE TABLE `newsfeedcomment_galleries` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsfeedcomment_galleries`
--
ALTER TABLE `newsfeedcomment_galleries`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comment_id` (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsfeedcomment_galleries`
--
ALTER TABLE `newsfeedcomment_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
