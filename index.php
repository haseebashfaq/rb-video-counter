<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Material Design - Responsive Table</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="demo">
      <div><img src="images/logo.png" height="150" width="343" /></div>
  <h1>Video Counter data</h1>
  
  
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
      <table id="table" class="table table-striped table-hover table-bordered table-mc-pink">
          <thead>
              <tr>
                  <th>Tab ID</th>
                  <th>Play Count</th>
                  <th>Complete Count</th>
                  <th>Date</th>
              </tr>
          </thead>
          <tbody>

            <?php
              $username = 'root';
              $password = '';
              $host     = 'localhost';
              $database = 'sky147_reckit';

              $connection = mysqli_connect($host, $username, $password);
              $checkdb    = mysqli_select_db($connection, $database);
              mysqli_set_charset($connection, 'utf8');

              $query = mysqli_query($connection, "SELECT * FROM video_counter");
              while($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                  <td data-title="Tab ID"><?php echo $row['tab_id']; ?></td>
                  <td data-title="Play Count"><?php echo $row['play_count']; ?></td>
                  <td data-title="Complete Count"><?php echo $row['complete_count']; ?></td>
                  <td data-title="Date"><?php echo $row['date_time']; ?></td>
              </tr>
            
            <?php
             }
            ?>

          </tbody>
      </table>
  </div>
  
  <!-- Table Constructor change table classes, you don't need it in your project -->
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
