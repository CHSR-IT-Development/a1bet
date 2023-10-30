<?php include 'header.php';

if (!isset($_SESSION['id'])) {
} else {
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

    @media only screen and (max-width: 600px) {
        #profile .tabs {
            max-width: 600px;
        }

        #profile li a {
            min-height: 50px;
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
                    <div id="tab-1" class="container mt-5">
                        <?php if (!isset($_SESSION['id'])) : ?>
                            <div class="alert alert-danger">You must be logged in to view your profile.</div>
                        <?php else : ?>
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
                        <?php endif; ?>
                    </div>
                    <div id="tab-2">
                    </div>
                    <div id="tab-3">
                    </div>
                    <div id="tab-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {});

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
</script>

<?php include 'footer.php'; ?>