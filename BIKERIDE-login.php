<!DOCTYPE html>
<html>
<head>
  <title>BYKERIDE Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  
  <div class="wrapper">
      <form action="">
         <h1>Login</h1>
         <div class="input-box">
              <input type="text" placeholder="Username" required>
              <i class='bx bxs-user'></i>
         <div class="input-box">
              <input type="text" placeholder="password" required>
              <i class='bx bxs-lock-alt'></i>
         </div>
         <div class="remember-forgot">
              <label><input type="checkbox"> Rememeber me</label>
              <a href="#">Forgot Password?</a>
         </div>
         <button type="submit" class="btn">Login</button>
         
         <div class="login-register-link">
              <p>Don't have an account? <a href="#">Register</a></p>
         </div>
	
      </form>
  </div>
  
</body>
<style>
     @import url("https://fonts.googleleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; 
    background: url(BIKERIDE.jpg) no-repeat;
    background-size: cover;
    background-position: center;
}

.wrapper {
    width: 500px;
    height: 500px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    color: black;
    border-radius: 10px;
    padding: 50px 60px;
}

.wrapper h1 {
    font-size: 36 px;
    text-align: center;
}

.wrapper .input-box {
    position: relative; 
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: black;
    padding: 20px 40px 20px 20px;
}
 
.input-box input::placeholder {
    color: black;
}

.input-box i {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
}

.wrapper .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -10px 0 10px;
}

.Rememeber-forgot label input {
    accent-color: white;
    margin-right: 3px;  
}

.Rememeber-forgot a {
    color: black;
    text-decoration: none;
}

.Rememeber-forgot a:hover {
    text-decoration: underline;
}

.wrapper .btn {
    width: 350px;
    background: transparent;
    border: none;
    outline: none;
    border-radius: 60px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .5);
    cursor: pointer;
    font-size: 40px;
    color: black;
    font-weight: 800px;
}

.wrapper login-register-link {
    font-size: 14.5px;
    text-align: right;
    margin: 20px;
}

.login-register-text p a {
    color: black;
    text-decoration: none;
    font-weight: 600;
}

.login-register-text p a :hover {
    text-decoration: underline;

}


</style>
</html>
