<?php include 'header.php';?>
<div id="divBody">
  <div id="theme-contain-home">
    <div class="divBanner">
      <div id="mainslider" role="main">
        <section class="flslider">
          <div class="flexslider">
            <ul class="slides">
              <li>
                <a href="#">
                  <img src="images/123809163832.jpg" alt="">
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/123809163856.jpg" alt="">
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/123809163845.jpg" alt="">
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/123809163906.jpg" alt="">
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/123809163917.jpg" alt="">
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/slide-home-6.jpg" alt="">
                </a>
              </li>
            </ul>
          </div>
        </section>
      </div>
      <script>
        $(document).ready(function() {
          var reg = <?php echo isset($_GET['signed']) ? $_GET['signed'] : 'false' ?>;
          if (reg == true) {
            document.getElementById('header-login').click();
          }

          $('.flexslider').flexslider({
            animation: "fade",
            randomize: true,
            controlNav: false,
            directionNav: true,
            slideshowSpeed: 7000,
            animationSpeed: 600,
            randomize: false,
            start: function(slider) {
              $('body').removeClass('webloading');
            }
          });
          // Handler for .ready() called.
        });
      </script>
    </div>
    <div class="announce-box">
      <div class="w1440">
        <div class="announce-container">
          <div class="announce-icn">
            <img src="images/icn-sound.png"> Announcement
          </div>
          <div class="announce-scroll">
            <marquee id="horizontal-scrolling-msg" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()"><ul><li>Dear customer: A1BET warmly reminds you to keep your personal account information safe and do not disclose account information such as passwords, verification codes, mobile phone numbers, personal information, etc. to anyone. Beware of unnecessary financial security losses caused by information leakage. Should you have any questions, please do not hesitate to contact our 24/7 online customer service. Thank you for your support! | 尊敬的客户：顶锋娱乐温馨提示您，请保管好您的个人账号信息，切勿将密禮bsp;、验证禮bsp;、手机号禮bsp;、个人资料等账户信息透露给他人，谨防信息泄露逦nbsp;成不必要的资金安全损失，如您有任何疑问，请联系我们7X24小时在线客服，感谢您的支持！| Pelanggan yang dihormati: A1BET hendak mengingatkan semua pelanggan untuk memastikan maklumat akaun peribadi anda selamat supaya tidak mendedahkan maklumat akaun seperti kata laluan, kod pengesahan, nombor telefon mudah alih, maklumat peribadi dll. kepada sesiapa. Berhati-hati untuk mengelakkan kerugian kewangan yang disebabkan oleh kebocoran maklumat. Sekiranya anda mempunyai sebarang pertanyaan, jangan teragak-agak untuk menghubungi perkhidmatan pelanggan dalam talian 24/7 kami. Terima kasih atas sokongan anda!</li></ul></marquee>
          </div>
        </div>
      </div>
    </div>
<div class="owl-carousel owl-theme" id="subintro">  
	  <div class="item text-center">
		<img width="100%" height="auto" src="images/s1.png">
		<button class="btn-playnow mx-auto">SPORTSBOOK</button>
      </div>
	  <div class="item">
		<img width="100%" height="auto" src="images/s2.png">
		<button class="btn-playnow mx-auto">LIVE CASINO</button>
      </div>
	  <div class="item">
		<img width="100%" height="auto" src="images/s3.png">
		<button class="btn-playnow mx-auto">SLOTS</button>
      </div>
</div>


<div class="home-box info-box">
  <div class="w1440">
    <div class="info-container">
      <div class="info-promo info-boxes">
        <div class="title-top">
          <h3 class="title">NEW MEMBER PROMOTION</h3>
        </div>
        <img src="images/hot-promotions-en.png">
      </div>
      <div class="info-all info-boxes showd">
        <div class="swiper-container info-container">
          <ul class="swiper-wrapper info-wrapper">
            <li class="product swiper-slide info-slide">
              <div class="title-top">
                <h3 class="title">Products</h3>
              </div>
              <div id="carousel-prod" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <ul>
                      <li>
                        <h4 class="bigText">Live Casino</h4>
                        <p class="smallText">Multiple live dealer tables for interactive entertainment that you may choose from variety of games such as Barccarat, Dragon Tiger. Sic Bo, Roulette &amp; many more.</p>
                      </li>
                      <li>
                        <h4 class="bigText">Sportsbook</h4>
                        <p class="smallText">Providing most popular and exciting events with competitive odds in market that will gives you rich gaming experience .</p>
                      </li>
                      <li>
                        <h4 class="bigText">Slots</h4>
                        <p class="smallText">Provides variety of classic slot games with huge chances of free games with big points &amp; winnings are waiting for you .</p>
                      </li>
                    </ul>
                  </div>
                  <div class="item">
                    <ul>
                      <li>
                        <h4 class="bigText">Lottery</h4>
                        <p class="smallText">Variety of lottery games to enhance your chance of winning</p>
                      </li>
                      <li>
                        <h4 class="bigText">Promotions</h4>
                        <p class="smallText">Variety of promotion, bonuses and rebate to broaden up your earning chances.</p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="carousel-indicators">
                  <button data-target="#carousel-prod" data-slide-to="0" class="active"></button>
                  <button data-target="#carousel-prod" data-slide-to="1" class=""></button>
                </div>
              </div>
            </li>
            <li class="services swiper-slide info-slide">
              <div class="title-top">
                <h3 class="title">Support</h3>
              </div>
              <div class="item">
                <ul>
                  <li>
                    <div class="services-items">
                      <a href="https://tawk.to/chat/64e77872cc26a871b0312638/1h8k2t039" target="_blank">
                        <h4 class="bigText">
                          <img src="images/img-support-livechat.png">Live Chat
                        </h4>
                      </a>
                    </div>
                  </li>
                  <li>
                    <div class="services-items">
                      <a href="skype:A1BET_CS" target="_blank">
                        <h4 class="bigText">
                          <img src="images/img-support-skype.png">A1BET_CS
                        </h4>
                      </a>
                    </div>
                  </li>
                  <li>
                    <div class="services-items">
                      <a href="mailto:info@a1bet.cc">
                        <h4 class="bigText">
                          <img src="images/email-icon.png">
                          <span class="__cf_email__" data-cfemail="9df4f3fbf2ddfcacfff8e9b3fefe">info@a1bet.cc</span>
                        </h4>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="home-box feature-box">
  <div class="w1440">
    <div class="feature-container">
        <div class="feature-title title-top">
          <h3 class="title">Popular Slot E-Games</h3>
        </div>
      <div class="gameslist feature-list" style="padding:15px;">
	  
	  <div class="owl-carousel owl-theme" id="featuregame"> 
	  
          <div class="item">
            <a href="sportsbook.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-1.png">
              </div>
              <h3>NOVA </h3>
            </a>
          </div>
          <div class="item">
            <a href="sportsbook.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-2.png">
              </div>
              <h3>M-Sports</h3>
            </a>
          </div>
          <div class="item">
            <a href="casino.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-3.png">
              </div>
              <h3>AG Live</h3>
            </a>
          </div>
          <div class="item">
            <a href="casino.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-4.png">
              </div>
              <h3>AllBet Live</h3>
            </a>
          </div>
          <div class="item">
            <a href="games.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-5.png">
              </div>
              <h3>CQ9Slots</h3>
            </a>
          </div>
          <div class="item">
            <a href="lottery.php" class="gl-box">
              <div class="gl-img">
                <img src="images/featured-cta-6.png">
              </div>
              <h3>Lottery</h3>
            </a>
          </div>
		
      </div>
	  
      </div>
    </div>
  </div>
</div>



            <div class="showm">
              <div class="title-top">
                <h3 class="title">Support</h3>
              </div>
                    <div class="services-items" style="width: 31%; display: inline-block; margin: 0 auto;">
                      <a href="https://tawk.to/chat/64e77872cc26a871b0312638/1h8k2t039" target="_blank">
                        <h4 class="bigText text-center">
                          <img src="images/img-support-livechat.png" style="width: 100%; max-width:80px; margin: 10px auto;">
						  <span style="display: block; font-size: 13px;">Live Chat</span>
                        </h4>
                      </a>
                    </div>
                    
                    <div class="services-items" style="width: 31%; display: inline-block; margin: 0 auto;">
                      <a href="skype:A1BET_CS" target="_blank">
                        <h4 class="bigText text-center">
                          <img src="images/img-support-skype.png" style="width: 100%; max-width:80px; margin: 10px auto;">
						  <span style="display: block; font-size: 13px;">A1BET_CS</span>
						  
                        </h4>
                      </a>
                    </div>
                    
                    <div class="services-items" style="width: 31%; display: inline-block; margin: 0 auto;">
                      <a href="mailto:info@a1bet.cc">
                        <h4 class="bigText text-center">
                          <img src="images/email-icon.png" style="width: 100%; max-width:80px; margin: 10px auto;">
						  <span style="display: block; font-size: 13px;">info@a1bet.cc</span>
                        </h4>
                      </a>
                    </div>
            </div>

<div class="home-box cta-box">
  <div class="w1440">
    <div class="cta-container">
      <div class="cta-boxes cta-download">
        <div class="title-top" style="display:block; text-align:center;">
          <h3 class="title">APP Download</h3>
          <p>Premium mobile entertainment at the palm of your hand </p>
        </div>
        <div class="download-imgs">
          <a href="#" class="download-ios download-float">
            <img src="images/img-qr-ios1.png">
          </a>
          <img src="images/app-download.png" class="download-main">
          <a href="#" class="download-andriod download-float">
            <img src="images/img-qr-android1.png">
          </a>
        </div>
      </div>
      <div class="cta-boxes cta-imgs showd">
        <ul>
          <li>
            <a href="#">
              <img src="images/cta-vip-en.png">
            </a>
          </li>
          <li>
            <a href="promotions.php">
              <img src="images/cta-rewards-en.png">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<script data-cfasync="false" src="js/email-decode.min.js"></script><script type="text/javascript">
    $(function () {
        var mSwiper = new Swiper("#hotmatch", {
            spaceBetween: 10,
            slidesPerView: 3,
            loop: false,
            pagination: {
                el: '.match-pagination',
                type: 'bullets',
            },
            autoplay: {
                delay: 4000,
            }, navigation: {
                nextEl: '.match-next',
                prevEl: '.match-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 2,
                },
                600: {
                    slidesPerView: 1,
                },
            }
        });

        var iSwiper = new Swiper(".info-container", {
            slidesPerView: 2,
            loop: false,
            simulateTouch: false,

            breakpoints: {
                600: {
                    slidesPerView: 1.2,
                },
            }
        });
    });
</script>
<link rel="image_src" href="images/logo.png">
</div>
</div>

<?php include 'footer.php';?>

<script>
$('#subintro').owlCarousel({
  autoplay: true,
  rewind: true,
  margin: 20,
  loop:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 2
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});
$('#featuregame').owlCarousel({
  autoplay: true,
  rewind: true,
  margin: 10,
  loop:false,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 3
    },

    600: {
      items: 3
    },

    1024: {
      items: 5
    },

    1366: {
      items: 6
    }
  }
});
</script>