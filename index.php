<?php include "dbconn.php";?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journey: Deals</title>
  <meta name="description" content="Journey Deals page with Data Visualisation to show user trends.">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
  <style><?php include 'CSS/styles.css'; ?></style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>

</head>

<body onload='myAjaxFunction();'>
    <!-- Convert Data from Mysql to JSON Formate using PHP - https://www.youtube.com/watch?v=I4SRqAS7J8U  -->
    <section class="section-padding hero-section">
        <div class="nav-container">
            <p class="logo">Journey</p>
            <div class="global-nav-container">
                <nav class="utility-nav">
                    <p class="utility-nav-item">Help</p>
                    <p class="utility-nav-item login-btn">Login</p>
                    <p> | </p>
                    <p class="utility-nav-item s-font">A</p>
                    <p class="utility-nav-item m-font">A</p>
                    <p class="utility-nav-item l-font">A</p>
                </nav>
                <div class="global-nav">
                    <p class="global-nav-item">Book a Travel <i class="fa fa-angle-down" style="font-size:16px"></i></p>
                    <p class="global-nav-item">Deals</p>
                </div>             
            </div>
            <div class="mobile-global-nav">
                <svg style="width:48px;height:48px" viewBox="0 0 24 24">
                    <path fill="#ffffff" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                </svg>
            </div>
        </div>
        <div class="content-container">
            <div class="title-container">
                    <h1>Finding inspiration?</h1>
                    <h2 class="sub-title">Search or Explore our Deals</h2>
                    <div class="local-nav">
                        <a href="#deals" class="local-nav-item active-local-nav-item">Deals of the month</a>
                        <a href="#trends" class="local-nav-item">Travel Trends</a>
                    </div>
            </div>
            <div class="fields-container">
                <div class="white-container">
                    <div class="destination-field">
                        <label for="destination">I'm travelling from</label>
                        <input type="text" name="destination" class="destination">
                        .
                    </div>
                    <div class="dates-fields">
                        <div class="departure-date">
                            <p class="journey-direction">Out</p>
                            <p class="date">5/11/2020</p>
                        </div>
                        <div class="return-date">
                            <p class="journey-direction">Return</p>
                            <p class="date">25/11/2020</p>
                        </div>
                    </div>
                    <div class="btn-container">Search Deals</div>
                </div>
            </div>
        </div>
    </section>

    <section id="deals" class="section-padding deals-section">
        <p class="deals-title">Deals of the month</p>
        <div class="deals-container">
            <div class="deals-destination">
                <img class="deals-img" src="https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=755&q=80" alt="Taj Mahal in Mumbai, India"/>
                <div class="card-details">
                    <p class="destination-title"><strong>Mumbai,</strong> India</p>
                    <div class="destination-price-container">
                        <p class="destination-price">From <strong>£250 pp</strong></p>
                    </div>
                    <div class="destination-rating">
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                    </div>
                </div>
            </div>
            <div class="deals-destination">
                <img class="deals-img" src="https://images.unsplash.com/photo-1524293581917-878a6d017c71?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Sydney Opera house, Australia"/>
                <div class="card-details">
                    <p class="destination-title"><strong>Sydney,</strong> Australia</p>
                    <div class="destination-price-container">
                        <p class="destination-price">From <strong>£500 pp</strong></p>
                    </div>
                    <div class="destination-rating">
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                    </div>
                </div>
            </div>
            <div class="deals-destination">
                <img class="deals-img" src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="New York City Broadway, USA"/>
                <div class="card-details">
                    <p class="destination-title"><strong>New York,</strong> USA</p>
                    <div class="destination-price-container">
                        <p class="destination-price">From <strong>£475 pp</strong></p>
                    </div>
                    <div class="destination-rating">
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                    </div>
                </div>
            </div>
            <div class="deals-destination">
                <img class="deals-img" src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Tokyo Village, Japan"/>
                <div class="card-details">
                    <p class="destination-title"><strong>Tokyo,</strong> Japan</p>
                    <div class="destination-price-container">
                        <p class="destination-price">From <strong>£750 pp</strong></p>
                    </div>
                    <div class="destination-rating">
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                        <span>&#11088;</span>
                    </div>
                </div>
            </div>
        </div>
        <p class="deals-condition">* Purchase any monthly deal to travel at any of your chosen time of the year.</p>
    </section>

    <section id="trends" class="section-padding travel-trends-section">
        <p class="deals-title">Travel Trends</p>
        <div class="graph">
            <canvas id="trendChart" height="800px" width="1000px"></canvas>
        </div>

        <?php
        $sql= "SELECT DISTINCT deals FROM tbl_deals_trend"; 
        $result = mysqli_query($con, $sql); 

        echo "<select id='deal' onchange=myAjaxFunction();><option value='all'>All</option>";
        while($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row['deals']."'>".$row['deals']."</option>";
        }
        echo "</select>";

        ?>	

        <div class="graph-filters-container">
            <div class="filter-title-container">
                <p class="filter-title">Selected Deal(s) of the Month</p>
            </div>
            <div class="graph-filters">
                <div class="graph-input">
                    <input type="checkbox" id="deal1" name="deal1" value="Mumbai">
                    <label for="deal1"> Mumbai, India</label>
                </div>
                <div class="graph-input">
                    <input type="checkbox" id="deal2" name="deal2" value="Sydney">
                    <label for="deal2"> Sydney, Australia</label>
                </div>
                <div class="graph-input">
                    <input type="checkbox" id="deal3" name="deal3" value="NewYork">
                    <label for="deal3"> New York, USA</label>
                </div>
                <div class="graph-input">
                    <input type="checkbox" id="deal4" name="deal4" value="Tokyo">
                    <label for="deal4"> Tokyo, Japan</label>
                </div>
            </div>
        </div>
    </section>

    <footer class="section-padding">
        <div class="footer-menu">
            <div class="main-menu">
                <div>
                    <p>About Us</p>
                    <p>Careers</p>
                    <p>Contact Us</p>
                </div>
                <div>
                    <p>Terms & Conditions</p>
                    <p>Privacy Policy</p>
                    <p>Refund/Cancellation</p>
                </div>
            </div>
            <div class="tools-tips-section">
                <p class="tools-title">Tools & Tips</p>
                <div class="tools-menu">
                    <div class="tools-tips">
                        <p>Top Destinations</p>
                        <p>Deals & Offers</p>
                    </div>
                    <div class="tools-tips">
                        <p class="travel-title">Book a Travel</p>
                        <div class="travel-types">
                            <p>Flights</p>
                            <p>Trains</p>
                            <p>Coaches</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-icons">
            <div class="social-medias">
                <img class="social-media-icon" src="https://image.flaticon.com/icons/svg/179/179319.svg" alt="facebook"/>
                <img class="social-media-icon" src="https://image.flaticon.com/icons/svg/145/145812.svg" alt="twitter"/>
            </div>
            <div class="payment-icons">
                <img class="payment-media-icon" src="https://image.flaticon.com/icons/svg/179/179457.svg" alt="visa"/>
                <img class="payment-media-icon" src="https://image.flaticon.com/icons/svg/196/196561.svg" alt="mastercard"/>
                <img class="payment-media-icon" src="https://image.flaticon.com/icons/svg/196/196566.svg" alt="pay pal"/>
            </div>
        </div>
        <div class="copyright-info">
            <p>Copyright © 2020 Journey plc. All rights reserved. Journey plc is registered in England and Wales. Company No. 12345678. Registered address: Nottingham Trent University, Nottingham Trent University, Clifton Lane, Clifton, Nottingham NG11 8NS. VAT number: 123 4567 89.</p>
        </div>
    </footer>

  <!-- <script type="text/javascript" src="js/scripts.js"></script> -->
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>

