
<?php
 $con = mysqli_connect("localhost","root","","aniyi_db") 
 or die ("Cannot connect to database".mysqli_connect_error());
$img = "SELECT  * FROM properties";
$query = mysqli_query($con,$img) or die ("Access denied". mysqli_error($img));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="aniyi.jpg" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
       ANIYIKAYE HOUSING REALTORS
    </title>
    <style>
          .property-slider .property-item .img img {
            object-fit: cover;  /* This will make sure the image covers the entire container */
            width: 100%;  /* Set the width to 100% to fill the container horizontally */
            height: 400px;  /* Set the fixed height for the images */
        }
        #footer{
          position: relative;
          top: 60px;
        }
</style>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
          <a href="index.php" class="logo m-0 float-start">ANIYIKAYE HOUSING REALTORS</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="index.php">Home</a></li>
              <li class="has-children">
                <a href="properties.php">Properties</a>
                <ul class="dropdown">
                  <li><a href="#">Buy Property</a></li>
                  <li><a href="#">Sell Property</a></li>
                </ul>
              </li>
              <li><a href="services.php">Services</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_3.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_2.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_1.jpg')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
          <h1 class="heading" data-aos="fade-up">
              Discover Exceptional Real Estate Opportunities in Nigeria
            </h1>
            <form
              action="#"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
            <input
                type="text"
                class="form-control px-4"
                placeholder="Enter City or Location, e.g., Lagos"
              />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Popular Properties
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="properties.php"
               
                class="btn btn-primary text-white py-3 px-4"
                >View all properties</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
              <?php
        while($row = mysqli_fetch_array($query)){
            ?>
                <div class="property-item">
                  <<a href="property-single.php? ID=<?php echo $row['ID'];?>" class="img">
                   <img src="<?php echo $row['img1']; ?>" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                                  <div class="price mb-2"><span># <?php echo $row['price'];?></span></div>
                                  <div>
                                      <span class="d-block mb-2 text-black-50"><?php echo $row['property_type'];?></span>
                                      <span class="city d-block mb-3"> <?php echo $row['location'];?></span>
      
                                      <div class="specs d-flex mb-4">
                                          <span class="d-block d-flex align-items-center me-3">
                                              <span class="icon-bed me-2"></span>
                                              <span class="caption"> <?php echo $row['beds'];?> beds</span>
                                          </span>
                                          <span class="d-block d-flex align-items-center">
                                              <span class="icon-bath me-2"></span>
                                              <span class="caption"> <?php echo $row['bath'];?> baths</span>
                                          </span>
                                      </div>
      
                                      <<a href="property-single.php? ID=<?php echo $row['ID'];?>" class="btn btn-primary py-2 px-3">See details</a>
                                  </div>
                              </div>
                          </div>
                          <!-- .item -->
                          <?php
        }
        ?>

                

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
              <span class="flaticon-house mb-4 d-block"></span>
              <h3 class="text-black mb-3 font-weight-bold">
                Quality Properties
              </h3>
              <p class="text-black-50">
                Discover a curated selection of high-quality properties that redefine modern living. Our commitment to excellence ensures that every property meets the highest standards of comfort and style.
              </p>
              <p><a href="properties.php" class="learn-more">Explore Properties</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
              <span class="flaticon-building mb-4 d-block"></span>
              <h3 class="text-black mb-3 font-weight-bold">
                Properties for Sale
              </h3>
              <p class="text-black-50">
                Explore a diverse range of properties for sale, each offering unique features and opportunities. Find your dream home or investment property with ANIYIKAYE HOUSING REALTORS.
              </p>
              <p><a href="properties.php" class="learn-more">View Listings</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature mb-4">
              <span class="flaticon-house-3 mb-4 d-block-1"></span>
              <h3 class="text-black mb-3 font-weight-bold">Houses for Sale</h3>
              <p class="text-black-50">
                Find your perfect home among our collection of houses for sale. From cozy residences to luxurious estates, we have a diverse range of options to suit every lifestyle and preference.
              </p>
              <p><a href="properties.php" class="learn-more">Explore Houses</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Client Testimonials
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>
              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>
    
        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            <div class="item">
              <div class="testimonial">
               <h3 class="h5 text-primary mb-4">Akintunde  Abdulrahman</h3>
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
               
                <blockquote>
                  <p>
                    &ldquo;I am incredibly grateful for the exceptional service provided by ANIYIKAYE HOUSING REALTORS. They went above and beyond to understand my needs and find the perfect home for me. A truly professional and trustworthy real estate partner.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Happy Homeowner</p>
              </div>
            </div>
    
            <div class="item">
              <div class="testimonial">
                <h3 class="h5 text-primary mb-4">Ibroheem Yusuf</h3>
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
              
                <blockquote>
                  <p>
                    &ldquo;ANIYIKAYE HOUSING REALTORS exceeded my expectations in every aspect. Their attention to detail, market knowledge, and personalized approach made the home buying process smooth. I highly recommend their services to anyone seeking quality real estate solutions.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Satisfied Client</p>
              </div>
            </div>
    
            <div class="item">
              <div class="testimonial">
                <h3 class="h5 text-primary mb-4">Nurudeen Sulaimon</h3>
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
               
                <blockquote>
                  <p>
                    &ldquo;ANIYIKAYE HOUSING REALTORS stands out for their professionalism and commitment. They guided me through the real estate process with expertise and ensured a seamless experience. Trustworthy and reliable, they are the go-to real estate experts in Nigeria.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Grateful Homeowner</p>
              </div>
            </div>
    
            <div class="item">
              <div class="testimonial">
                 <h3 class="h5 text-primary mb-4">Ali Toafeeq</h3>
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
              
                <blockquote>
                  <p>
                    &ldquo;My experience with ANIYIKAYE HOUSING REALTORS was exceptional. Their professionalism, integrity, and dedication made the entire process stress-free. I am grateful for their guidance in finding the perfect property. Highly recommended!&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Satisfied Home Buyer</p>
              </div>
            </div>
    
          </div>
        </div>
      </div>
    </div>

   <section class="section section-hero bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-7">
        <h2 class="font-weight-bold heading text-primary mb-4">
          Discover the Perfect Home for You
        </h2>
        <p class="text-black-50">
          Finding your dream home is just a click away. Explore our curated selection of properties tailored to your needs.
        </p>
      </div>
    </div>
    <div class="row justify-content-between mb-5">
      <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
        <div class="img-about dots">
          <img src="images/hero_bg_3.jpg" alt="Discover Your Dream Home" class="img-fluid" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-home2"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">2 Million Properties</h3>
            <p class="text-black-50">
              Explore a vast collection of homes, apartments, and estates to find the one that suits your lifestyle.
            </p>
          </div>
        </div>

        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-person"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">Top-Rated Agents</h3>
            <p class="text-black-50">
              Trust our experienced agents to guide you through the buying or selling process with expertise and care.
            </p>
          </div>
        </div>

        <div class="d-flex feature-h">
          <span class="wrap-icon me-3">
            <span class="icon-security"></span>
          </span>
          <div class="feature-text">
            <h3 class="heading">Verified Properties</h3>
            <p class="text-black-50">
              Rest assured, our listings undergo thorough verification to ensure the legitimacy of each property.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row section-counter mt-5">
      <!-- Your counter elements go here -->
    </div>
  </div>
</section>



   

<div class="site-footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>No 14 Fagbemila Street. Woru Area Agunbelewo Osogbo, Osun State</address>
              <ul class="list-unstyled links">
                <li><a href="tel://11234567890">+234 805 436 6129</a></li>
                <li><a href="tel://11234567890">+234 913 526 4249</a></li>
                <li>
                  <a href="mailto:info@aniyikayehousingrealtor@gmail.com">info@aniyikayehousingrealtor@gmail.com</a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Sources</h3>
              <ul class="list-unstyled float-start links">
                <li><a href="about.php">About us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="#">Vision</a></li>
                <li><a href="#">Mission</a></li>
              </ul>
              </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Our Vision</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
              </ul>

              <ul class="list-unstyled social">
                <li>
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
          <div class="col-12 text-center">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; Designed with love by
              <a href="tel:+234 906 744 6728">AA. Tech</a>
            </p>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->


    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>