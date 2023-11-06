<?php include 'header.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $stmt = $conn->prepare("SELECT * FROM players WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $apiBalance = getbalance_api($user['user_name']);
    $userBalance = $apiBalance['Error'] == 0 ? $apiBalance['Balance'] : 0;
}
?>

<style>
    #profile .tabs {
        max-width: 60%;
        margin: 20px auto;
    }

    #profile .tabs-nav li {
        float: left;
        width: 25%;
    }

    #profile .tabs-nav li:first-child a {
        border-right: 0;
        border-top-left-radius: 6px;
    }

    #profile .tabs-nav li:last-child a {
        border-top-right-radius: 6px;
    }

    #profile .tab-active a {
        background: #244091;
        border-bottom-color: transparent;
        color: #ffffff;
        cursor: default;
    }

    #profile a {
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

    #profile .tabs-stage {
        border: 1px solid #cecfd5;
        border-radius: 0 0 6px 6px;
        border-top: 0;
        clear: both;
        padding: 24px 30px;
        position: relative;
        top: -1px;
    }

    #profile ul,
    #profile ol {
        margin-left: 0;
        margin-bottom: 0;
    }

    #profile li {
        list-style-type: none;
    }

    .bbz {
        background-color: #e49e24;
        color: #fff;
        padding: 3px 5px;
        width: 48%;
    }

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

    @media only screen and (max-width: 600px) {
        #profile .tabs {
            max-width: 600px;
        }

        #profile li a {
            min-height: 50px;
        }

        .bbz {
            margin-top: 5px;
            width: 100%;
        }

        .inprt {
            padding: 3px 5px;
            background: #244091;
            color: #ffffff;
            width: 49%;
        }
    }
</style>

<div id="divBody">
    <div id="theme-contain-home">
        <div id="profile">
            <div class="tabs">
                <ul class="tabs-nav">
                    <li><a href="#tab-1">User Details</a></li>
                    <li><a href="#tab-2">Bet History</a></li>
                    <li><a href="#tab-3">Wallet</a></li>
                    <li><a href="#tab-4">Rebate Earning</a></li>
                </ul>
                <div class="tabs-stage">
                    <?php if (!isset($_SESSION['id'])) : ?>
                        <div class="alert alert-danger">You must be logged in to view your profile.</div>
                    <?php else : ?>
                        <div id="tab-1" style="width: 100%">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>User Profile</h2>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $user['user_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><?php echo $user['full_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $user['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $user['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><?php echo $user['mobile']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Balance</th>
                                            <td><?php echo number_format($userBalance, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td><?php echo $user['currency']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Bank</th>
                                            <td><?php echo $user['bank_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Account Number</th>
                                            <td><?php echo $user['bank_account_no']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <h2>Change Password</h2>
                                    <form>
                                        <div class="form-group">
                                            <label for="currentPassword">Current Password</label>
                                            <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword">New Password</label>
                                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                                        </div>
                                        <dl id="commentPassword">
                                            <dd>* User 8 to 15 characters </dd>
                                            <dd>* Consists of at least 1 letter and 1 digit </dd>
                                            <dd>* Password is case sensitive </dd>
                                        </dl>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2">
                            <p style="justify-content: flex-end; display: flex;">
                                <input type="text" class="inprt" id="datepicker2" placeholder="Select date" style="margin-right: 5px;">
                                <button class="bbz" id="filterButton2" onclick="getBetHistory()">SEARCH</button>
                            </p>
                            <table id="tab2ResultsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Date</th>
                                        <th style="width: 40%;">Vendor</th>
                                        <th style="width: 40%;">Valid Bet</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-3">
                            <p>
                                <input type="text" class="inprt" id="datepicker3" placeholder="Select begin date">
                                <input type="text" class="inprt" id="datepicker4" placeholder="Select end date">
                                <button class="bbz" id="filterButton" onclick="getWalletHistory()">SEARCH</button>
                            </p>
                            <table id="tab3ResultsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Date</th>
                                        <th style="width: 30%;">Transfer Type</th>
                                        <th style="width: 25%;">Amount</th>
                                        <th style="width: 25%;">Last Amount</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-4">
                            <p>
                                <input type="text" class="inprt" id="datepicker" placeholder="Select begin date" disabled>
                                <input type="text" class="inprt" id="datepicker1" placeholder="Select end date">
                                <button class="bbz" id="filterButton" onclick="getRebateEarning()">SEARCH</button>
                            </p>
                            <table id="tab4ResultsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Date</th>
                                        <th style="width: 40%;">Vendor</th>
                                        <th style="width: 20%;">Turnover</th>
                                        <th style="width: 20%;">Rebate</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#datepicker").datepicker();
        $('#datepicker').datepicker('setDate', new Date('<?php echo $user['timestamp'] ?>'));

        $("#datepicker1").datepicker();
        $('#datepicker1').datepicker('setDate', new Date());

        $("#datepicker2").datepicker();
        $('#datepicker2').datepicker('setDate', new Date());

        $("#datepicker3").datepicker();
        $('#datepicker3').datepicker('setDate', new Date('<?php echo $user['timestamp'] ?>'));

        $("#datepicker4").datepicker();
        $('#datepicker4').datepicker('setDate', new Date());
    });

    // Show the first tab by default
    $('.tabs-stage > div').hide();
    $('.tabs-stage > div:first').show();
    $('.tabs-nav li:first').addClass('tab-active');

    // Change tab class and display content
    $('.tabs-nav a').on('click', function(event) {
        event.preventDefault();
        $('.tabs-nav li').removeClass('tab-active');
        $(this).parent().addClass('tab-active');
        $('.tabs-stage > div').hide();
        $($(this).attr('href')).show();
    });

    function getBetHistory() {
        // Get the date from your form or input fields
        let pickDate = $("#datepicker2").datepicker("getDate");
        // Format the date (if needed)
        let statementDate = $.datepicker.formatDate("yy-mm-dd", pickDate);

        // Make an AJAX request to the backend endpoint
        $.ajax({
            url: 'handlers/referralHandler.php',
            type: 'POST',
            data: {
                begindate: statementDate,
                account: '<?php echo $user['user_name'] ?>',
                type: 3 // bet history
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response['Text'] !== undefined) {
                    window.alert(response['Text']);
                } else {
                    // Clear the table
                    $('#tab2ResultsTable tbody').empty();

                    // Loop through the response data and populate the table
                    response['Data'].forEach(entry => {
                        let row = $('<tr>');
                        const vendor = entry['Vendor'];
                        if (vendor === 'Total ValidBet') {
                            row = $('<tr style="color: red;">');
                        }
                        const validBet = entry['ValidBet'].toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        $('<td>').text(statementDate).appendTo(row);
                        $('<td>').text(vendor).appendTo(row);
                        $('<td>').text(validBet).appendTo(row);
                        row.appendTo($('#tab2ResultsTable'));
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function getWalletHistory() {
        // Get the date from your form or input fields
        let pickDate1 = $("#datepicker3").datepicker("getDate");
        let pickDate2 = $("#datepicker4").datepicker("getDate");
        // Format the date (if needed)
        let date1 = $.datepicker.formatDate("yy-mm-dd", pickDate1);
        let date2 = $.datepicker.formatDate("yy-mm-dd", pickDate2);

        // Make an AJAX request to the backend endpoint
        $.ajax({
            url: 'handlers/referralHandler.php',
            type: 'POST',
            data: {
                begindate: date1,
                enddate: date2,
                account: '<?php echo $user['user_name'] ?>',
                type: 4 // wallet history
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response['Text'] !== undefined) {
                    window.alert(response['Text']);
                } else {
                    // Clear the table
                    $('#tab3ResultsTable tbody').empty();

                    // Loop through the response data and populate the table
                    if (response['Data'].length == 0) {
                        const row = $('<tr>');
                        const td = $('<td style="font-size: medium;">').text("No transactions for this wallet.").attr('colspan', 4);
                        td.appendTo(row);
                        row.appendTo($('#tab3ResultsTable'));
                    } else {
                        response['Data'].forEach(entry => {
                            let row = $('<tr>');
                            const statementDate = entry['Date'];
                            const transferType = entry['Type'];
                            const amount = entry['Amount'].toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            const lastamount = entry['LastAmount'].toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            $('<td>').text(statementDate).appendTo(row);
                            $('<td>').text(transferType).appendTo(row);
                            $('<td>').text(amount).appendTo(row);
                            $('<td>').text(lastamount).appendTo(row);
                            row.appendTo($('#tab3ResultsTable'));
                        });
                    }
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function getRebateEarning() {
        // Get the date from your form or input fields
        let beginDate = $("#datepicker").datepicker("getDate");
        let endDate = $("#datepicker1").datepicker("getDate");
        // Format the date (if needed)
        let date1 = $.datepicker.formatDate("yy-mm-dd", beginDate);
        let date2 = $.datepicker.formatDate("yy-mm-dd", endDate);

        // Make an AJAX request to the backend endpoint
        $.ajax({
            url: 'handlers/referralHandler.php',
            type: 'POST',
            data: {
                begindate: date1,
                enddate: date2,
                account: '<?php echo $user['user_name'] ?>',
                type: 2 // rebate
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response['Text'] !== undefined) {
                    window.alert(response['Text']);
                } else {
                    // Clear the table
                    $('#tab4ResultsTable tbody').empty();

                    // Loop through the response data and populate the table
                    response['Data'].forEach(entry => {
                        let row = $('<tr>');
                        const vendor = entry['Vendor'];
                        if (vendor === 'Total Rebate') {
                            row = $('<tr style="color: red;">');
                        }
                        const turnover = entry['Turnover'].toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 3
                        });
                        const rebate = entry['Rebate'].toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        $('<td>').text(date2).appendTo(row);
                        $('<td>').text(vendor).appendTo(row);
                        $('<td>').text(turnover).appendTo(row);
                        $('<td>').text(rebate).appendTo(row);
                        row.appendTo($('#tab4ResultsTable'));
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>

<?php include 'footer.php'; ?>