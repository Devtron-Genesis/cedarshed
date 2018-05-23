<?php 
set_time_limit(0);

$mysqldump_version="1.02";

$print_form=1;

$output_messages=array();

$mysql_host     = "localhost";
$mysql_database = "cedarshe_d7";
$mysql_username = "cedarshe_d7";
$mysql_password = "cedarshe_d7";
	
_mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password);

if( 'Export' == $_REQUEST['action'])
{
	_mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password);
	if( 'SQL' == $_REQUEST['output_format'] )
	{
		$print_form=0;
	
		//ob_start("ob_gzhandler");
		
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="'.$mysql_host."_".$mysql_database."_".date('YmdHis').'.sql"');
		echo "/*mysqldump.php version $mysqldump_version */\n";
		
		_mysqldump($mysql_database);
	
		//header("Content-Length: ".ob_get_length());
		//ob_end_flush();
	}
	else if( 'CSV' == $_REQUEST['output_format'] && isset($_REQUEST['mysql_table']))
	{
		$print_form=0;

		ob_start("ob_gzhandler");

		header('Content-type: text/comma-separated-values');
		header('Content-Disposition: attachment; filename="'.$mysql_host."_".$mysql_database."_".$mysql_table."_".date('YmdHis').'.csv"');
		//header('Content-type: text/plain');
		_mysqldump_csv($_REQUEST['mysql_table']);
		header("Content-Length: ".ob_get_length());
		ob_end_flush();
	}
}

function _mysqldump_csv($table)
{
	$delimiter= ",";
	if( isset($_REQUEST['csv_delimiter']))
		$delimiter= $_REQUEST['csv_delimiter'];

	if( 'Tab' == $delimiter) $delimiter="\t";

	$sql="select * from `$table`;";
	$result=mysql_query($sql);
	if( $result)
	{
		$num_rows= mysql_num_rows($result);
		$num_fields= mysql_num_fields($result);

		$i=0;
		while( $i < $num_fields)
		{
			$meta= mysql_fetch_field($result, $i);
			echo($meta->name);
			if( $i < $num_fields-1)
				echo "$delimiter";
			$i++;
		}
		echo "\n";

		if( $num_rows > 0)
		{
			while( $row= mysql_fetch_row($result))
			{
				for( $i=0; $i < $num_fields; $i++)
				{
					echo mysql_real_escape_string($row[$i]);
					if( $i < $num_fields-1) echo "$delimiter";
				}
				echo "\n";
			}
		}
	}
	mysql_free_result($result);
}


function _mysqldump($mysql_database)
{
	$tables_to_export = array ( 'dr_node', 'dr_node_access', 'dr_node_revision','dr_node_type' );
	
	$sql = "show tables;";
	$result= mysql_query($sql);
	
	if( $result)
	{
		while( $row= mysql_fetch_row($result))
		{
			if(in_array($row[0], $tables_to_export ))
			{
				_mysqldump_table_structure($row[0]);
	
				if( isset($_REQUEST['sql_table_data']))
				{
					_mysqldump_table_data($row[0]);
				}
			}
		}
	}
	else
	{
		echo "/* no tables in $mysql_database */\n";
	}
	mysql_free_result($result);
}

function _mysqldump_table_structure($table)
{
	echo "/* Table structure for table `$table` */\n";
	if( isset($_REQUEST['sql_drop_table']))
	{
		echo "DROP TABLE IF EXISTS `$table`;\n\n";
	}
	if( isset($_REQUEST['sql_create_table']))
	{

		$sql="show create table `$table`; ";
		$result=mysql_query($sql);
		if( $result)
		{
			if($row= mysql_fetch_assoc($result))
			{
				echo $row['Create Table'].";\n\n";
			}
		}
		mysql_free_result($result);
	}
}

function _mysqldump_table_data($table)
{
	$sql="select * from `$table`;";
	$result=mysql_query($sql);
	if( $result)
	{
		$num_rows= mysql_num_rows($result);
		$num_fields= mysql_num_fields($result);

		if( $num_rows > 0)
		{
			echo "/* dumping data for table `$table` */\n";

			$field_type=array();
			$i=0;
			while( $i < $num_fields)
			{
				$meta= mysql_fetch_field($result, $i);
				array_push($field_type, $meta->type);
				$i++;
			}

			//print_r( $field_type);
			echo "insert into `$table` values\n";
			$index=0;
			while( $row= mysql_fetch_row($result))
			{
				echo "(";
				for( $i=0; $i < $num_fields; $i++)
				{
					if( is_null( $row[$i]))
						echo "null";
					else
					{
						switch( $field_type[$i])
						{
							case 'int':
								echo $row[$i];
								break;
							case 'string':
							case 'blob' :
							default:
								echo "'".mysql_real_escape_string($row[$i])."'";

						}
					}
					if( $i < $num_fields-1)
						echo ",";
				}
				echo ")";

				if( $index < $num_rows-1)
					echo ",";
				else
					echo ";"; echo "\n";

				$index++;
			}
		}
	}
	mysql_free_result($result);
	echo "\n";
}

function _mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password)
{
	global $output_messages;
	$link = mysql_connect($mysql_host, $mysql_username, $mysql_password);
	if (!$link)
	{
	   array_push($output_messages, 'Could not connect: ' . mysql_error());
	}
	else
	{
		array_push ($output_messages,"Connected with MySQL server:$mysql_username@$mysql_host successfully");

		$db_selected = mysql_select_db($mysql_database, $link);
		if (!$db_selected)
		{
			array_push ($output_messages,'Can\'t use $mysql_database : ' . mysql_error());
		}
		else
			array_push ($output_messages,"Connected with MySQL database:$mysql_database successfully");
	}
}

if( $print_form >0 )
{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>mysqldump.php version <?php echo $mysqldump_version; ?></title>
</head>
<body>
<?php
foreach ($output_messages as $message)
{
	echo $message."<br />";
}
?>
<form action="" method="post">
MySQL connection parameters:
<table border="0">
  <tr>
    <td>Host:</td>
    <td><input  name="mysql_host" type="hidden" value="<?=$mysql_host;?>"  /></td>
  </tr>
  <tr>
    <td>Database:</td>
    <td><input  name="mysql_database" type="hidden" value="<?=mysql_database;?>"  /></td>
  </tr>
  <tr>
    <td>Username:</td>
    <td><input  name="mysql_username" type="hidden" value="<?=mysql_username?>"  /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input  type="hidden" name="mysql_password" value="<?=mysql_password;?>"  /></td>
  </tr>
  <tr>
    <td>Output format: </td>
    <td>
     <input  type="hidden" name="output_format" value="SQL"  />
    </td>
  </tr>
</table>
<input type="submit" name="action"  value="Test Connection"><br />
  <br>Dump options(SQL):
  <table border="0">
    <tr>
      <td>Drop table statement: </td>
      <td><input type="checkbox" name="sql_drop_table" <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_drop_table'])) ; else echo 'checked' ?> /></td>
    </tr>
    <tr>
      <td>Create table statement: </td>
      <td><input type="checkbox" name="sql_create_table" <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_create_table'])) ; else echo 'checked' ?> /></td>
    </tr>
    <tr>
      <td>Table data: </td>
      <td><input type="checkbox" name="sql_table_data"  <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_table_data'])) ; else echo 'checked' ?>/></td>
    </tr>
  </table>
  <br>
  <input type="submit" name="action"  value="Export"><br />
</form>
</body>
</html>
<?php
}
?>