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

		public static function insertRecord($id,$path)
		{
			return QueryList::insertRecord($id,$path);
		}

		public static function updateRecord($id,$path)
		{
			return QueryList::updateRecord($id,$path);
		}

		public static function getFileName($id)
		{
			return QueryList::getFilename($id);
		}

	}
?>
