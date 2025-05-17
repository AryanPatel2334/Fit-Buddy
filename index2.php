<!DOCTYPE html>
<html lang="en">
<?php
    include "connection.php";
    // sesstion maintain ---- start
    session_start();
    
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fit-Buddy - Work Hard To Get Better Life</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favivon.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link type="text/css"  rel="stylesheet" href="index1.css">


  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap"
    rel="stylesheet">

</head>

<body id="top">

  <!-- Header Section -->
  
  <header class="header" data-header>
    <div class="container">
      <a href="index.html" class="logo">
        <ion-icon name="barbell-outline" aria-hidden="true"></ion-icon>
        
        <span class="span">Fit-Buddy</span>
      </a>

      <nav class="navbar" data-navbar>
       
        <ul class="navbar-list">
          <li>
            <a href="#home" class="navbar-link active" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li>
            <a href="#membership" class="navbar-link" data-nav-link>Membership</a>
          </li>

          <li>
            <a href="#class" class="navbar-link" data-nav-link>Class</a>
          </li>

          <li>
            <a href="#products" class="navbar-link" data-nav-link>Products</a>
          </li>
          
          <li>
            <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
          </li>


        </ul>
      </nav>
      <?php 
        if(empty($_SESSION['user']))
        {
          ?>
              <a href="login.php" class="btn btn-secondary" >Join now</a>
          <?php
        }
        else 
        { 
          ?>  
              <form method="post">
                <input type="submit" class="btn btn-secondary"  name="logout"  value="Log Out"/>
              </form>
          <?php
          if(isset($_POST['logout']))
          {
            $_SESSION['user']='';
            // header("Location:login.php");
          }
        }

      ?>
       
       <a href="registration.php" class="btn btn-secondary" target="_blank">Registration</a>
      </div>
  </header>

  <main>
    
    <article>
      
      <!-- Hero Section -->
      
    <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero"
      data-section style="background-image: url('./assets/images/hero-bg.png');">
       
      <div class="container">
          
          <div class="hero-content">
           
            <p class="hero-subtitle">
              <strong class="strong">The Best</strong>Fitness Club
            </p>

            <h1 class="h1 hero-title">
                <?php
                  if(!empty($_SESSION['user']))
                  {
                    $username = $_SESSION['user'];
                    echo "Welcome $username";
                  }
                ?>
            </h1>

            <h1 class="h1 hero-title">Work Hard To Get Better Life</h1>
           
            <p class="section-text">
              Transform Your Fitness Journey with Our Comprehensive Gym Website - Your Ultimate Fitness Companion
            </p>
              
            <a href="#" class="btn btn-primary">Get Started</a>
          
          </div>
           
          <div class="hero-banner">
              <img src="./assets/images/hero-banner.png" alt="hero banner" width="630" height="753">
              
              <img src="./assets/images/hero-circle-one.png" alt="hero banner" width="600" height="470"  aria-hidden="true" class="circle circle-one">
              
              <img src="./assets/images/hero-circle-two.png" alt="hero banner" width="600" height="470"  aria-hidden="true" class="circle circle-two">
              
              <img src="./assets/images/heart-rate.svg" alt="heart rate" width="255" height="270" class="abs-img abs-img-1">
              
              <img src="./assets/images/calories.svg" alt="calories" width="348" height="224" class="abs-img abs-img-2">
          </div>
         
      </div>
      
    </section>



      <!-- About Section -->
    <section class="section about" id="about" aria-label="about">  
       
      <div class="container">
         
          <div class="about-banner has-after">
            <img src="./assets/images/about-banner.png" alt="about banner" class="w-100" width="580" height="600" loading="lazy">

            <img src="./assets/images/about-circle-one.png" width="600" height="470" loading="lazy" aria-hidden="true"  class="circle circle-1">
            
            <img src="./assets/images/about-circle-two.png" width="600" height="470" loading="lazy" aria-hidden="true"  class="circle circle-2">

          </div>

          <div class="about-content">
            
            <p class="section-subtitle">About us</p>
            
            <h2 class="h2 section-title">Welcome To Our Fitness Gym</h2>
            
            <p class="section-text">
              GymiFy is a premium fitness center that offers state-of-the-art equipment, experienced trainers, and customized workout plans to help you achieve your fitness goals.
            </p>
              
            <p class="section-text">
                Our welcoming environment and friendly staff make every visit an enjoyable experience. Join us to transform your body, boost your energy, and improve your overall health and wellbeing.
            </p>
  
              <div class="wrapper">
                
                <div class="about-coach">
                  
                  <figure class="coach-avatar">
                    <img src="./assets/images/about-coach.jpg" alt="Trainer" width="65" height="65" loading="lazy">
                  </figure>
  
                  <div>
                    <h3 class="h3 coach-name">Tom Weskii</h3>
                    <p class="coach-title">Our Coach</p>
                 </div>
                
                </div>
                <a href="#" class="btn btn-primary">Explore more</a>
              </div>
          
          </div>
       
      </div>
   
    </section>

      <!-- Membership Section -->
       
      <section class="section membership bg-dark has-bg-image" id="membership" aria-label="membership" style="background-image: url(./assets/images/classes-bg.png);">
      <?php  
        echo "<div class='container'>";
      
          echo "<p class='section-subtitle'>Our Membership</p>";
               
                echo "<h3 class='h3 section-title text-center' style='color: white;'>Explore it!</h3>";
                
                echo "<ul class='membership-list has-scrollbar'>";
                        
                            $query="select * from membership";
                            $data=mysqli_query($cn,$query);
                            $count=mysqli_num_rows($data);
                            if($count!=0)
                            {
                                while($request=mysqli_fetch_assoc($data))
                                {
                                    $trainer=$request['trainer'];
                                    $access=$request['access'];
                                    $locker=$request['locker'];
                                    $cardio=$request['cardio'];
                                    $steam=$request['steam'];
                                    //trainer
                                    if($trainer==1)
                                    {
                                        $trainer="Allocate";
                                    }
                                    elseif($trainer==0)
                                    {
                                        $trainer="Not Allocate";
                                    }
                                    else
                                    {
                                        echo "Some Think Worng";
                                    }
                                    //access
                                    if($access==1)
                                    {
                                        $access="Allocate";
                                    }
                                    elseif($access==0)
                                    {
                                        $access="Not Allocate";
                                    }
                                    else
                                    {
                                        echo "Some Think Worng";
                                    }
                                    //locker
                                    if($locker==1)
                                    {
                                        $locker="Allocate";
                                    }
                                    elseif($locker==0)
                                    {
                                        $locker="Not Allocate";
                                    }
                                    else
                                    {
                                        echo "Some Think Worng";
                                    }
                                    //cardio
                                    if($cardio==1)
                                    {
                                        $cardio="Allocate";
                                    }
                                    elseif($cardio==0)
                                    {
                                        $cardio="Not Allocate";
                                    }
                                    else
                                    {
                                        echo "Some Think Worng";
                                    }
                                    //steam
                                    if($steam==1)
                                    {
                                        $steam="Allocate";
                                    }
                                    elseif($steam==0)
                                    {
                                        $steam="Not Allocate";
                                    }
                                    else
                                    {
                                        echo "SomeThing Worng";
                                    }
                                    echo "<li class='scrollbar-item'>
                                        <div class='membership-card'>
                                        <div class='card-content'>
                                        <div class='pricing_box'>";

                                    echo "<span>".$request['days']." Days</span>
                                    <h2>₹".$request['amount']."/-</h2>
                                    <ul>
                                        <li>";
                                        if($trainer=="Allocate")
                                        {
                                            echo "<image src='true.png' heigth='10px'  class='true' width='15px' ></image>" ;
                                        } 
                                        else if($trainer=="Not Allocate")
                                        {
                                            echo "<image src='false.png' heigth='20px'  width='20px' class='false' ></image>";
                                        }echo "General Trainer</li>
                                        <li>";
                                        if($access=="Allocate")
                                        {
                                            echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>";
                                        } 
                                        else if($access=="Not Allocate")
                                        {
                                            echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>";
                                        }echo "Full Gym Access</li>
                                        <li>";
                                        if($locker=="Allocate")
                                        {
                                            echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                        } 
                                        else if($locker=="Not Allocate")
                                        {
                                            echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                        } echo "Locker</li>
                                        <li>";
                                        if($cardio=="Allocate")
                                        {
                                            echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                        } 
                                        else if($cardio=="Not Allocate")
                                        {
                                            echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                        }echo "Cardio</li>
                                        <li>";
                                        if($steam=="Allocate")
                                        {
                                            echo "<image src='true.png' heigth='10px'  width='15px' class='true' ></image>" ;
                                        } 
                                        else if($steam=="Not Allocate")
                                        {
                                            echo "<image src='false.png' heigth='10px'  width='15px' class='false'></image>" ;
                                        } echo "Steam</li>
                                    </ul>
                                    <form method='post' action='buy.php?pid=$request[pid]'>
                                    <input type ='submit'  name='buynow' class='custom_btn' value='Buy Now' />
                                    </form>";
                                    
                                  echo"  </div>
                                
                                </div>
                                
                                </div>
                            
                            </li>";
                            
                        }
                    }
                    else
                    {
                        echo "<h3>No membership plan Availble </h3>";
                    }

                    ?>
       
        </div>
      
      </section>


      <!-- Video Section -->

      <section class="section video" aria-label="video">
        <div class="vcontainer">
          
          <div class="video-card has-before has-bg-image" style="background-image: url(./assets/images/video-banner.jpg);">
          
            <h2 class="h2 card-title">Explore Fitness Life</h2>
          
            <button class="play-btn" aria-label="play video">
              <ion-icon name="play-sharp" aria-hidden="true"></ion-icon>
            </button>
          
            <a href="#" class="btn-link has-before">Watch More</a>
          </div>
        </div>
      </section>


      <!-- Class Section -->

      <section class="section class bg-dark has-bg-image" id="class" aria-label="class" style="background-image: url(./assets/images/classes-bg.png);">
        <div class="container">
          
          <p class="section-subtitle">Our classes</p>
         
          <h2 class="h3 section-title text-center">Fitness Classes For Every Goal</h2>
          
          <ul class="class-list has-scrollbar">
          
            <li class="scrollbar-item">
              <div class="class-card">
                
                <figure class="card-banner img-holder" style="height:240; --width:416;">
                  <img src="./assets/images/class-1.jpg" alt="Weight Lifting" class="img-cover" height="240" width="416" loading="lazy">
                </figure>
                
                <div class="card-content">
                 
                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-1.png" alt="title-icon" class="title-icon" height="52" width="52" aria-hidden="true">
                    <h3 class="h3">
                      <a href="#" class="card-title">Weight Lifting</a>
                    </h3>
                  </div>

                  <p class="card-text">
                        ClassName:Weight Lifting <br>
                        Time: 8 am<br>
                        Trainer: Ayush Parmar

                  </p>
                  
                  <div class="card-progress">
                    
                    <div class="progress-wrapper">
                      <p class="progress-label">Class Full</p>
                      <span class="progress-value">85%</span>
                    </div>  
                     
                    <div class="progress-bg">
                        <div class="progress-bar" style="width: 85%;"></div>
                    </div>
                    
                  </div>
                </div>
              
              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">
                
                <figure class="card-banner img-holder" style="height:240; --width:416;">
                  <img src="./assets/images/class-2.jpg" alt="Weight lifting" class="img-cover" height="240" width="416" loading="lazy">
                </figure>
                
                <div class="card-content">
                 
                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-2.png" alt="title-icon" class="title-icon" height="52" width="52" aria-hidden="true">
                    <h3 class="h3">
                      <a href="#" class="card-title">Cardio & Strength</a>
                    </h3>
                  </div>

                  <p class="card-text">
                        ClassName:Cardio & Strength <br>
                        Time: 8 am<br>
                        Trainer: Ayush Parmar
                  </p>
                  
                  <div class="card-progress">
                    
                    <div class="progress-wrapper">
                      <p class="progress-label">Class Full</p>
                      <span class="progress-value">70%</span>
                    </div>  
                     
                    <div class="progress-bg">
                        <div class="progress-bar" style="width: 70%;"></div>
                    </div>
                    
                  </div>
                </div>
              
              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">
                
                <figure class="card-banner img-holder" style="height:240; --width:416;">
                  <img src="./assets/images/class-3.jpg" alt="Weight lifting" class="img-cover" height="240" width="416" loading="lazy">
                </figure>
                
                <div class="card-content">
                 
                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-3.png" alt="title-icon" class="title-icon" height="52" width="52" aria-hidden="true">
                    <h3 class="h3">
                      <a href="#" class="card-title">Power Yoga</a>
                    </h3>
                  </div>

                  <p class="card-text">
                        ClassName:Power Yoga <br>
                        Time: 8 am<br>
                        Trainer: Ayush Parmar
                  </p>
                  
                  <div class="card-progress">
                    
                    <div class="progress-wrapper">
                      <p class="progress-label">Class Full</p>
                      <span class="progress-value">90%</span>
                    </div>  
                     
                    <div class="progress-bg">
                        <div class="progress-bar" style="width: 90%;"></div>
                    </div>
                    
                  </div>
                </div>
              
              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">
                
                <figure class="card-banner img-holder" style="height:240; --width:416;">
                  <img src="./assets/images/class-4.jpg" alt="Weight lifting" class="img-cover" height="240" width="416" loading="lazy">
                </figure>
                
                <div class="card-content">
                 
                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-4.png" alt="title-icon" class="title-icon" height="52" width="52" aria-hidden="true">
                    <h3 class="h3">
                      <a href="#" class="card-title">The Fitness Pack</a>
                    </h3>
                  </div>

                  <p class="card-text">
                        ClassName:The Fitness Pack <br>
                        Time: 8 am<br>
                        Trainer: Ayush Parmar
                  </p>
                  
                  <div class="card-progress">
                    
                    <div class="progress-wrapper">
                      <p class="progress-label">Class Full</p>
                      <span class="progress-value">65%</span>
                    </div>  
                     
                    <div class="progress-bg">
                        <div class="progress-bar" style="width: 65%;"></div>
                    </div>
                    
                  </div>
                </div>
              
              </div>
            </li>
         </ul>
        </div>
</section>

    </article>
  </main>


  <!-- products section -->

  <section class="section product bg-dark has-bg-image" id="products" aria-label="product" style="background-image: url(./assets/images/classes-bg.png);">
        <div class="container">
          
          <p class="section-subtitle">Products</p>
         
          <h2 class="h3 section-title text-center">Energize yourself using this products</h2>
          
          <ul class="product-list has-scrollbar">
          
           
                <?php
                $query1="select * from product";
                $data1=mysqli_query($cn,$query1);
                $count1=mysqli_num_rows($data1);
                if($count1!=0)
                {
                    while($request=mysqli_fetch_assoc($data1))
                    {
                      $pid=$request['pid'];
                      $pname=$request['pname'];
                      $price=$request['price'];
                      $img=$request['img'];
                   
                
                echo "
                 <li class='scrollbar-item'>
              <div class='product-card'>
                <figure class='card-banner img-holder' style='height:300; --width:500;'>
                  <img src='./assets/images/$img' alt='$pname' class='products' height='300' width='500' loading='lazy'>
                </figure>
                
                 <div class='product-content'>
          
                     ProductId: p$pid <br>
                     ProductName: $pname <br>
                     Price: $price/-
                 
                 </div>
                 <form method='post' action='buy3.php?pid=$request[pid]'  >
                 <input type='submit' value='Buy' class='product_btn'>
                 </form>
              </div>
            </li>";
                 }
                }
              ?>
        
        </ul>
        </div>
</section>

    </article>
  </main>



  <!-- Footer Section -->
  <footer class="footer" id="contact">

      <div class="section footer-top bg-dark has-bg-image" style="background-image: url(./assets/images/footer-bg.png);">
  
        <div class="fcontainer">
  
          <div class="footer-brand">
            <a href="index.html" class="logo">
              <ion-icon name="barbell-sharp" aria-hidden="true"></ion-icon>
              <span class="span">Fit-Buddy</span>
            </a>
  
            <p class="footer-brand-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident.
            </p>
  
            <div class="wrapper">
              <img src="./assets/images/footer-clock.png" width="34" height="34" loading="lazy" alt="clock">
  
              <ul class="footer-brand-list">
                <li>
                  <p class="footer-brand-title">Monday - Friday</p>
                  <p>7:00Am - 10:00Pm</p>
                </li>
  
                <li>
                  <p class="footer-brand-title">Saturday - Sunday</p>
                  <p>7:00Am - 2:00Pm</p>
                </li>
              </ul>
            </div>
          </div>
  
          <ul class="footer-list">
            <li>
              <p class="footer-list-title has-before">Our Links</p>
            </li>
  
            <li>
              <a href="#home" class="footer-link">Home</a>
            </li>
  
            <li>
              <a href="#about" class="footer-link">About Us</a>
            </li>
  
            <li>
              <a href="#class" class="footer-link">Classes</a>
            </li>
  
            <li>
              <a href="#blog" class="footer-link">Blog</a>
            </li>
  
            <li>
              <a href="#contact" class="footer-link">Contact Us</a>
            </li>
          </ul>
  
          <ul class="footer-list">
            <li>
              <p class="footer-list-title has-before">Contact Us</p>
            </li>
  
            <li class="footer-list-item">
              <div class="icon">
                <ion-icon name="location" aria-hidden="true"></ion-icon>
              </div>
  
              <address class="address footer-link">
                1247/Plot No. 39, 15th Phase, Colony, Kukatpally, Hyderabad
              </address>
            </li>
  
            <li class="footer-list-item">
              <div class="icon">
                <ion-icon name="call" aria-hidden="true"></ion-icon>
              </div>
  
              <div>
                <a href="tel:1800-121-3637" class="footer-link">1800-121-3637</a>
                <a href="tel:+91 555 234-8765" class="footer-link">+91 555 234-8765</a>
              </div>
            
            </li>
  
            <li class="footer-list-item">
              <div class="icon">
                <ion-icon name="mail" aria-hidden="true"></ion-icon>
              </div>
  
              <div>
                <a href="mailto:info@GymiFY.com" class="footer-link">info@GymiFY.com</a>
                <a href="mailto:services@GymiFY.com" class="footer-link">services@GymiFY.com</a>
              </div>
              
            </li>
          
          </ul>
       
          <ul class="footer-list">
            <li>
              <p class="footer-list-title has-before">Our Newsletter</p>
            </li>
  
            <li>
              <form action="" class="footer-form">
                <input type="email" name="email_address" class="input-field" aria-label="email" placeholder="Email Address" required>
  
                <button type="submit" aria-label="Submit" class="btn btn-primary">
                  <ion-icon name="chevron-forward-sharp" aria-hidden="true"></ion-icon>
                </button>
              
              </form>
            
            </li>
          
            <li>
             
              <ul class="social-list">
                <li>
                  <a href="www.facebook.com" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                 </li>
  
                <li>
                  <a href="www.facebook.com" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                  </a>
                </li>
  
                <li>
                  <a href="www.facebook.com" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>
              
              </ul>
            </li>
          </ul>
        
        </div>
  
      </div>
  
      <div class="footer-bottom">
        <div class="container">
          <p class="copyright">
            &copy; 2024 Fit-Buddy. All Rights Reserved By <a href="#" class="copyright-link">Fit-Buddy</a>
          </p>
  
          <ul class="footer-bottom-list">
           
            <li>
              <a href="#" class="footer-bottom-link has-before">Privacy Policy</a>
            </li>
  
            <li>
              <a href="#" class="footer-bottom-link has-before">Terms & Conditions</a>
            </li>
         
          </ul>
       
        </div>
      </div>
  
  </footer>



  <!-- Back to Top Section -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up-sharp" aria-hidden="true"></ion-icon>
  </a>


  <!-- Custom JS Link -->
  <script src="./assets/js/script.js" defer></script>



  <!-- ION-ICON Link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>