<?php

	include 'queries.php';

	class Controller
	{
		public static function createTable()
		{
			return QueryList::createTable();
		}

		public static function dropTable()
		{
			return QueryList::dropTable();
		}

		public static function checkExisting($id)
		{
			return QueryList::checkExisting($id);;
		}

		public static function getFileName($id)
		{
			return QueryList::getFilename($id);
		}

		public static function getTableInformation()
		{
			return QueryList::getTableInformation();
		}

		public static function deleteRow($id)
		{
			return QueryList::deleteRow($id);
		}

		public static function getCategoryIds()
		{	
			return QueryList::getCategoryIds();	
		}
	}
?>
