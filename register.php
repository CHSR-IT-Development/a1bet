<?php include 'header.php';?>

<div id="divBody">
  <div id="theme-contain-registration">
    <div class="register">
      <div class="login-title">
        <h1>Register</h1>
      </div>
      <form id="registerform" class="registerform" method="POST">
        <input id="registerform_lang" name="lang" value="en-us" type="hidden">
        <input id="registerform_Com" name="Com" value="A1BET" type="hidden">
        <input id="registerform_CustomDomain" name="CustomDomain" value="1" type="hidden">
        <input type="hidden" id="registerform_IsMobile" name="IsMobile" value="false">
        <input type="hidden" id="registerform_id" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
        <dl id="groupEmail" style="max-width: 100%; flex:auto; padding-right: 0px">
          <dt>Mobile Number (Username *) : </dt>
          <dd>
            <input class="numbers" type="text" id="registerform_Mobile" name="Username" placeholder="Username" value="" minlength="8" required="">
          </dd>
        </dl>
        <!-- <dl id="groupMobileNumber">
          <dt>Email (Optional) : </dt>
          <dd>
            <input type="email" id="registerform_Email" name="Email" placeholder="example@qq.com" value="">
          </dd>
        </dl> -->
        <dl id="groupPassword">
          <dt>Password (*) : </dt>
          <dd>
            <input class="Password trimVal alphapwd" type="password" id="registerform_Password" name="Password" placeholder="Password" pattern=".{8,25}" maxlength="25" value="" title="Use 8 or more characters with a mix of letters, numbers &amp; symbols" required="">
            <div class="small" id="registerform_PasswordMsg"></div>
          </dd>
        </dl>
        <dl id="groupComfirmPassword">
          <dt>Confirm Password (*) : </dt>
          <dd>
            <input class="CPassword trimVal alphapwd" type="password" id="registerform_CPassword" name="CPassword" placeholder="Confirm Password" pattern=".{8,25}" maxlength="25" value="" required="">
            <div class="small" id="registerform_CPasswordMsg"></div>
          </dd>
        </dl>
        <!-- <dl id="groupVerifyCode">
          <dt>VerifyCode :</dt>
          <dd>
            <input class="numbers" type="text" name="VarifyCode" id="registerform_varifycode" value="" placeholder="VerifyCode" pattern=".{4,4}" title="Key In 4 number for Verify Code" >
          </dd>
          <dd>
            <img src="securitycode.php" onclick="javascript:ReloadIMG(this)" id="regcaptcha" style="cursor:pointer;">
          </dd>
        </dl> -->
        <dl id="groupSubmit">
          <dt></dt>
          <dd>
            <!-- Add this div to display messages -->
            <div id="message" style="margin-top: 10px;"></div>
            <input type="button" value="Register Now" id="registerform_btnSubmit">
          </dd>
        </dl>
      </form>
      <div class="mlr-bottom">
        <p> By clicking the Register button, I hereby acknowledge that I am above 18 years old and have read and accepted your terms &amp; conditions. </p>
      </div>
    </div>
    <link rel="image_src" href="images/logo.png">
  </div>
  
  
</div> <?php include 'footer.php';?>

<script>
    $(document).ready(function() {
        $('#registerform_btnSubmit').click(function() {
            $.ajax({
                type: "POST",
                url: "handlers/registerHandler.php",
                data: $("#registerform").serialize(),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var messageElement = $('#message');
                    messageElement.text(response.message); // Add this line to display the message
                    if (response.status === "success") {
                        messageElement.css('color', 'green');  // Change color to green if successful
                        setTimeout(function() {
                          window.top.location.href = '<?php echo rootUrl()?>';  // Reload the page or redirect as needed
                        }, 2000);  // Delay of 2 seconds before reload
                    } else {
                        messageElement.css('color', 'red');  // Change color to red if there's an error
                    }
                },
                error: function(e) {
                  console.log(e); // Log any errors
                  $('#message').text('An error occurred: ' + e.toString()).css('color', 'red');
                }
            });
        });
    });
</script>
