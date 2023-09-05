<?php include('header.php');?>

        <div class="container">
            <div class=""> 
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-5 jbm-login-side">  
                                    <i class="fa fa-lightbulb-o margin-bottom-50" aria-hidden="true"></i>
                                    <span class="section-tit-line"></span>
                                    <h3 class="margin-bottom-60">Login</h3>
                                    <ul>
                                        <li>
                                            <a href="#">Not yet registered? </a>
                                        </li>
                                        <li>
                                            <a href="#">Register Here</a>
                                        </li>
                                    </ul>

                                    <ul class="jbm-social-icons">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                            </div>
                            
                            <div class="col-md-7 jbm-form regis">
                                <ul class="jbm-login-form padding-top-40">
                                    <li class="candidate <?php if(!isset($cur) || @$cur =="worker") {echo 'selected';}?>" data-tab="tab1">
                                        <a href="#">Worker</a>
                                    </li>
                                    <li  class="employer <?php if(@$cur =="client") {echo 'selected';}?>" data-tab="tab2">
                                        <a href="#">Client</a>
                                    </li>
                                </ul>
                        <form method="post" action="<?php echo site_url('visitor/login/login_worker'); ?>">
                        <input type="hidden" name="cur_tab" value="worker">
                                <div class="jbm-field <?php if(!isset($cur) || @$cur=='worker'){echo 'current';}?> login-style margin-top-60" id="tab1">

                             <?php if($this->session->flashdata('success_worker')){ ?>
                                
                            <div class="jbm-notification jbm-success">
                                <span>
                                    <i class="fa fa-check"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('success_worker'); ?></p>
                            </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('invalid')){ ?>
                                
                            <div class="jbm-notification jbm-fail">
                                <span>
                                    <i class="fa fa-close"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('invalid'); ?></p>
                            </div>
                                <?php } ?>
                             <?php if($this->session->flashdata('invalid_worker')){ ?>
                                
                            <div class="jbm-notification jbm-fail">
                                <span>
                                    <i class="fa fa-close"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('invalid_worker'); ?></p>
                            </div>
                                <?php } ?>
                                    <div class="col-md-12">
                                        <div class="form-group <?php if(set_value('email')){ echo 'field-active';}?>">
                                            <br>
                                            <input type="email" value="<?php if(set_value('email')){echo set_value('email');}else{echo @$record['email'];} ?>"  name="email" id="email" class="form-control">
                                            <label for="email-address">Email Address*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <label for="new-pass2">Enter Password*</label>
                                        </div>
                                    </div>
                                    
                                   <input type="submit" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20" value="Login">
                                    <div class="row margin-bottom-40">
                                        <div class="col-md-7">
                                           <div class="terms style3">
                                                <input type="checkbox" id="c4" name="cc">
                                                <label for="c4"><span></span></label>
                                                <small>Keep me logged in</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="<?php echo site_url('visitor/login/worker_forget_password'); ?>" class="forgot">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-30">
                                        <div class="col-md-5 or">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="jbm-or">
                                                <span class="or">OR</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 or">
                                        </div>
                                    </div>

                                    <div class="jbm-social-icons-2 style3">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div></form>
                                <form method="post" action="<?php echo site_url('visitor/login/login_client'); ?>">
                                    <input type="hidden" name="cur_tab" value="client">
                                <div class="jbm-field <?php if(@$cur=='client'){echo 'current';}?> login-style margin-top-60" id="tab2">
                                    <?php if($this->session->flashdata('success_client')){ ?>
                                
                            <div class="jbm-notification jbm-success">
                                <span>
                                    <i class="fa fa-check"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('success_client'); ?></p>
                            </div>
                                <?php } ?>
                                     <?php if($this->session->flashdata('invalid_client')){ ?>
                                
                            <div class="jbm-notification jbm-fail">
                                <span>
                                    <i class="fa fa-close"></i>
                                </span>
                                <p><?php  echo @$this->session->flashdata('invalid_client'); ?></p>
                            </div>
                                <?php } ?>
                                    <div class="col-md-12">
                                        <div class="form-group <?php if(set_value('email')){ echo 'field-active';}?>">
                                            <br><br>
                                            <input type="text" name="email" id="email" class="form-control">
                                            <label for="email-address">Email Address*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <label for="new-pass2">Enter Password*</label>
                                        </div>
                                    </div>
                                   <input type="submit" class="jbm-button jbm-button-3 jbm-hover margin-bottom-40 margin-top-20" value="Login">
                                    <div class="row margin-bottom-40">
                                        <div class="col-md-7">
                                           <div class="terms style3">
                                                <input type="checkbox" id="c4" name="cc">
                                                <label for="c4"><span></span></label>
                                                <small>Keep me logged in</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="<?php echo site_url('visitor/login/client_forget_password'); ?>" class="forgot">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-30">
                                        <div class="col-md-5 or">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="jbm-or">
                                                <span class="or">OR</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 or">
                                        </div>
                                    </div>

                                    <div class="jbm-social-icons-2 style3">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- <div class="close-btn">
                                <i class="fa fa-close"></i>
                            </div> -->
                        </div>
                    </div>
        </div>
    </div><!--jbm-login-popup end-->

</div><!--jbm-can-register-popup end-->

<!-- end -->

     <footer>
        <div class="footer-widget-container padding-top-115 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-text">
                            <img src="<?php echo base_url('assets/visitor/img/my_logo.png')?>" style="height:70px;width:210px" alt="footer-logo" class="img-responsive margin-bottom-30" />
                            <p>
                                FindExpert is a platform that has been designed to help both employers and candidates achieve success. We have more than 20 years of experience and we are growing stronger each and every day.
                                <a href="#">Read More..</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">need help?</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="how-it-works.html">How it Works</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="faqs.html">FAQ</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="terms-and-conditions.html">Terms & Conditions</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="contact-us.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="widget ">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Useful Links</h6>
                            <ul class="widget-links">
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="404.html">404 Error</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="pricing-plans.html">Pricing Plans</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="career-FindExpert.html">Career at FindExpert</a>
                                </li>
                                <li>
                                     <i class="fa fa-angle-right" aria-hidden="true"></i><a href="sitemap.html">Sitemap</a>
                                </li>
                            </ul>
                    </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="widget last-widget">
                            <h6 class="uppercase margin-top-0 margin-bottom-55">Subscribe to our Newsletter</h6>
                            <div class="widget-subscribe">
                                <div class="form-group subsribe-email">
                                    <label for="subs-email" class="subs-email-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 14 14" xml:space="preserve" ><g><g><path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986 c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z" fill="#c4c4c4"/><path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8 L13.684,2.271z" fill="#c4c4c4"/><polygon points="0,2.878 0,11.186 4.833,7.079 " fill="#c4c4c4"/><polygon points="9.167,7.079 14,11.186 14,2.875 " fill="#c4c4c4"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </label>
                                    <input type="email" name="bs-suemail" id="subs-email" class="form-control" placeholder="Enter your email address" />
                                </div>
                                <div class="form-group">
                                   <input type="submit" class="jbm-button jbm-button-3" id="subscribe-btn" name="subscribe-btn" value="Subscribe">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-bar main-2nd-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 hidden-xs hidden-sm text-left">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-2 text-center back-top">
                        <a href="#" class="back-top-button">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="#" class="back-top-link">Back to Top</a>
                    </div>
                    <div class="col-md-5 text-right">
                        <ul class="list-none jbm-social-icon-1 ">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 hidden-md hidden-lg text-center">
                        <p>Made with <i class="fa fa-heart"></i> by PSD_Market. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="jbm-overlay jbm-2nd-bg"></div>
    <!-- Scripts -->
   <script src="<?php echo base_url('assets/visitor/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/visitor/js/counter.js')?>"></script>
    <script src="<?php echo base_url('assets/visitor/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/slick/slick.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/lib/select2/js/select2.full.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/visitor/js/custom.js')?>" type="text/javascript"></script>

</body>


<!-- Mirrored from demo.diothemes.com/html/FindExpert/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2019 13:28:21 GMT -->
</html>
