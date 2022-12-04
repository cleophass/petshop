<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/connection.css">



</head>

<?php
require_once 'db.php';
?>

<body>
    <?php require 'navbar.php'; ?>
    <div class="container">
        <h1>Who we are </h1>
        <p class="paragraph"> We are a group of students from the A.P.U (Asian Pacific Univesity), from Malaysia. We are currently taking the subject Web Programming. This website is our final project for the subject. </p>
        <div class="team">
            <h1>Our Team </h1>
            
            <ul>
                <li> <a href="https://www.google.com/search?q=beaugoss">Fournier Cléophas</a> </li>
                <li> <a href="https://www.google.com/search?q=vietnamerde">Duong Tristan</a> </li>
                <li> <a href="https://www.google.com/search?q=definition%20of%20goat">Doutriaux Jean</a> </li>
            </ul>
        </div>
        <div class="who">
            <h1>The idea behind this project</h1>
            <p> This project is a website that allows users to buy and sell pets. The idea and realized a community site indeed the animals will be sold and bought by the users. we are only there to make the link between the seller and the buyer. this allows us to facilitate the task. moreover it allows to regularize the traffic of animals.</p>
            <h3 class="sub">Our Mission</h3>
            <p> Our mission is to make buying and selling pets easier for everyone. </p>
            <h3 class="sub">Our Vision</h3>
            <p> We want to make this website the number one website for buying and selling pets. we want to give abandoned animals a new home. moreover, we want to find customers who correspond to the animals we offer</p>
            <h3 class="sub" >Our Values</h3>
            <p> Our values are to make this website a safe and secure place for everyone. We
                want to make sure that everyone who uses this website is safe and secure. To avoid too many animals being abandoned. indeed no animals on our site will come from breeding. In France we have an association called SPA which helps find a new home for abandoned animals. Our goal is to digitize that. this is where ApuPpies comes in. we allow the user to offer his pets in exchange for compensation or to consult the different abandoned animals and find the one we like.</p>
        </div>
    </div>
</body>
<style>
    .container {
        margin: 0 auto;
        width: 80%;
        padding: 20px;
    }

    .title {
        text-align: center;
        font-size: 50px;
    }

    .paragraph {
        text-align: center;
        font-size: 30px;
    }

    .who {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .who h1 {
        text-align: center;
        font-size: 50px;
    }

    .who p {
        text-align: center;
        font-size: 30px;
    }

    .team {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .team h1 {
        text-align: center;
        font-size: 50px;
    }

    .team p {
        text-align: center;
        font-size: 20px;
        
    }

    .team ul {
        list-style: none;
        text-align: center;
        font-size: 20px;
        
    }

    .team li{
        /* padding top */
        padding-top: 20px;
        /* fontsize */
        font-size: 30px;
        /* police */
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    .sub{
	/* mettre au milieu */
	display: flex;
	justify-content: center;
    
}


</style>

</html>