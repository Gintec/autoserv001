<?php include_once('kmaccess.php'); ?>

<?php
$filename = "4.csv";
$file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 100000, ",")) !== FALSE) {
                $sql = "INSERT into scc 
                   values ('".$getData[0]."','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "','')";
                $result = mysql_query($sql) or die(mysql_error());
                if (!isset($result)) {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File. 
                            window.location = \"home.do\"
                          </script>";
                } else {
                    echo "<script type=\"text/javascript\">
                        alert(\"CSV File has been successfully Imported.\");
                        window.location = \"home.do\"
                    </script>";
                }
            }
            fclose($file);
			
			?>