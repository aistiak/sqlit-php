<?php
  
  // open db connection 
      class MyDB extends SQLite3 {
      function __construct() {
         $this->open('test.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   
   
  // get name and id 
   if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
   
         $sql =<<<EOF
       select * from test ;
EOF;

      $ret = $db->query($sql);
	 
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<br>" ;
      echo "ID = ". $row['id'];
      echo "NAME = ". $row['name'] ."<br>";
      
   }
  
    $db->close();
	}

?>