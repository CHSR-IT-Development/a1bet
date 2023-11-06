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
        width: 33.3%;
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
        margin-left: 5px;
    }

    .inprt {
        padding: 3px 5px;
        background: #244091;
        color: #ffffff;
        width: 49%;
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
            width: 49%;
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
                    <li><a href="#tab-1">Balances</a></li>
                    <li><a href="#tab-2">Deposit</a></li>
                    <li><a href="#tab-3">Withdraw</a></li>
                </ul>
                <div class="tabs-stage">
                    <?php if (!isset($_SESSION['id'])) : ?>
                        <div class="alert alert-danger">You must be logged in to view your profile.</div>
                    <?php else : ?>
                        <div id="tab-1" style="width: 100%">
                            <div class="row">
                                <h2>Balances</h2>
                            </div>
                        </div>
                        <div id="tab-2">
                            <p style="justify-content: flex-end; display: flex;">
                                <input type="text" class="inprt" value="" placeholder="Amount" id="amountInput">
                                <button class="bbz" id="filterButton2" onclick="depositWallet()">Deposit</button>
                            </p>
                        </div>
                        <div id="tab-3">
                            <p style="justify-content: flex-end; display: flex;">
                                <input type="text" class="inprt" value="" placeholder="Amount" id="amountOutput">
                                <button class="bbz" id="filterButton3" onclick="withdrawWallet()">Withdraw</button>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="waitModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p id="modalMessage" style="color: green;"></p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

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

    function depositWallet() {
        let amount = $('#amountInput').val();
        if (amount === '' || parseFloat(amount) < 0.001) {
            customAlert("Insufficient Deposit Amount", false);
            return;
        }
        // Make an AJAX request to the backend endpoint
        $.ajax({
            url: 'handlers/gameHandler.php',
            type: 'POST',
            data: {
                type: 1, // deposit wallet
                amount: amount,
                account: '<?php echo $user['user_name'] ?>'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response['Error'] !== 0) {
                    customAlert(response['Text'], false);
                } else {
                    customAlert(response['Text'], true);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function withdrawWallet() {
        let amount = $('#amountOutput').val();
        if (amount === '' || parseFloat(amount) < 0.001) {
            customAlert("Insufficient Withdraw Amount", false);
            return;
        }
        // Make an AJAX request to the backend endpoint
        $.ajax({
            url: 'handlers/gameHandler.php',
            type: 'POST',
            data: {
                type: 2, // withdraw wallet
                amount: amount,
                account: '<?php echo $user['user_name'] ?>'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response['Error'] !== 0) {
                    customAlert(response['Text'], false);
                } else {
                    customAlert(response['Text'], true);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function customAlert(message, flag) {
        $('#modalMessage').text(message);
        $("#modalMessage").css('color', flag ? 'green' : 'red');
        $('#waitModal').modal('show');
    }
</script>


<?php include 'footer.php'; ?>