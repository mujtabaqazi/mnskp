<?php
if(isset($columns)){}else{$columns=4;}
?>
<style type="text/css">  
#parent {
        /*height: 400px;*/
        height: 500px;
      }
      .tbl-listing>thead>tr>th{
        background: #0E6EAB !important;
        border-color: white;
        border-width: 1px;
        text-align: center;
        
      }
       
      .tbl-listing{
       /* color: white;*/
         
      }
      .tbl-listing>tbody>tr>td{
       /* color: black;*/
        
         
      }
      .tbl-listing{
          border-collapse: separate;
      }
      .table-bordered{
        border: none !important;
      }
td:nth-child(<?php echo $columns; ?>n+<?php echo $columns; ?>) {background: white}
td:nth-child(<?php echo $columns; ?>n+<?php echo $columns+1; ?>) {background: #056C95;color: white !important;}
td:nth-child(<?php echo $columns; ?>n+<?php echo $columns+2; ?>) {background: #0b979c;color: white !important;}
td:nth-child(<?php echo $columns; ?>n+<?php echo $columns+3; ?>) {background: #218559;color: white !important;}
tr:last-child td {background: white;color: black !important;}
</style>
 