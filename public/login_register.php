<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, 
                         initial-scale=1.0">
</head>
 
<body>
    <header>
        <h1 class="heading">Bienvenue chakal</h1>
    </header>
 
    <!-- container div -->
    <div class="container">
 
        <!-- upper button section to select
             the login or signup form -->
        <div class="slider"></div>
        <div class="btn">
            <button class="login">Login</button>
            <button class="signup">Register</button>
        </div>
 
        <!-- Form section that contains the
             login and the signup form -->
        <div class="form-section">
 
            <!-- login form -->
            <form action="../src/handler/login-handler.php" method="post">
                <div class="login-box">
                        <input type="text"
                               class="username ele"
                               placeholder="username"
                               name = "log_username">
                        <input type="password"
                               class="password ele"
                               placeholder="password"
                               name = "log_password">
                        <button class="clkbtn">Login</button>
                </div>
            </form>
 
            <!-- signup form -->
            <form action="../src/handler/register-handler.php" method="post">
                <div class="signup-box">
                    <input type="text"
                           class="name ele"
                           placeholder="username"
                           name="username">
                    <input type="email"
                           class="email ele"
                           placeholder="youremail@email.com"
                           name="email">
                    <input type="password"
                           class="password ele"
                           placeholder="password"
                           name="password">
                    <input type="password"
                           class="password ele"
                           placeholder="Confirm password"
                           name="password2">
                    <button class="clkbtn">Signup</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<style>
   @import url(
"https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
 
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
 
body {
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 30px;
    background-color: rgb(231, 231, 231);
}
 
header {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
 
.heading {
    color: green;
}
 
.title {
    font-weight: 400;
    letter-spacing: 1.5px;
}
 
.container {
    height: 600px;
    width: 500px;
    background-color: white;
    box-shadow: 8px 8px 20px rgb(128, 128, 128);
    position: relative;
    overflow: hidden;
}
 
.btn {
    height: 60px;
    width: 300px;
    margin: 20px auto;
    box-shadow: 10px 10px 30px rgb(254, 215, 188);
    border-radius: 50px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
 
.login,
.signup {
    font-size: 22px;
    border: none;
    outline: none;
    background-color: transparent;
    position: relative;
    cursor: pointer;
}
 
.slider {
    height: 60px;
    width: 150px;
    border-radius: 50px;
    background-image: linear-gradient(to right,
            rgb(255, 195, 110),
            rgb(255, 146, 91));
    position: absolute;
    top: 20px;
    left: 100px;
    transition: all 0.5s ease-in-out;
}
 
.moveslider {
    left: 250px;
}
 
.form-section {
    height: 500px;
    width: 1000px;
    padding: 20px 0;
    display: flex;
    position: relative;
    transition: all 0.5s ease-in-out;
    left: 0px;
}
 
.form-section-move {
    left: -500px;
}
 
.login-box,
.signup-box {
    height: 100%;
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0px 40px;
}
 
.login-box {
    gap: 50px;
}
 
.signup-box {
    gap: 30px;
}
 
.ele {
    height: 60px;
    width: 400px;
    outline: none;
    border: none;
    color: rgb(77, 77, 77);
    background-color: rgb(240, 240, 240);
    border-radius: 50px;
    padding-left: 30px;
    font-size: 18px;
}
 
.clkbtn {
    height: 60px;
    width: 150px;
    border-radius: 50px;
    background-image: linear-gradient(to right,
            rgb(255, 195, 110),
            rgb(255, 146, 91));
    font-size: 22px;
    border: none;
    cursor: pointer;
}
 
/* For Responsiveness of the page */
 
@media screen and (max-width: 650px) {
    .container {
        height: 600px;
        width: 300px;
    }
 
    .title {
        font-size: 15px;
    }
 
    .btn {
        height: 50px;
        width: 200px;
        margin: 20px auto;
    }
 
    .login,
    .signup {
        font-size: 19px;
    }
 
    .slider {
        height: 50px;
        width: 100px;
        left: 50px;
    }
 
    .moveslider {
        left: 150px;
    }
 
    .form-section {
        height: 500px;
        width: 600px;
    }
 
    .form-section-move {
        left: -300px;
    }
 
    .login-box,
    .signup-box {
        height: 100%;
        width: 300px;
    }
 
    .ele {
        height: 50px;
        width: 250px;
        font-size: 15px;
    }
 
    .clkbtn {
        height: 50px;
        width: 130px;
        font-size: 19px;
    }
}
 
@media screen and (max-width: 320px) {
    .container {
        height: 600px;
        width: 250px;
    }
 
    .heading {
        font-size: 30px;
    }
 
    .title {
        font-size: 10px;
    }
 
    .btn {
        height: 50px;
        width: 200px;
        margin: 20px auto;
    }
 
    .login,
    .signup {
        font-size: 19px;
    }
 
    .slider {
        height: 50px;
        width: 100px;
        left: 27px;
    }
 
    .moveslider {
        left: 127px;
    }
 
    .form-section {
        height: 500px;
        width: 500px;
    }
 
    .form-section-move {
        left: -250px;
    }
 
    .login-box,
    .signup-box {
        height: 100%;
        width: 250px;
    }
 
    .ele {
        height: 50px;
        width: 220px;
        font-size: 15px;
    }
 
    .clkbtn {
        height: 50px;
        width: 130px;
        font-size: 19px;
    }
}
</style>

<script>
    let signup = document.querySelector(".signup");
    let login = document.querySelector(".login");
    let slider = document.querySelector(".slider");
    let formSection = document.querySelector(".form-section");
    
    signup.addEventListener("click", () => {
    	slider.classList.add("moveslider");
    	formSection.classList.add("form-section-move");
    });
    
    login.addEventListener("click", () => {
    	slider.classList.remove("moveslider");
    	formSection.classList.remove("form-section-move");
    });

</script>
</html>