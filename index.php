<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  require 'encode.php';
  require 'faicon.php';
  ?>
   <link rel="stylesheet" href="login.css">
   <?php
  echo '<link href="data:image/x-icon;base64,'.$ficon.'" rel="icon" type="image/x-icon">';
  ?>
   <meta charset="utf-8">
   <title>Addon</title>
  </head>
  <body>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
     $(function() {
      $( "#SearchPin" ).autocomplete({
         source: 'search_login.php'
      });
     });
    </script>
    <ul>
     <li><a href="about.php">About Addon</a></li>
     <form action="display.php" method="get">
      <input  style="padding: 6px; border: none; margin-top: 8px; margin-right: 16px; font-size: 17px;" type="text" placeholder="Search for public wall" id="SearchPin" name="wallname">
      <button type="submit">Submit</button>
     </form>
    </ul>

    <div class=image>
    <?php
    echo '<img src="', $url, '",width = "300", height = "300">';
    ?>
    </div>

    <div class=topic>
      Welcome to Addon
       <form class=form_style action="display.php" method="get">
        Please type your wall pin:<br>
        <input type="text" name="wallpin">
        <input type="submit" value="Go!"><br>
       </form>
    </div>
  </body>
</html>


