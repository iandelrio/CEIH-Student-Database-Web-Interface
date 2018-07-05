
<!--Using Bootstrap to create home page-->
<html>


<meta charset="utf-8"">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet'>

<title> CFEIH Student Database </title>

<head>
<style>

.form {
  background: #FFFFFF;
  border: 2px solid #266D12;
  border-radius: 4px;
  max-width: 400px;
  margin: 0 auto 100px;
  padding: 45px;
}


.form input {
  font-family: "Georgia";
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
}

.form button {
  font-family: "Georgia";
  background-color: #FFFFFF;
  color: #555555;
  border: 2px solid #266D12;
  border-radius: 4px;
  padding: 12px 28px;
  text-align: center;
  display: inline-block;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  width: 100%;
  
}

.form button:hover {
    background-color: #318A17;
    color:  #FFFFFF;
}


body, html{
    height: 100%
    margin: 0;
    font-family: 'Cookie';
    font-size: 15px;

}

.bg {  
    background-image: url("ubc3.jpg");
    height: 100%; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-size: cover;

}

h1{
    font-size: 100px;
    color: #004d00;
}



</style>
</head>
<body>

<div class="bg">
<div class="container">
<center><br><br><br><br>
<h1>CFEIH Student Database</h1>


</center>
</div>

<div class="login-page">
  <div class="form">

    <form class="login-form">
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <button>LOGIN</button>
      
    </form>
  </div>
</div>

</div>

</body>
</html>