<?php
include 'inc/header.php';
?>


    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){

        $custLogin = $cmr->customerLogin($_POST);
    }
    ?>

    <div class="main">
        <div class="content">
            <div class="login_panel">

                <?php
                if (isset($custLogin)){
                    echo $custLogin;
                }
                ?>

                <h3>Existing Customers</h3>
                <p>Sign in with the form below.</p>
                <form action="" method="post">
                    <input name="email" type="text" placeholder="Email"/>
                    <input name="pass" type="password" placeholder="Password"/>

                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
            </div>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){

                $customerReg = $cmr->customerRegistration($_POST);
            }
            ?>

            <div class="register_account">

                <?php
                if (isset($customerReg)){
                    echo $customerReg;
                }
                ?>

                <h3>Register New Account</h3>
                <form action="" method="post">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="name"/>
                                </div>

                                <div>
                                    <input type="text" name="city" placeholder="city"/>
                                </div>

                                <div>
                                    <input type="text" name="zip" placeholder="Zip code"/>
                                </div>
                                <div>
                                    <input type="text" name="email" placeholder="Email"/>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <input type="text" name="address" placeholder="Address"/>
                                </div>
                                <div>
                                    <input type="text" name="country" placeholder="Country"/>
                                </div>

                                <div>
                                    <input type="text" name="phone" placeholder="Phone"/>
                                </div>

                                <div>
                                    <input type="text" name="pass" placeholder="Password"/>
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                    <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
                    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                    <div class="clear"></div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#"><span>Advanced Search</span></a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="#"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="faq.html">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.php"><span>Site Map</span></a></li>
                    <li><a href="preview-2.html"><span>Search Terms</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contact.php">Sign In</a></li>
                    <li><a href="index.php">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="faq.html">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Gm Shahin Hossain © All rights Reseverd </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

