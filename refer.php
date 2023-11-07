<?php
include 'header.php';
?>

<style>
  #referral .tabs {
    max-width: 700px;
    margin: 20px auto;
  }

  #referral .tabs-nav li {
    float: left;
    width: 25%;
  }

  #referral .tabs-nav li:first-child a {
    border-right: 0;
    border-top-left-radius: 6px;
  }

  #referral .tabs-nav li:last-child a {
    border-top-right-radius: 6px;
  }

  #referral a {
    background: #5ec6f1;
    border: 1px solid #ffffff;
    color: #ffffff;
    display: block;
    font-weight: 600;
    padding: 10px 0;
    text-align: center;
    text-decoration: none;
    font-size: 12px;
    line-height: 1;
  }

  #referral a:hover {
    color: #fff;
    background: #244091;
  }

  #referral .tab-active a {
    background: #244091;
    border-bottom-color: transparent;
    color: #ffffff;
    cursor: default;
  }

  #referral .tabs-stage {
    border: 1px solid #cecfd5;
    border-radius: 0 0 6px 6px;
    border-top: 0;
    clear: both;
    padding: 24px 30px;
    position: relative;
    top: -1px;
  }

  #referral ul,
  #referral ol {
    margin-left: 0;
    margin-bottom: 0;
  }

  #referral li {
    list-style-type: none;
  }

  .sharer img {
    width: 50px;
    height: auto;
    display: inline-block;
  }

  .sharer a {
    display: inline-block !important;
    border: none !important;
    background-color: transparent !important;
  }

  .bbz {
    background-color: #e49e24;
    color: #fff;
    padding: 3px 5px;
    width: 48%;
  }

  #myInput,
  .inprt {
    padding: 3px 5px;
    background: #244091;
    color: #ffffff;
    width: 25%;
  }

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 13px;
  }

  td,
  th {
    border: 1px solid #d9e3ff;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #d9e3ff;
  }

  ::-ms-input-placeholder {
    /* Edge 12-18 */
    color: #fff;
  }

  ::placeholder {
    color: #fff;
  }

  @media only screen and (max-width: 600px) {
    #referral li a {
      min-height: 50px;
    }

    .bbz {
      margin-top: 5px;
      width: 100%;
    }

    #myInput,
    .inprt {
      width: 49%;
    }
  }
</style>


<?php
if (!isset($_SESSION['id'])) {
  $id = null;
  $level = 0;
  $regaccounts = array(0, 0);
  $commisionrate = array(0.00, 0.00);
} else {
  $id = $_SESSION['id'];
  $stmt = $conn->prepare("SELECT * FROM players WHERE id = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $level = calculateLevel($conn, $user['id']);
  $regaccounts = registerAccounts($conn, $user['id']);
  $commisionrate = getCommissionByLevel($conn);
  $referees = getCommissionReferees($conn, $user['id']);

  $beginDate = date('Y-m-d', strtotime($user['timestamp']));
  $endDate = date('Y-m-d', time());
  // $beginDate = date('Y-m-d', strtotime($endDate . " -89 days"));
  // updatePlayerDailyReportOnDB($conn, $beginDate, $endDate);
  $report = getReferralTurnOver($beginDate, $endDate, $referees);
  $turnover = $report['turnover'];
  $commission = $report['commission'];
  $commisionearned = $commission[0] + $commission[1];
}

// Execute statement
?>
<div id="divBody">
  <div id="theme-contain-home">
    <div id="referral">
      <div class="tabs">
        <ul class="tabs-nav">
          <li><a href="#tab-1">My Share</a></li>
          <li><a href="#tab-2">Downline Inquiry</a></li>
          <li><a href="#tab-3">Performance Inquiry</a></li>
          <li><a href="#tab-4">Referral Info</a></li>
        </ul>
        <div class="tabs-stage">
          <div id="tab-1">
            <main style="max-width:300px; margin:0 auto; text-align:center">
              <h3>MY QR CODE</h3>
              <img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&choe=UTF-8&chl='<?php echo (rootUrl() . "/register.php?id=" . ($id ? $user['ref_code'] : null)) ?>'" width="100%" height="auto">
              <a href="#" class="btn-auth btn-register btn-lr" id="header-register" style="width: 100%; border-radius: 0; font-size: 16px;">SCAN QR CODE</a>
            </main>
            <p>Refferal ID: <b><?php echo $id ? $user['ref_code'] : "You can see your ID after logged in."; ?></b></p>
            <p><input type="text" value=<?php echo (rootUrl() . "/register.php?id=" . ($id ? $user['ref_code'] : null)) ?> id="myInput" disabled>
              <button onclick="copyReferalLink()" class="bbz">COPY</button>
            </p>
            <?php
            $text = "I am inviting you to join this game. Register now: " . rootUrl() . "/register.php?id=" . ($id ? $user['ref_code'] : null);
            $encodedText = urlencode($text);
            $whatsAppUrl = "https://wa.me/?text=" . $encodedText;
            ?>
            <p class="sharer">Share Link: <a href="<?php echo $whatsAppUrl ?>" style="background-color:transparent;"><img src="images/wa.png"></a> <img src="images/wechat.png"></p>
            <table>
              <tr>
                <td>SHARE LINK CLICK</td>
                <td><b>0</b></td>
              </tr>
              <tr>
                <td>DOWNLINE LEVEL 1</td>
                <td><b><?php echo $regaccounts[0] ?></b></td>
              </tr>
              <tr>
                <td>DOWNLINE LEVEL 2</td>
                <td><b><?php echo $regaccounts[1] ?></b></td>
              </tr>
              <tr>
                <td>TOTAL TURNOVER LEVEL 1 (COMMISSION)</td>
                <td><b><?php echo number_format($turnover[0], 2) ?> (<?php echo number_format($commission[0], 2) ?>)</b></td>
              </tr>
              <tr>
                <td>TOTAL TURNOVER LEVEL 2 (COMMISSION)</td>
                <td><b><?php echo number_format($turnover[1], 2) ?> (<?php echo number_format($commission[1], 2) ?>)</b></td>
              </tr>
              <tr>
                <td>TOTAL COMISSION EARNED</td>
                <td><b><?php echo number_format($commisionearned, 2) ?></b></td>
              </tr>
            </table>
            <p class="btz">
              <a href="#" class="btn-auth btn-register btn-lr" id="header-register" style="width: 100%; border-radius: 0;">WITHDRAW COMMISION</a>
              <a href="#" class="btn-auth btn-register btn-lr" id="header-register" style="width: 100%; border-radius: 0;">WITHDRAW HISTORY</a>
              <a href="#" class="btn-auth btn-register btn-lr" id="header-register" style="width: 100%; border-radius: 0;">COMMISION RATE</a>
            </p>
          </div>
          <div id="tab-2">
            <p>
              <input type="text" class="inprt" id="datepicker" placeholder="Select a date">
              <input type="text" class="inprt" value="" placeholder="Search Accounts..." id="searchInput">
              <button class="bbz" id="filterButton" onclick="searchDownlineInquiry()">SEARCH</button>
            </p>
            <table id="tab2ResultsTable">
              <thead>
                <tr>
                  <th>Account</th>
                  <th>Turnover</th>
                  <th>Commision</th>
                </tr>
              </thead>
            </table>
          </div>
          <div id="tab-3">
            <p>
              <input type="text" class="inprt" id="datepicker1" placeholder="Select a date">
              <input type="text" class="inprt" value="" placeholder="Search Accounts..." id="searchInput1">
              <button class="bbz" id="filterButton" onclick="searchPerformanceInquiry()">SEARCH</button>
            </p>
            <table id="tab3ResultsTable">
              <thead>
                <tr>
                  <th>Account</th>
                  <th>Downline</th>
                  <th>Team Added</th>
                  <th>Commision</th>
                </tr>
              </thead>
            </table>
          </div>
          <div id="tab-4">
            <img src="images/com.jpg" width="100%" height="auto" style="padding: 20px; background-color: #244191;">
            <main style="padding:20px; background-color:#d9e3ff">
              <ol style="list-style-type: decimal;">
                <li style="list-style-type: decimal;">Let's say you are A, and you invited B, C and D. B, C and D have MYR100,000 turnover respectively. As B, C and D is your direct downline(Level 1), you will get MYR30,000 (MYR300,000 x 10.00%).</li>
                <li style="list-style-type: decimal;">B invited E and F, E and F have a total of MYR200,000 turnover. As E and F is your indirect downline(Level 2), you will get MYR2,000 (MYR200,000 x 1.00%).</li>
                <li style="list-style-type: decimal;">So in total, A get MYR32,000 (MYR30,000 + MYR2,000).</li>
              </ol>
            </main>

            <h3>SAMPLE COMMISSION TABLE</h3>

            <table>
              <tr>
                <th>LEVEL</th>
                <th>COMMISSION RATIO</th>
              </tr>
              <tr>
                <td>1</td>
                <td>3.00%</td>
              </tr>
              <tr>
                <td>2</td>
                <td>1.00%</td>
              </tr>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>


<?php include 'footer.php'; ?>

<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
    $('#datepicker').datepicker('setDate', new Date());

    $("#datepicker1").datepicker();
    $('#datepicker1').datepicker('setDate', new Date());

    $("#searchButton").click(function() {});
  });

  // Show the first tab by default
  $('.tabs-stage div').hide();
  $('.tabs-stage div:first').show();
  $('.tabs-nav li:first').addClass('tab-active');

  // Change tab class and display content
  $('.tabs-nav a').on('click', function(event) {
    event.preventDefault();
    $('.tabs-nav li').removeClass('tab-active');
    $(this).parent().addClass('tab-active');
    $('.tabs-stage div').hide();
    $($(this).attr('href')).show();
  });

  function searchDownlineInquiry() {
    // Get the date and phone number from your form or input fields
    let selectedDate = $("#datepicker").datepicker("getDate");
    // Format the date (if needed)
    let date = $.datepicker.formatDate("yy-mm-dd", selectedDate);
    const account = $("#searchInput").val();

    // Make an AJAX request to the backend endpoint
    $.ajax({
      url: 'handlers/referralHandler.php',
      type: 'POST',
      data: {
        begindate: date,
        account: account,
        type: 0 // downline
      },
      dataType: 'json',
      success: function(response) {
        console.log(response);

        if (response['Text'] !== undefined) {
          window.alert(response['Text']);
        } else {
          // Clear the table
          $('#tab2ResultsTable tbody').empty();
          totalTurnover = 0;
          totalCommision = 0;
          // Loop through the response data and populate the table
          response['Data'].forEach(entry => {
            const row = $('<tr>');
            const turnover = entry.Turnover.toLocaleString(undefined, {
              minimumFractionDigits: 2,
              maximumFractionDigits: 3
            });
            const commission = entry.Commission.toLocaleString(undefined, {
              minimumFractionDigits: 2,
              maximumFractionDigits: 3
            });
            totalTurnover += parseFloat(entry.Turnover);
            totalCommision += parseFloat(entry.Commission);
            $('<td>').text(entry.Account).appendTo(row);
            $('<td>').text(turnover).appendTo(row);
            $('<td>').text(commission).appendTo(row);
            row.appendTo($('#tab2ResultsTable'));
          });

          const totalRow = $('<tr style="color: red;">');
          $('<td>').text("Total").appendTo(totalRow);
          $('<td>').text(totalTurnover.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 3
          })).appendTo(totalRow);
          $('<td>').text(totalCommision.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 3
          })).appendTo(totalRow);
          totalRow.appendTo($('#tab2ResultsTable'));
        }
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });

  }

  function searchPerformanceInquiry() {
    // Get the date and phone number from your form or input fields
    let selectedDate = $("#datepicker1").datepicker("getDate");
    // Format the date (if needed)
    let date = $.datepicker.formatDate("yy-mm-dd", selectedDate);
    const account = $("#searchInput1").val();

    // Make an AJAX request to the backend endpoint
    $.ajax({
      url: 'handlers/referralHandler.php',
      type: 'POST',
      data: {
        begindate: date,
        account: account,
        type: 1 // performance
      },
      dataType: 'json',
      success: function(response) {
        console.log(response);

        if (response['Text'] !== undefined) {
          window.alert(response['Text']);
        } else {
          // Clear the table
          $('#tab3ResultsTable tbody').empty();
          totalCommission = 0;
          // Loop through the response data and populate the table
          response['Data'].forEach(entry => {
            const row = $('<tr>');
            const account = entry.Account.substring(0, entry.Account.length - 2) + "xx";
            const commission = parseFloat(entry.Commission).toLocaleString(undefined, {
              minimumFractionDigits: 2,
              maximumFractionDigits: 3
            });
            totalCommission += parseFloat(entry.Commission);
            $('<td>').text(account).appendTo(row);
            $('<td>').text(entry.Downline).appendTo(row);
            $('<td>').text(entry.Teamadded).appendTo(row);
            $('<td>').text(commission).appendTo(row);
            row.appendTo($('#tab3ResultsTable'));
          });

          const totalRow = $('<tr style="color: red;">');
          $('<td>').text("Total Commision").attr('colspan', 3).appendTo(totalRow);
          $('<td>').text(totalCommission.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 3
          })).appendTo(totalRow);
          totalRow.appendTo($('#tab3ResultsTable'));
        }
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });

  }

  function copyReferalLink() {
    var text = document.getElementById("myInput").value;
    var textArea = document.createElement('textarea');
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
  }
</script>