<?php
if(file_exists('../../../app.ini')){
  header('location: /');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="../dist/index.js" type="module" defer></script>
    <link href="../dist/index.css" rel="stylesheet">
  </head>
  <body>
    <div class =" bg-gray-50 h-screen w-screen " id="root"></div>
  
    
  </body>
</html>
