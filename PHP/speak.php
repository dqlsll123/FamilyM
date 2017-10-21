<html>
<head>
　<title></title>
<script>

function upload(){


         var words = document.getElementById("words").value;
         //alert(tcontent);

         var xmlHttp = new XMLHttpRequest();

         xmlHttp.onload = function () {
             if (xmlHttp.status == 200) {
                 var state = xmlHttp.responseText;
            
                 if (state == 1) {
                     alert("submit successful");
                    // parent.login(username);
                    // location.assign("/android_asset/www/myProfile.html?username=" + username);     //login successfully
                 }
                 if (state == 2) {
                    alert("sumbit failed!");  // login failed
                 }
             }
         }
         var params = "words=" + words ;


         xmlHttp.open("POST", "http://dqlsll1234.centralus.cloudapp.azure.com/familyM/uploadWords.php", true);
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.send(params);


}







</script>
</head>
<body>






<input id="words" type="text" name="words" cols="20">

<button onclick="upload()">submit</button>

</form>
</body>
</html>
