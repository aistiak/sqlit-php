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
      //
	  $id    = $_GET['id'];
	  $name  = $_GET{'name'} ;

      	  
	  
   }
   
   // insert query 
      $sql =<<<EOF
       insert into test values($id ,'$name');
EOF;

   $ret = $db->exec($sql);
   
         $sql =<<<EOF
       select * from test ;
EOF;

      $ret = $db->query($sql);
	 
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['id'];
      echo "NAME = ". $row['name'] ."<br>";
      
   }
  
    $db->close();

?>