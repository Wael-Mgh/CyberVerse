<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link rel="stylesheet" type="text/css" href="offerings.css">
    <style>
    
    body{
        background-image: url("pic/4.jpeg");
        background-repeat: no-repeat;
  background-size: 1500px 800px;
    }
 
        
  .card {
    width: 250px;
    border: 1px solid #1869c6;
    border-radius: 25px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    padding: 10px;
    float: left;
    justify-content: center;
    margin: 20px;
    margin-top: 20px;
    background-color: white;
    text-align: center;
    transition: 0.7s ease;
    background-color: rgba(240, 240, 240, 0.5);
  }
  .card:hover {
    transform: scale(1.1);
  }
  
  .card img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
  }
  .card a{
    color: #1869c6;
	font-weight: bold;
	text-decoration: none;
  }
  .card a:hover{
    border-left-style: solid;
	border-color: #1869c6;
  }

  a{
    font-size:150%;
    text-color:red;
  }
  .button {
  
  
 
  background-color: #f1f1f1;
  color: black;
  font-size: 16px;
  padding: 16px 30px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
.button:hover {
  background-color: black;
  color: white;
}
        </style>
</head>
<body>

<div id="head">
 
 <div class="navhead"> 
      <p class="header"><a class="lin" href="homepage.html">Home</a></p>
      <p class="header"><a class="lin" href="about.html">About</a></p>
      <p class="header"><a class="lin" href="contact.html">Contact Us</a></p>  
    <p class="header"><a class="lin" href="logout.php">Logout</a></p>    
 </div>
</div>

<div class="card">
            <img src="images/python.png" alt="">
                   <a href="https://www.w3schools.com/python/">Python</a>
                    <p>Discover Python Language.</p>
                    <p>
                    <div id="registration-form" >
                    <button id="registerButton" onclick="changeButtonText() " class="button">Register</button>
                    </p>
                </div>
</div>

<div class="card">
            <img src="images/php.png" alt="">
                   <a href="https://www.w3schools.com/php/">PHP</a>
                    <p>Discover PHP Language.</p>
                    <p>
                    <div id="registration-form" >
                    <button id="registerButton3" onclick="changeButtonText3() " class="button">Register</button>
                    </p>
                </div>

                </div>
                <div class="card">
            <img src="images/javascript.png" alt="">
                   <a href="https://www.w3schools.com/js/">JavaScript</a>
                    <p>Discover JS Language.</p>
                    <p>
                    <div id="registration-form" >
                    <button id="registerButton1" onclick="changeButtonText1() " class="button">Register</button>
                    </p>
                </div>
</div>
                <div class="card">
            <img src="images/css_html.png" alt="">
                   <a href="https://www.w3schools.com/html/">HTML & CSS</a>
                    <p>Discover HTML & CSS Language.</p>
                    <p>
                    <div id="registration-form" >
                    <button id="registerButton2" onclick="changeButtonText2() " class="button">Register</button>
                    </p>
                </div>

                </div>





</body>

<script >
   function changeButtonText() {
            document.getElementById("registerButton").innerHTML = "Registered";
        }
        function changeButtonText1() {
            document.getElementById("registerButton1").innerHTML = "Registered";
        }

        function changeButtonText2() {
            document.getElementById("registerButton2").innerHTML = "Registered";
        }

        function changeButtonText3() {
            document.getElementById("registerButton3").innerHTML = "Registered";
        }
</script>
</html>