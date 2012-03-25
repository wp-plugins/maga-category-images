<?php

	class QueryList
	{
		 public static function createTable()
		 {
			 $sql = "CREATE TABLE IF NOT EXISTS `wp_image_category`(
 				`ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 				`Category_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
 				`Image_Path` varchar(500) NOT NULL DEFAULT '',
  				PRIMARY KEY (`ID`)
				) ENGINE=MyISAM AUTO_INCREMENT= 1 DEFAULT CHARSET= utf8;";
			  return $sql;
		 }

		public static function dropTable()
		{
			return "DROP TABLE IF EXISTS wp_image_category;";
		}


		public static function checkExisting($id)
		{
			return "SELECT COUNT(*) FROM wp_image_category WHERE Category_ID = ".$id;
		}

		public static function getFilename($id)
		{
			return "SELECT Image_Path FROM wp_image_category WHERE Category_ID = ".$id;
		}

		public static function getCategoryIds()
		{
			return "SELECT Category_ID from wp_image_category;";
		}

		public static function getTableInformation()
		{
			return "SELECT name, Image_Path, Category_ID FROM wp_terms, wp_image_category WHERE wp_terms.term_id = wp_image_category.Category_ID ORDER BY Category_ID;";
		}

		public static function deleteRow($id)
		{
			return "DELETE FROM wp_image_category WHERE Category_ID = ".$id.";";
		}

	}
?>
