<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http_equiv=""X-UA-Compatible" content="IE=edge">
        <meta name=""viewreport" content=""width=device-width, initial-scale="1.0">
        <title>BIKERIDE HOME</title>
        <link rel=""stylesheet" href=""style.css">
    </head>

    <body>

        <header>
            <h2 class="logo">BIKERIDE</h2>
            <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">GO</a>
                <a href="#">CONTACT</a>
                <button class="btnlogin_popup">Login</button>
            </nav>

        </header>
        <section class="home">
            <div class="home-content">
                <h1>BIKERIDE</h1>
                <h2>FEEL THE POWER OF THE RIDE</h2>
            </div>
        </section>
    </body>
</html>


<style>
    @import url('http://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box0;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(home.jpg) no-repeat;
    background-size: cover;
    background-position: center;
}
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 10%;
    display: flex;
    align-items: center;
    z-index: 99%;
    
    
}
.logo {
    font-size: 25px;
    color:black;
    user-select: none;
    text-align: start;

}

.navigation a {
    position: relative;
    font-size: 18px;
    color:black;
    text-decoration: none;
    font-weight: 300px;
    margin-left: 35px;
}
.navigation a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: black;
    border-radius: 5px;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .5s;
}
.navigation a:hover::after {
    transform-origin: left;
     transform: scaleX(1);
}
.navigation .btnlogin_popup{
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid black;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1em;
    color:black;
    font-weight: 500;
    margin-left: 40px;
    transition: .5s;
    align-items: end;
}
.navigation .btnlogin_popup:hover {
   background: black; 
   color:gray;
}

.home{ 
    height: 100vh;
    display: flex;
    align-items: center;
    padding: 0 10%;
}

.home-content{
    background: transparent;
    max-width: 600;  
}
.home-content h1{
    font-size: 56px;
    font-weight: 700;
    color: black;
}
.home-content h2{
    font-size: 35px;
    font-weight: 700;
    color: black
}


</style>
