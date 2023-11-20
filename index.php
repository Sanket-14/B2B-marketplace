
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title style="color: black;">VoltBridge</title>

    
        
        <style>
        .search-btn{
            height:38px;
            /* margin-top:-4px; */
            padding: 5px;
            margin-right: 20px;
    text-decoration: none;
    color: black;
    padding: 8px 15px;
    border: 2px solid black;

    border-radius: 5px;
    background-color: limegreen; /* Background color for the links */
        }

        .search-btn:hover{
            background-color: limegreen; /* Change background color to white on hover */
    color: white; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }
    </style>

    
</head>
<body>
    <div class="preloader">
        <span class="preloader__circle"></span>
        <span class="preloader__circle preloader__circle--two"></span>
    </div>

    <a href="#" class="go-top" aria-label="Go back to top"><i class="fa-solid fa-chevron-up"></i></a>
    
    <nav>
        <a  href="#" class="nav__logo">
            <img style="margin-top: -15px; margin-left:-65px" src="./images/logo_blue.png" alt="Logo | VoltBridge" class="nav__logo-white" height="50" width="40">
            VoltBridge
        </a>
        <ul class="nav__links">
            <li><a href="#header" class="header-link">Home</a></li>
            <li><a href="add_listing.php" class="features-link">Add your Company</a></li>
            <li><a href="#login" class="overview-link">Login</a></li>
            <li><a href="#language" class="pricing-link"><i class="ri-global-line"></i></a></li>
        </ul>
        <div class="nav__menu">
            <div class="hamburger"></div>
        </div>
    </nav>
<!-- * -->
    <!--Main Div for the entire hero image-->
    <div class="hero">
        <!--Function to randomly pick an image from array-->
        <script type="text/javascript">
            $(function() {
                //array of images, I named them in numerical order for simplicty
               var images = ['b2b.jpg', 'b2b2.jpg', 'b2b3.jpeg', 'b2b4.jpg', 'B2B5.jpg', 'b2b6.jpg'];
            //jQuery function contains path to images, and function to call a random image, please note the url is the correct path to your images!
            $('.hero').css({'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')'});
                });
             </script>

          <div class="container text-center">
            <div class="row">
              <div class="col-md-12">
              </div>
            </div>
            <!--Website Name-->
            <div class="col-md-12" style="margin-top:-200px">
                <!--Website Tagline-->
             <h3><p height="80px">Empowering Businesses to thrive by providing innovative solutions and</p>
                                   <p> services that foster growth, efficiency, and long-term success.</p></h3>
                <!--Button that should link to the next section of your website-->
                <?php 
                require('dbcon.php');
                ?> 
                <div class="search-container">
                    <!-- <h1 style="text-align: center; color: #fff;">VoltBridge Search</h1> -->
                    <form style="display: flex;" action="listing.php" method="GET">
                        <input style="width: 500px; border:2px solid black;" class="form-control" type="text" name="search" placeholder="Enter the service e.g plastic , Driveunit..">
                        <button class="search-btn" type="submit"><h5 style="margin-top:-4px">search</h5></button>
                    </form>
                </div>  
                         
            </div>
        </div>    
    </div> 
    <!-- * -->

    <div class="features nav-section" id="features">
        <section class="features__text">
            <h2 class="fadeFromTop">Your Experience Gets Better And Better Over Time.</h2>
            <p class="fadeFromTop">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </section>
    </div>

    <div class="overview nav-section" id="overview">
        <div class="overview-flex fadeFromTop">
            <section class="overview-flex__text">
                <h2>Add your Company on VoltBridge</h2>
                <p>Maximize your VoltBridge profile with targeted keywords, highlighting expertise, 
                    quality products, and key certifications. 
                    Actively engage in the community, update regularly, 
                    and leverage analytics</p>
                <a href="#" class="overview-flex__text-link">Get Started</a>
            </section>
            <div class="overview-flex__img">
                <img src="./images/app-ss1.png" alt="">
            </div>
        </div>
        <section class="overview__facts">
            <h2 class="fadeFromTop">Trusted by developers from over 80 planets</h2>
            <p class="fadeFromTop">There are many variations of passages of Lorem Ipsum available, but the majority.</p>
            <div class="fact-flex fadeFromTop">
                <section class="fact-flex__column">
                    <h3>100%</h3>
                    <p>Satisfaction</p>
                </section>
                <section class="fact-flex__column">
                    <h3>120K</h3>
                    <p>Happy Users</p>
                </section>
                <section class="fact-flex__column">
                    <h3>125k+</h3>
                    <p>Downloads</p>
                </section>
            </div>
        </section>
    </div>

    <div class="blogs nav-section" id="blog">
        <section class="blogs__text">
            <h3 class="fadeFromTop">Blogs</h3>
            <h2 class="fadeFromTop">Our Latest News</h2>
            <p class="fadeFromTop">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </section>
        <div class="blogs__grid">
            <a href="blog.html" class="blog fadeFromTop" aria-label="blog | Appvilla">
                <div class="blog__img">
                    <img src="./images/blog-1.jpg" alt="blog">
                </div>
                <div class="blog__text">
                    <h5>Blog</h5>
                    <h4>Boost your conversion rate</h4>
                    <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt dolore magna.</p>
                    <div class="blog__text-profile">
                        <img src="./images/comment1.jpg" alt="Roel Aufderhar">
                        <div>
                            <h5>Roel Aufderhar</h5>
                            <p>Mar 15,2023<span>*   </span>5 min read</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="blog.html" class="blog fadeFromTop" aria-label="blog | Appvilla">
                <div class="blog__img">
                    <img src="./images/blog-2.jpg" alt="blog">
                </div>
                <div class="blog__text">
                    <h5>Video</h5>
                    <h4>How to use search engine</h4>
                    <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt dolore magna.</p>
                    <div class="blog__text-profile">
                        <img src="./images/comment2.jpg" alt="Jenifer Zuliya">
                        <div>
                            <h5>Jenifer Zuliya</h5>
                            <p>Feb 10,2023<span>*   </span>7 min read</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="blog.html" class="blog fadeFromTop" aria-label="blog | Appvilla">
                <div class="blog__img">
                    <img src="./images/blog-3.jpg" alt="blog">
                </div>
                <div class="blog__text">
                    <h5>Marketing</h5>
                    <h4>Awesome ways to boost sales</h4>
                    <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt dolore magna.</p>
                    <div class="blog__text-profile">
                        <img src="./images/comment3.jpg" alt="Roel Aufderhar">
                        <div>
                            <h5>Roel Aufderhar</h5>
                            <p>Jan 20,2023<span>*   </span>6 min read</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <!-- <footer>
        <div class="footer__top">
            <div class="footer__intro">
                <a href="#"><img src="./images/logo1.png" alt="Home | Appvilla" class="footer__intro--logo"></a>
                <p><b>Empowering businesses to thrive by providing innovative solutions and </b></p>
                <p><b>services that foster growth, efficiency, and long-term success.</b></p>
                <ul class="footer__intro--media-links">
                    <li><a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#" aria-label="Linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="#" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
                <section class="footer__grid">
                    <h3>Company</h3>
                    <ul class="footer__grid--list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </section>
                <section class="footer__grid">
                    <h3>Legal</h3>
                    <ul class="footer__grid--list">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </footer> -->
    <?php
    include 'footer_home.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <!--Bootstrap jQuery and Javascript-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>