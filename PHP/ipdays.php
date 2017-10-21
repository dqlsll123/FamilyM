<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
    <script>
    function func(){

        document.getElementById('inputBox').innerHTML = "<input style='height:28px' id='date' value='2016-10-10' type='date' name='bday'><input  id='content' style='height:30px;margin-left:10px' type='text'><select style='height:30px;' id='isExpire'><option value='notExpire'>not expire</option><option value='canExpire'>can expire</option></select><button style='height:30px;margin-left:10px' onclick='func2()'>submit</button>";

}

function func2(){
    var date = document.getElementById('date').value;
    var content = document.getElementById('content').value;
    var getExpire = document.getElementById("isExpire").value;
    var isExpire;
    if (getExpire == "canExpire") {
        isExpire = 1;
    } else {
        isExpire = 2;
    }
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onload = function () {
        if (xmlHttp.status == 200) {
            var state = xmlHttp.responseText;
            //  alert(state);
            document.getElementById('inputBox').innerHTML = "";
            location.reload();
        }
    }
    var params = "content=" + content + "&date=" + date + "&isExpire=" + isExpire;
    xmlHttp.open("POST", "http://dqlsll1234.centralus.cloudapp.azure.com/familyM/submitIpdays.php", true);

    // Set MIME type
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send request, passing in the parameters
    xmlHttp.send(params);



//alert(date);


}


function deleteIpdays(did){

    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onload = function () {
        if (xmlHttp.status == 200) {
            var state = xmlHttp.responseText;


            location.reload();
        }
    }
    var params = "did=" + did;
    xmlHttp.open("POST", "http://dqlsll1234.centralus.cloudapp.azure.com/familyM/deleteIpdays.php", true);

    // Set MIME type
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send request, passing in the parameters
    xmlHttp.send(params);



//alert(date);


}



    </script>
    <title></title>
</head>
<body style="width:100%;height:100%;margin:0px;background-color:#ebebe0">


    <div  style="width:100%;height:8%;background-color:red;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle;text-align:center;font-size:25px">
<!--
        <img style="width:20%;height:100%;float:left" src="source/back.png" />
<-->
<div style="width:20%;height:100%;float:left"></div>
            Important Days

        <img onclick="func()" style="width:20%;height:100%;float:right" src="source/add.png" />

    </div>
    <div id="inputBox"></div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "capstone";
    header("Access-Control-Allow-Origin: *");
    //$user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT did, content, ipdate, isExpire FROM ipdays";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
        // output data of each row
      // echo "<ul id='list' data-role='listview'>";
        while($row = $result->fetch_assoc()) {

          if($row["isExpire"]==1){
          //  echo "1";
          $now = time(); // or your date as well
          $your_date = strtotime($row["ipdate"]);

          $datediff = $now - $your_date;
          $dif=floor($datediff / (60 * 60 * 24));
          if($dif>0){

         echo "<div style='width:100%;height:10%;margin-top:1px;background-color:white;font-family: 'PT Sans', Helvetica, Arial, sans-serif;'>

        <div style='height:100%;width:20%;background-color:red;text-align:center;float:left'>
            <p style='margin:5px'>".$row["ipdate"]."</p>

        </div>
        <div style='height:100%;margin-left:1%;width:50%;float:left;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle;margin:5px'>
          ".$row["content"]."
            <br>
            <p style='color:green'>".$dif." days after</p>
        </div>
        <div onclick='deleteIpdays(".$row["did"].")' style='width:10%;height:100%;float:right;background-color:
        red;font-size:25px;text-align:center'><p style='margin-top:10px;padding:0px'>D</p></div>


    </div>
";
                    }else{
    $dif2=$dif*(-1);
    echo "<div style='width:100%;height:10%;margin-top:1px;background-color:white;font-family: 'PT Sans', Helvetica, Arial, sans-serif;'>

   <div style='height:100%;width:20%;background-color:red;text-align:center;float:left'>
       <p style='margin:5px'>".$row["ipdate"]."</p>

   </div>
   <div style='height:100%;margin-left:1%;width:50%;float:left;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle;margin:5px'>
     ".$row["content"]."
       <br>
       <p style='color:green'>".$dif2." days left</p>
   </div>
   <div onclick='deleteIpdays(".$row["did"].")' style='width:10%;height:100%;float:right;background-color:
   red;font-size:25px;text-align:center'><p style='margin-top:10px;padding:0px'>D</p></div>


 </div>
 ";
}

          }

          else{
            $now = time(); // or your date as well
            $your_date = strtotime($row["ipdate"]);
        //  echo   date("Y-m-d",$now);
          $date1 = new DateTime(date("Y-m-d",$your_date));
          $date2 = new DateTime( date("Y-m-d",$now));
          switch (true) {
              case ($date1 < $date2) :
                  $date2->setDate($date1->format('Y'), $date2->format('m'), $date2->format('d'));
                  break;

              case ($date2 < $date1) :
                  $date1->setDate($date2->format('Y'), $date1->format('m'), $date1->format('d'));
                  break;
          }

          $interval = $date1->diff($date2);
          $diff1= $interval->format('%R%a');
          $aa=$diff1*1;
              if($aa>0){
                $bb=365-$aa;
                echo "<div style='width:100%;height:10%;margin-top:1px;background-color:white;font-family: 'PT Sans', Helvetica, Arial, sans-serif;'>

               <div style='height:100%;width:20%;background-color:green;text-align:center;float:left'>
                   <p style='margin:5px'>".$row["ipdate"]."</p>

               </div>
               <div style='height:100%;margin-left:1%;width:50%;float:left;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle;margin:5px'>
                 ".$row["content"]."
                   <br>
                   <p style='color:green'>".$bb." days left</p>
               </div>
               <div onclick='deleteIpdays(".$row["did"].")' style='width:10%;height:100%;float:right;background-color:
               green;font-size:25px;text-align:center'><p style='margin-top:10px;padding:0px'>D</p></div>


             </div>
             ";


              }else{
            $cc= $aa*-1;
            echo "<div style='width:100%;height:10%;margin-top:1px;background-color:white;font-family: 'PT Sans', Helvetica, Arial, sans-serif;'>

           <div style='height:100%;width:20%;background-color:green;text-align:center;float:left'>
               <p style='margin:5px'>".$row["ipdate"]."</p>

           </div>
           <div style='height:100%;margin-left:1%;width:50%;float:left;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle;margin:5px'>
             ".$row["content"]."
               <br>
               <p style='color:green'>".$cc." days left</p>
           </div>
           <div onclick='deleteIpdays(".$row["did"].")' style='width:10%;height:100%;float:right;background-color:
           green;font-size:25px;text-align:center'><p style='margin-top:10px;padding:0px'>D</p></div>


         </div>
         ";
              }





        //  echo "2";

          }

        }
       //echo $user;
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>


</body>
</html>
