<?php include 'header.php'; ?>

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
            <input class="numbers" type="text" id="registerform_Mobile" name="Username" placeholder="Username" value="60" minlength="8" required="">
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
            <input class="Password trimVal alphapwd" type="password" id="registerform_Password" name="Password" placeholder="Password" pattern=".{8,15}" maxlength="15" value="" title="Use 8 or more characters with a mix of letters, numbers &amp; symbols" required="">
            <div class="small" id="registerform_PasswordMsg"></div>
          </dd>
          <dt></dt>
          <dt>* User 8 to 15 characters </dt>
          <dt>* Consists of at least 1 letter and 1 digit </dt>
          <dt>* Password is case sensitive </dt>
        </dl>
        <dl id="groupComfirmPassword">
          <dt>Confirm Password (*) : </dt>
          <dd>
            <input class="CPassword trimVal alphapwd" type="password" id="registerform_CPassword" name="CPassword" placeholder="Confirm Password" pattern=".{8,25}" maxlength="25" value="" required="">
            <div class="small" id="registerform_CPasswordMsg"></div>
          </dd>
        </dl>
        <dl id="groupVerifyCode">
          <dt>VerifyCode:</dt>
          <dd>
            <input class="numbers" type="text" name="VerifyCode" id="registerform_varifycode" value="" placeholder="VerifyCode (click 'Send Code' to receive an OTP)">
            <button class="btn btn-primary" type="button" id="sendCodeButton" style="width: 120px; height: 42px;">Send Code</button>
          </dd>
        </dl>
        <dl id="groupSubmit">
          <dt></dt>
          <dd>
            <!-- Add this div to display messages -->
            <div id="message" style="margin-top: 10px;"></div>
            <input type="button" value="Register Now" id="registerform_btnSubmit" >
          </dd>
        </dl>
      </form>
      <div class="mlr-bottom">
        <p> By clicking the Register button, I hereby acknowledge that I am above 18 years old and have read and accepted your terms &amp; conditions. </p>
      </div>
    </div>
    <link rel="image_src" href="images/logo.png">
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

</div> <?php include 'footer.php'; ?>

<script>
  $(document).ready(function() {
    // $("#registerform_Mobile").keydown(function(e) {
    //   var input = $(this).val();

    //   if (!((e.keyCode > 95 && e.keyCode < 106) ||
    //       (e.keyCode > 47 && e.keyCode < 58) ||
    //       e.keyCode == 8)) {
    //     return false;
    //   }

    //   // Always keep "60" in the input tag
    //   if (e.keyCode == 8 && input == "60") {
    //     return false;
    //   }

    //   // Update the input field value
    //   $(this).val(input);
    // });

    $('#registerform_btnSubmit').click(function() {
      var mobile = $('#registerform_Mobile').val().replace(/ /g, '');
      if (mobile.length < 8 || mobile.length > 15) {
        customAlert('Mobile Number is invalid format.', false);
        return;
      }
      var password = $('#registerform_Password').val();
      const containsLetter = /[a-zA-Z]/.test(password);
      const containsDigit = /\d/.test(password);
      if (password.length < 8 || mobile.length > 15 || !(containsLetter && containsDigit)) {
        customAlert('Password is invalid format.', false);
        return;
      }

      var cpassword = $('#registerform_CPassword').val();
      if (password !== cpassword) {
        customAlert('Password is not matched with Confirm password.', false);
        return;
      }

      // var otpCode = $('#registerform_varifycode').val();
      // if (otpCode.length != 6) {
      //   customAlert('VerifyCode is not valid. Check your mobile for the code.', false);
      //   return;
      // }

      $(this).prop('disabled', true);
      customAlert('Registerring Now, Please Wait...', true);

      $.ajax({
        type: "POST",
        url: "handlers/registerHandler.php",
        data: $("#registerform").serialize(),
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#registerform_btnSubmit').prop('disabled', false);

          var messageElement = $('#message');
          messageElement.text(response.message); // Add this line to display the message
          if (response.status === "success") {
            messageElement.css('color', 'green'); // Change color to green if successful
            setTimeout(function() {
              window.top.location.href = '<?php echo rootUrl() ?>'; // Reload the page or redirect as needed
            }, 2000); // Delay of 2 seconds before reload
          } else {
            messageElement.css('color', 'red'); // Change color to red if there's an error
          }
        },
        error: function(e) {
          console.log(e); // Log any errors
          $('#registerform_btnSubmit').prop('disabled', false);
          $('#waitModal').modal('hide');

          $('#message').text('An error occurred: ' + e.toString()).css('color', 'red');
        }
      });
    });

    $('#sendCodeButton').click(function() {
      customAlert('Comming soon ...', true);

      // var mobile = $('#registerform_Mobile').val().replace(/ /g, '');
      // if (mobile.length < 8 || mobile.length > 15) {
      //   customAlert('Mobile Number is in an invalid format.', false);
      //   return;
      // }

      // // Send an OTP to the user's mobile number (You can implement this part)
      // $.ajax({
      //   type: 'POST',
      //   url: 'handlers/otpHandler.php', // Replace with the actual path to your otpHandler.php file
      //   data: {
      //     mobile: mobile
      //   },
      //   dataType: 'json',
      //   success: function(response) {
      //     console.log(response);

      //     if (response.success) {
      //       // Display a success message or take further actions
      //       startCountdown(response.seconds);
      //       customAlert('OTP sent successfully. Check your mobile for the code.', true);
      //     } else {
      //       // Display an error message
      //       customAlert(response.message, false);
      //     }
      //   },
      //   error: function(e) {
      //     // Handle the AJAX error
      //     console.log(e); // Log any errors
      //     customAlert('Failed to send OTP.', false);
      //   }
      // });
    })
  });

  function startCountdown(waitSeconds) {
    let countdown = waitSeconds;
    const otpButton = document.getElementById("sendCodeButton");

    // Disable the button while countdown is active
    otpButton.disabled = true;

    // Start the interval
    const interval = setInterval(function() {
      if (countdown <= 0) {
        clearInterval(interval); // Stop the countdown
        otpButton.textContent = "Send Code"; // Reset button text
        otpButton.disabled = false; // Enable the button
      } else {
        otpButton.textContent = `Send Code (${countdown})`;
        countdown--;
      }
    }, 1000);
  }

  function customAlert(message, flag) {
    $('#modalMessage').text(message);
    $("#modalMessage").css('color', flag ? 'green' : 'red');
    $('#waitModal').modal('show');
  }
</script>