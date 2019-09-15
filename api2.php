<?php
header_remove("Content-Type");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "sky147_umair"; //MySQL Username     
$DB_Password = "basaik";             //MySQL Password     
$DB_DBName = "sky147_reckit";         //MySQL Database Name  
$filename = "export";         //File Name
$sql = "select FROM_UNIXTIME(Date_Time/1000,'%Y-%M-%d %H:%i:%s') as date_time,tab_id,store_name,play_count,complete_count from video_counter where tab_id != '' ORDER by tab_id ";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
$queryForDateTiime = @mysql_query("SET time_zone='+05:00'",$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
$sep = "\t"; //tabbed character
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }
    exit();
?>