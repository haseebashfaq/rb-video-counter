<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Video Counter</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="demo">
      <div><img src="images/logo.png" height="150" width="343" /></div>
  <h1>Video Counter data</h1>

  <div class="export_btn" style="text-align:center; margin:20px 0;">

    <a href="video_count_data.php?export=true">
      <button style="padding:10px;" id="export_btn">Export Data</button>
    </a>

    <a href="http://webkiestudio.com/video_count_data.php" id="go_back" style="display:block;">
      <button style="padding:10px;" id="go_back_btn">Go Back</button>
    </a>

    <?php 
      if(isset($_GET['export'])) {
        echo "<script>window.location.href='api2.php';</script>";
      }
    ?>
  
  </div>
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
              $username = 'sky147_umair';
              $password = 'basaik';
              $host     = 'localhost';
              $database = 'sky147_reckit';

              // $username = 'root';
              // $password = '';
              // $host     = 'localhost';
              // $database = 'sky147_reckit';

              $connection = mysqli_connect($host, $username, $password);
              $checkdb    = mysqli_select_db($connection, $database);
              mysqli_set_charset($connection, 'utf8');
              
              $queryForDateTime = mysqli_query($connection, "SET time_zone='+05:00'");
              $query = mysqli_query($connection, "select FROM_UNIXTIME(Date_Time/1000,'%Y-%M-%d %H:%i:%s %f') as date_time,tab_id,store_name,play_count,complete_count from video_counter where tab_id != '' ORDER by tab_id ");
              while($row = mysqli_fetch_array($query)) {
        
            ?>

              <tr>
                  <td data-title="Tab ID"><?php echo $row['tab_id']; ?></td>
                  <td data-title="Play Count"><?php echo $row['play_count']; ?></td>
                  <td data-title="Complete Count"><?php echo $row['complete_count']; ?></td>
                  <td data-title="Date"><?php echo $row['date_time']; ?>
                  </td>
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
