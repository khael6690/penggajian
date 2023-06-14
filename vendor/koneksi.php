<?php
class DBConnection
{
	public function con()
	{
		$db['server'] = 'localhost';
		$db['user'] = 'root';
		$db['password'] = '';
		$db['database'] = 'penggajian';

		$con = new mysqli($db['server'], $db['user'], $db['password'], $db['database']) or die('Gk Konek Bos');
		return $con;
	}

	public function viewDB($table, $kunci = null, $isi_kunci = null)
	{
		if ($kunci != null && $isi_kunci != null) {
			$sql = "SELECT * FROM $table WHERE $kunci = '$isi_kunci'";
		} else {
			$sql = "SELECT * FROM $table";
		}
		$run = mysqli_query($this->con(), $sql);
		$rows = array();
		while ($row = $run->fetch_array(MYSQLI_BOTH)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function cosviewDB($query)
	{
		$sql = $query;
		$run = mysqli_query($this->con(), $sql);
		$rows = array();
		while ($row = $run->fetch_array(MYSQLI_BOTH)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function insertDB($table, $isi)
	{
		$fields = $values = array();
		if (is_array($isi)) {
			foreach (array_keys($isi) as $key) {
				$fields[] = $key;
				$values[] = "'" . mysqli_real_escape_string($this->con(), $isi[$key]) . "'";
			}
			$fields = implode(",", $fields);
			$values = implode(",", $values);
			$sql = "INSERT INTO $table($fields) VALUES ($values)";
			$run = mysqli_query($this->con(), $sql);
			if ($run) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function updateDB($table, $data, $key, $value)
	{
		if (is_array($data)) {
			$fields = array();
			foreach ($data as $field => $fieldValue) {
				$escapedValue = mysqli_real_escape_string($this->con(), $fieldValue);
				$fields[] = "`$field` = '$escapedValue'";
			}
			$fieldList = implode(', ', $fields);
			$escapedValue = mysqli_real_escape_string($this->con(), $value);
			$sql = "UPDATE `$table` SET $fieldList WHERE `$key` = '$escapedValue'";
			$run = mysqli_query($this->con(), $sql);
			if ($run) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	public function deleteDB($table, $kunci, $isi_kunci)
	{
		$sql = "DELETE FROM $table WHERE $kunci = '$isi_kunci'";
		$run = mysqli_query($this->con(), $sql);
		if ($run) {
			return true;
		} else {
			return false;
		}
	}
}
