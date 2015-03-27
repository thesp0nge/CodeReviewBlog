<?php

class CMySQL {

	// variables
	var $sDbName;
	var $sDbUser;
	var $sDbPass;

	var $vLink;

	// constructor
	function CMySQL($db, $user, $pass) {
		$this->sDbName = $db;
		$this->sDbUser = $user;
		$this->sDbPass = $pass;

		// create db link
		$this->vLink = mysql_connect("localhost", $this->sDbUser, $this->sDbPass);

		//select the database
		mysql_select_db($this->sDbName, $this->vLink);
		mysql_query("SET names UTF8");
	}

	// return one value result
	function getOne($query, $index = 0) {
		if (! $query)
			return false;
		$res = mysql_query($query);
		$arr_res = array();
		if ($res && mysql_num_rows($res))
			$arr_res = mysql_fetch_array($res);
		if (count($arr_res))
			return $arr_res[$index];
		else
			return false;
	}

	// executing sql
	function res($query, $error_checking = true) {
		if(!$query)
			return false;
		$res = mysql_query($query, $this->vLink);
		if (!$res)
			$this->error('Database query error', false, $query);
		return $res;
	}

	// return table of records as result
	function getAll($query, $arr_type = MYSQL_ASSOC) {
		if (! $query)
			return array();

		if ($arr_type != MYSQL_ASSOC && $arr_type != MYSQL_NUM && $arr_type != MYSQL_BOTH)
			$arr_type = MYSQL_ASSOC;

		$res = $this->res($query);
		$arr_res = array();
		if ($res) {
			while ($row = mysql_fetch_array($res, $arr_type))
				$arr_res[] = $row;
			mysql_free_result($res);
		}
		return $arr_res;
	}

	// return one row result
	function getRow($query, $arr_type = MYSQL_ASSOC) {
		if(!$query)
			return array();
		if($arr_type != MYSQL_ASSOC && $arr_type != MYSQL_NUM && $arr_type != MYSQL_BOTH)
			$arr_type = MYSQL_ASSOC;
		$res = $this->res ($query);
		$arr_res = array();
		if($res && mysql_num_rows($res)) {
			$arr_res = mysql_fetch_array($res, $arr_type);
			mysql_free_result($res);
		}
		return $arr_res;
	}

	// escape
	function escape($s) {
		return mysql_real_escape_string($s);
	}

	// get last id
	function lastId() {
		return mysql_insert_id($this->vLink);
	}

	// display errors
	function error($text, $isForceErrorChecking = false, $sSqlQuery = '') {
		echo $text; exit;
	}
}

// Use the db connection from ../config.php
require_once( __DIR__ . "/../config.php" );
$GLOBALS['MySQL'] = new CMySQL($dbdatabase,$dbuser,$dbpassword);

?>
