<?php
	header('Content-type:text/html;charset=utf-8');
	
	 echo '<table border=1>';
      for($i=1;$i<=8;$i++){
      	$bg = $i%2 == 0 ? "pink" : "white";
         echo "<tr bgcolor=".$bg.">";
            for($j=1;$j<=5;$j++){
                echo '<td>';
                echo 'aaa';
                echo '</td>';
            }
         echo '</tr>';
      }
      echo '</table>';