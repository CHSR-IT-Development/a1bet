<?php include 'lib.php'; ?>
<?php include 'apis.php' ?>
<!DOCTYPE html>
<html>

<head>
  <title>A1BET - Welcome to A1BET</title>
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="css/swiper.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script language="JavaScript" src="js/common.js"></script>
  <script language="JavaScript" src="js/jquery.latest.min.js"></script>
  <script language="JavaScript" src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script language="JavaScript" src="js/jquery.url.js"></script>
  <script language="JavaScript" src="js/bootstrap.min.js"></script>
  <script language="JavaScript" src="js/jquery.flexslider.js"></script>
  <script language="JavaScript" src="js/jQuery.base64.js"></script>
  <script language="JavaScript" src="js/swiper.min.js"></script>

  <style type="text/css" media="screen"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="css/custom.css?v4">
  <link rel="shortcut icon" href="images/icn-fav.png" type="image/png">
</head>

<style>
  /* Style for the dropdown menu items */
  .dropdown-menu .dropdown-item {
    font-size: 16px;
    padding: 10px;
  }

  /* Add a line break between menu items */
  .dropdown-item:first-child {
    border-bottom: 1px solid #ccc;
  }
</style>

<?php
session_start();
$credit = 0;
$loggedIn = false;
if (isset($_SESSION['session'])) {
  $currSessionId = getPlayerCurrentSession($conn, $_SESSION['id']);
  if ($currSessionId['current_session_id'] !== $_SESSION['session']) {
    $_SESSION = array();
    session_destroy();    
  }
  else {
    $loggedIn = true;
    $thirdPartyAPIResponse = getbalance_api($_SESSION['user_name']);
    if ($thirdPartyAPIResponse['Error'] === 0) {
      $credit = $thirdPartyAPIResponse['Balance'];
    } else {
      echo 'Game API returned an error. code: ' . $thirdPartyAPIResponse['Error'];
    }
  }
} 

$balance = 'RM' . number_format($credit, 2, '.', ',');
?>

<body>
  <div id="body-container">


    <div id="divHeader">
      <div class="headertop">
        <div class="headertop-container">
          <div class="headertop-left">
            <div class="header-menubtn">
              <div class="btn-menu" id="btnMenu" data-toggle="modal" data-target="#divMenu">
                <div>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
            </div>
            <div class="header-logo">
              <div class="deks-view">
                <a href=<?php echo rootUrl() ?>>
                  <img src="images/logo3.png" class="logo">
                </a>
              </div>
              <div class="mob-view">
                <img src="images/logotrans.png">
              </div>
            </div>
          </div>
          <div class="headertop-right">
            <div class="htr-top">
              <ul class="htr-auth">
                <li class="auth-box time windowOnly">
                  <div class="d-flex">
                    <div id="Date" class="time-box">00/00/0000</div>
                    <div id="Time" class="time-box">
                      <span id="hours">00</span>
                      <span class="mytimeflash">:</span>
                      <span id="min">00</span>
                      <span class="ap">AM</span>
                      <span id="GMT"></span>                      
                    </div>
                  </div>
                </li>
                <?php if (!isset($_SESSION['id'])) { ?>
                  <li class="auth-box auth-login">                    
                    <a href="#loginModal" class="btn-lr btn-login button btn-auth" id="header-login" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">LOGIN</a>
                  </li>
                  <li class="auth-box auth-register">
                    <a href="register.php" class="btn-auth btn-register btn-lr" id="header-register">SIGN-UP</a>
                  </li>
                <?php } else { ?>
                  <span class="auth-user" style="color: #0dcb52"> <?php echo $balance; ?> </span>
                  <li class="auth-box auth-login dropdown">
                    <a class="btn-lr btn-login button btn-auth dropdown-toggle" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 16px;">
                      <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                      <div class="dropdown-item"><a href="profile.php" style="color: #5ec6f1;">My Account</a></div>
                      <div class="dropdown-item"><a href="handlers/logoutHandler.php" id="header-logout" style="color: #5ec6f1;">Log Out</a></div>
                    </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <div class="htr-bottom showd">
              <ul class="htr-icon">
                <li class="htr-box">
                  <a class="" href="cn/index.php">
                    <img src="images/icn-language.png">简体中文 </a>
                </li>
                <li class="htr-box">
                  <a class="" href="ms/index.php">
                    <img src="images/icn-language.png">Bahasa </a>
                </li>
                <li class="htr-box">
                  <a class="" href="#">
                    <img src="images/icn-affiliate.png">AFFILIATE </a>
                </li>
                <li class="htr-box">
                  <a href="promotions.php">
                    <img src="images/icn-reward.png">REWARDS </a>
                </li>
                <li class="htr-box">
                  <a href="refer.php">
                    <img src="images/icn-referfriend.png">REFER A FRIEND </a>
                </li>
                <li class="htr-box htr-theme"> DARK MODE <div class="switch" id="wi">
                    <input id="btnTheme" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                    <label for="btnTheme"></label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="menumd showm">
        <a href="index.php" class="active">HOME</a> | <a href="sportsbook.php">SPORTSBOOK</a> | <a href="casino.php">LIVE CASINO</a> | <a href="games.php">E-GAMES</a> | <a href="lottery.php">LOTTERY</a>
      </div>


      <div class="headerMenu">
        <div class="headerbottom-wrapper">
          <div class="header-menu">
            <div id="divMenu" class="modal modal-menu fade" tabindex="-1" role="dialog" aria-hidden="true">
              <div id="menuContainer" class="modal-dialog">
                <div id="cssmenu" class="cmsmenu">
                  <ul>
                    <li class="active">
                      <a href="index.php" target="_self">HOME</a>
                    </li>
                    <li class="has-sub ">
                      <a href="sportsbook.php" target="_self">SPORTSBOOK</a>
                      <ul>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-esport.png">
                            <p>E SPORT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-isport.png">
                            <p>I SPORT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-msport.png">
                            <p>M SPORT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-novam.png">
                            <p>NOVA SPORT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-sbobet.png">
                            <p>SBOBET</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="sportsbook.php" target="_self">
                            <img src="images/nav-ssport.png">
                            <p>S SPORT</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="has-sub ">
                      <a href="casino.php" target="_self">LIVE CASINO</a>
                      <ul>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-allbet.png">
                            <p>ALLBET</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-asiagaming.png">
                            <p>ASIA GAMING</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-bggaming.png">
                            <p>BG CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-dreamgaming.png">
                            <p>DREAM GAMING</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-extreme.png">
                            <p>EXTREME CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-ezugi.png">
                            <p>EZUGI</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-fgg.png">
                            <p>FGG CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-golddeluxe.png">
                            <p>GOLD DELUXE</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-king855.png">
                            <p>KING855</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-ls.png">
                            <p>LUCKY STREAK</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-pp_casino.png">
                            <p>PRAGMATIC CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-sacasino.png">
                            <p>SA CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-sexybaccarat.png">
                            <p>SEXY BACCARAT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-wm.png">
                            <p>WM CASINO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="casino.php" target="_self">
                            <img src="images/nav-evogaming.png">
                            <p>EVO GAMING</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="has-sub ">
                      <a href="games.php" target="_self">E-GAMES</a>
                      <ul>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-ace333.png">
                            <p>ACE333</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-betsoft.png">
                            <p>BETSOFT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-bggame.png">
                            <p>BG GAMES</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-bng.png">
                            <p>BNG</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-cq9.png">
                            <p>CQ9 GAMING</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-dgslot.png">
                            <p>DG SLOT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-dreamtech.png">
                            <p>DREAMTECH</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-genesis.png">
                            <p>GENESIS</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-glabalfish.png">
                            <p>GLOBAL FISH</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-habanero.png">
                            <p>HABANERO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-jili.png">
                            <p>JILI GAMING</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-joker.png">
                            <p>JOKER</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-kingmaker.png">
                            <p>KINGMAKER</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-mgslot.png">
                            <p>MG SLOT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-pgsoft.png">
                            <p>PG SOFT</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-playtech.png">
                            <p>PLAYTECH</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-png.png">
                            <p>PLAY'N GO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-pp_games.png">
                            <p>PRAGMATIC PLAY</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-sagaming.png">
                            <p>SA GAMING</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-skywind.png">
                            <p>SKYWIND</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-vt.png">
                            <p>VIRTUAL TECH</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="games.php" target="_self">
                            <img src="images/nav-ygg.png">
                            <p>YGGDRASIL</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="has-sub ">
                      <a href="lottery.php" target="_self">LOTTERY</a>
                      <ul>
                        <li class="">
                          <a href="lottery.php" target="_self">
                            <img src="images/nav-keno.png">
                            <p>KENO</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="lottery.php" target="_self">
                            <img src="images/nav-leg.png">
                            <p>LEG POKER</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="lottery.php" target="_self">
                            <img src="images/nav-mpoker.png">
                            <p>M POKER</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="lottery.php" target="_self">
                            <img src="images/nav-v8poker.png">
                            <p>V8 POKER</p>
                          </a>
                        </li>
                        <li class="">
                          <a href="lottery.php" target="_self">
                            <img src="images/nav-texasholdem.png">
                            <p>TEXAS HOLD'EM</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="">
                      <a href="promotions.php" target="_self">PROMOTION</a>
                    </li>
                  </ul>
                </div>
                <div class="mobileOnly" id="menuHead">

                  <ul class="htr-icon" style="float:right;">
                    <li class="htr-box htr-theme">
                      DARK MODE
                      <div class="switch" id="wi">
                        <input id="btnTheme" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" wtx-context="61618F39-4CF0-440E-8734-9444379466B9">
                        <label for="btnTheme"></label>
                      </div>
                    </li>
                  </ul>



                  <div class="menuhead-logo">
                    <div class="deks-view">
                      <img src="images/logo.png" class="logo">
                    </div>
                    <div class="mob-view">
                      <img src="images/logo.png">
                    </div>
                  </div>

                  <img src="images/hot-promotions-en.png" width="100%" height="auto" style="padding-top:6px;">
                  <div class="menuhead-auth">
                    <?php if (!isset($_SESSION['id'])) { ?>
                      <div class="auth-login auth-box">
                        <button class="btn-lr btn-login button btn-auth" id="header-login" data-toggle="modal" data-target="#loginModal">LOGIN</button>
                      </div>
                      <div class="auth-box auth-register">
                        <a href="register.php" class="btn-auth btn-register btn-lr" id="header-register" style="width:100%;">SIGN UP</a>
                      </div>
                    <?php } else { ?>
                      <div class="auth-login auth-box">
                        <?php echo $_SESSION['user_name'] ?>
                      </div>
                      <div class="auth-box auth-logout">
                        <button class="btn-auth btn-logout btn-lr" id="header-logout" style="width:100%;">LOG OUT</button>
                      </div>
                    <?php } ?>
                    <script>
                      $(document).ready(function() {
                        let loggedIn = <?php echo $loggedIn ? 1 : 0 ?>;
                        let rootURL = '<?php echo rootURL() ?>/';
                        if (loggedIn == 0 && window.top.location.href !== rootURL) {
                          alert("Logged in other location or browser.");
                          window.top.location.href = rootURL;
                        }

                        $('#header-logout').click(function(e) {
                          e.preventDefault(); // Prevent the default behavior of the button

                          $.ajax({
                            type: 'POST',
                            url: 'handlers/logoutHandler.php',
                            success: function(response) {
                              console.log(response);

                              // Handle success - you might want to redirect user or display a message
                              window.top.location.href = rootURL; // Reload the page or redirect to the login page
                            },
                            error: function(error) {
                              // Handle error - display error message or something similar
                              console.log('Error during logout', error);
                            }
                          });
                        });
                      });
                    </script>
                  </div>

                  <div class="menumobilez">
                    <a href="index.php"><img src="icon/menu-home.png"> HOME</a>
                    <a href="sportsbook.php"><img src="icon/menu-ball.png"> SPORTSBOOK</a>
                    <a href="casino.php"><img src="icon/menu-card.png"> LIVE CASINO</a>
                    <a href="games.php"><img src="icon/menu-cherry.png"> E-GAMES</a>
                    <a href="lottery.php"><img src="icon/menu-snooker.png"> LOTTERY</a>
                    <a href="promotions.php"><img src="icon/menu-discount.png"> LOTTERY</a>
                  </div>

                  <div class="selmnb">

                    <a class="" href="#"><img src="images/icn-affiliate.png">AFFILIATE</a>
                    <a href="promotions.php"><img src="images/icn-reward.png">REWARDS</a>
                    <a href="refer.php"><img src="images/icn-referfriend.png">REFER A FRIEND</a>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>