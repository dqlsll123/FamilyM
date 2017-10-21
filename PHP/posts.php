<!DOCTYPE html>
<html style="width:100%;height:100%;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .mySlides {
            display: none;
        }
    </style>
</head>
<body style="width:100%;height:100%;margin:0px;background-color:#ebebe0">


    <div class="w3-content w3-section">
        <img class="mySlides" src="source/memory1.1.png" style="width:100%">
        <img class="mySlides" src="source/memory2.1.png" style="width:100%">
        <img class="mySlides" src="source/memory3.1.png" style="width:100%">
    </div>
    <div id="content">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "1234";
      $dbname = "capstone";
      header("Access-Control-Allow-Origin: *");
      $user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT uname, mcontent, mtime, img,video FROM memory where isPublic=1 or uname='$user' order by mtime desc";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
          // output data of each row
        // echo "<ul id='list' data-role='listview'>";
          while($row = $result->fetch_assoc()) {
              echo "
         <div style='width:100%;height:20%;margin-top:2px;background-color:white'>

                  <img style='width:20%;height:10%;float:left' src='source/".$row["uname"].".png' />
                  <div style='float:left'>
                      ".$row["mcontent"]."



                  </div>
                  <br>

                  <img style='width:60px;height:60px;float:left;margin-left:1%;margin-top:1%' src='images/".$row["img"]."' />
                  <img style='width:60px;height:60px;float:left;margin-left:1%;margin-top:1%' src='images/".$row["video"]."' />

                  <br><br><br>
                  <div style='margin-left:21%'>
                      ".$row["mtime"]."
       </div>
              </div>";
          }
         //echo $user;
      } else {
          echo "0 results";
      }
      $conn->close();
      ?>


    </div>

    <script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}



    </script>

</body>
</html>
