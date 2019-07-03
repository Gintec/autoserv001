<?php $filename = date("Y-m-d_H-i-s")."-backup.sql.gz"; shell_exec('C:\wamp\bin\mysql\mysql5.6.17\bin\mysqldump --user=root --password="golf" --host=localhost kmdb --ignore-table=kmdb.scc > '.$filename); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
	<script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
	<body><br>
	<div class="center alert alert-info">
	<table width="80%" align="center" class="table table-striped">
      <tr>
        <td align="center">BACKING UP DATABASE... </td>
      </tr>
      <tr>
        <td>This process may take up to 5 minutes. Please minize this page and continue your work </td>
      </tr>
    </table>
</div>
    </body>
</html>