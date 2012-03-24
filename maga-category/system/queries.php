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

		public static function insertRecord($id,$path)
		{
			return "INSERT INTO wp_image_category (Category_Id,Image_Path) VALUES (".$id.",'".$path."');";
		}
		public static function updateRecord($id,$path)
		{
			return "UPDATE wp_image_category set Image_Path = '".$path."' WHERE Category_ID = ".$id.";";
		}

		public static function getFilename($id)
		{
			return "SELECT Image_Path FROM wp_image_category WHERE Category_ID = ".$id;
		}
	}
?>
