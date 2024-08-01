<?php
$insert=false;
if(isset($_POST['submit'])){ // Changed to check if the form has been submitted
    //connection variables
    $server='localhost';
    $username='root';
    $password='';
    $database='travel_entries'; // Added database name

    //create a database connection
    $conn= mysqli_connect($server,$username,$password,$database);

    //check for connection success
    if(!$conn){
        die("connection to this database failed due to".mysqli_connect_error()); 
    }
    echo"success connecting to db";


    //collect post variables
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $departure_date=$_POST['departure_date'];
    $return_date=$_POST['return_date'];
    $destination=$_POST['destination'];
    $package=$_POST['package'];
    // Modified query to use prepared statement
    $sql ="INSERT INTO client (name, email ,phone ,age, gender,departure_date,return_date, destination, package)  
    VALUES (?, ?, ?, ?, ?, ? ,? ,? ,? )";

   // echo $sql;

   //prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissss", $name,$email,$phone, $age, $gender, $departure_date, $return_date, $destination,$package); // "sisss" indicates data types of the parameters

   //execute the query
    if($stmt->execute()){
        //flag for successful insertion
        $insert=true;
    }
    else{
        echo "ERR " . $sql . "<br>" . $conn->error;
    }

    //close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firstflight Travels</title>
    <link rel="icon" href="./files/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   
</head>
<body>

<!-- Background Video & Header -->

    <div class="banner">
        <video src="./files/bgvid.mp4" type="video/mp4" autoplay muted loop></video>
    
    <!-- Header -->

    <div class="content" id="home"> 
        <nav>
            <img src="./files/logo.png" class="logo" alt="Logo" title="FirstFlight Travels">
            
            <ul class="navbar">
                <li>
                    <a href="#home">Home</a>
                    <a href="#locations">Locations</a>
                    <a href="#package">Packages</a>
                    <a href="./about.html">About Us</a>
                    <a href="./about.html">Contact Us</a>
                </li>
            </ul>
        </nav>
 
        <div class="title">
            <h1>FIRSTFLIGHT TRAVELS</h1>
            <p>Plan your trip with us and travel around the world with the most affordable packages!</p>
            <a href="./register.html" class="button">Register Now!</a>
        </div>
        </div>
    </div>

<!-- Services -->

<section class="container">
    <div class="text">
        <h2>We have the best services available for you!</h2>
    </div>
    <div class="rowitems">
        <div class="container-box">
        <div class="container-image">
           <img src="./files/1a.jpg" alt="Flight Services">
        </div>
            <h4>Flight Services</h4>
            <p>Arrival and Departure</p>
        </div>
    
        <div class="container-box">
        <div class="container-image">
           <img src="./files/2a.jpg" alt="Food Services">
        </div>
            <h4>Food Services</h4>
            <p>Catering</p>
        </div>

        <div class="container-box">
        <div class="container-image">
            <img src="./files/3a.jpg" alt="Travel Services">
        </div>
            <h4>Travel Services</h4>
            <p>Pick-up/drop</p>
        </div>

        <div class="container-box">
        <div class="container-image">
            <img src="./files/4a.jpg" alt="Hotel Services">
        </div>
            <h4>Hotel Services</h4>
            <p>Check-in/out</p>
        </div>

    </div>

    </div>

</section>

<!-- Locations -->

<section class="locations" id="locations">
    <div class="package-title">
        <h2>Locations</h2>
    </div>

    <div class="location-content">
        
        <a href="./locations.html#kashmir" target="_blank"><div class="col-content">
            <img src="./files/l1.jpg" alt="">
            <h5>India</h5>
            <p>Kashmir</p>
        </div></a>

       

        <a href="./locations.html#istanbul" target="_blank"><div class="col-content">
            <img src="./files/l2.jpg" alt="">
            <h5>Turkey</h5>
            <p>Istanbul</p>
        </div></a>

        <a href="./locations.html#paris" target="_blank"><div class="col-content">
            <img src="./files/l3.jpg" alt="">
            <h5>France</h5>
            <p>Paris</p>
        </div></a>

        <a href="./locations.html#bali" target="_blank"><div class="col-content">
            <img src="./files/l4.jpg" alt="">
            <h5>Indonesia</h5>
            <p>Bali</p>
        </div></a>

        <a href="./locations.html#dubai" target="_blank"><div class="col-content">
            <img src="./files/l5.jpg" alt="">
            <h5>United Arab Emirates</h5>
            <p>Dubai</p>
        </div></a>

        <a href="./locations.html#geneva" target="_blank"><div class="col-content">
            <img src="./files/l6.jpg" alt="">
            <h5>Switzerland</h5>
            <p>Geneva</p>
        </div></a>

        <a href="./locations.html#port-blair" target="_blank"><div class="col-content">
            <img src="./files/l7.jpg" alt="">
            <h5>Andaman & Nicobar</h5>
            <p>Port Blair</p>
        </div></a>

        <a href="./locations.html#rome" target="_blank"><div class="col-content">
            <img src="./files/l8.jpg" alt="">
            <h5>Italy</h5>
            <p>Rome</p>
        </div></a>

    </div>
</section>

<!-- Packages -->

<section class="package" id="package">
    <div class="package-title">
        <h2>Packages</h2>
    </div>

    <div class="package-content">
        
        <div class="box">
            <div class="image">
                <img src="./files/p1.jpg" alt="">
                <h3>Rs.9,999/-</h3>
            </div>
        
        <div class="dest-content">
            <div class="location">
                <h4>Bronze</h4>
                <ul class="pac-details">
                    <li>2 Star Hotel</li>
                    <li>5 Nights Stay</li>
                    <li>Free photo Session</li>
                    <li>Friendly Tour Guide</li>
                    <li>24/7 Customer Help Center</li>
                </ul>
            </div>
        </div>
        </div>
        
        <div class="box">
            <div class="image">
                <img src="./files/p2.jpg" alt="">
                <h3>Rs.19,999/-</h3>
            </div>
        
        <div class="dest-content">
            <div class="location">
                <h4>Silver</h4>
                <ul class="pac-details">
                    <li>3 Star Hotel</li>
                    <li>7 Nights Stay</li>
                    <li>Free photo Session</li>
                    <li>Friendly Tour Guide</li>
                    <li>24/7 Customer Help Center</li>
                </ul>
            </div>
        </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./files/p3.jpg" alt="">
                <h3>Rs.29,999/-</h3>
            </div>
        
        <div class="dest-content">
            <div class="location">
                <h4>Gold</h4>
                <ul class="pac-details">
                    <li>4 Star Hotel</li>
                    <li>10 Nights Stay</li>
                    <li>Breakfast and Dinner</li>
                    <li>Free photo Session</li>
                    <li>Friendly Tour Guide</li>
                    <li>24/7 Customer Help Center</li>
                </ul>
            </div>
        </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./files/p4.jpg" alt="">
                <h3>Rs.39,999/-</h3>
            </div>
        
        <div class="dest-content">
            <div class="location">
                <h4>Platinum</h4>
                <ul class="pac-details">
                    <li>5 Star Hotel</li>
                    <li>14 Nights Stay</li>
                    <li>Breakfast, Lunch and Dinner</li>
                    <li>Bornfire</li>
                    <li>Free photo Session</li>
                    <li>Friendly Tour Guide</li>
                    <li>24/7 Customer Help Center</li>
                </ul>
            </div>
        </div>
        </div>

    </div>

</section>

<!-- Newsletter -->

<section class="newsletter">
    <div class="newstext">
        <h2>Newsletter</h2>
        <p>Subscribe to get offers and latest<br>updates every week!</p>
    </div>

    <div class="send">
        <form action="">
            <input type="email" name="emailid" placeholder="E-mail" required>
            <input type="submit" value="Subscribe">
        </form>
    </div>

</section>

<!-- Footer -->

<section class="footer">
    <div class="foot">
        <div class="footer-content">
            
            <div class="footlinks">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="./register.html">Register</a></li>
                    <li><a href="./about.html">About Us</a></li>
                    <li><a href="./contact.html">Contact Us</a></li>
                </ul>
            </div>

            <div class="footlinks">
                <h4>Connect</h4>
                <div class="social">
                    <a href="https://www.facebook.com/mohd.rahil.blogger" target="_blank"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/mohdrahil101" target="_blank"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://www.twitter.com/mohdrahil101" target="_blank"><i class='bx bxl-twitter' ></i></a>
                    <a href="https://www.linkedin.com/in/mohdrahil101" target="_blank"><i class='bx bxl-linkedin' ></i></a>
                    <a href="https://www.youtube.com/techdollarz" target="_blank"><i class='bx bxl-youtube' ></i></a>
                    <a href="https://www.mohdrahil.wordpress.com" target="_blank"><i class='bx bxl-wordpress' ></i></a>
                    <a href="https://www.github.com/mohdrahil101" target="_blank"><i class='bx bxl-github'></i></a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="end">
        <p>Copyright © 2022 Firstflight Travels All Rights Reserved.<br>Website developed by: Mohd. Rahil</p>
    </div>
</section>


 
</body>
</html>
