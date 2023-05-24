<html>

<head>
  <title>
    Contact Form Design - Easy Tutorials
  </title>
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body background="contact_us_2.jpg" style="background-position-x:-5em ;">

  <div class="contact-form" style="width:36em;background-color:#fff;height: 42em;border-radius:1em">



    <h2 style="background:#668f91">CONTACT ME</h2>
    <form method="post" action="">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="text" name="phone" placeholder="Phone No" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <div class="g-recaptcha" data-sitekey="6LdweSYmAAAAAI-HzU-gYZwzAvoE3j6T_k8jWu8p"></div>
      <input type="submit" name="submit" value="Send Message" class="submit-btn">

    </form>
    <div class="status">

    </div>
    <?php
  $headers =  'MIME-Version: 1.0' . "\r\n"; 
  $headers .= 'From: Your name <tiwarihimanshu7772@gmail.com>' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
  
    if (isset($_POST['submit'])) {
      $User_name = $_POST['name'];
      $phone = $_POST['name'];
      $user_email = $_POST['email'];
      $user_message = $_POST['message'];

      $email_from = 'tiwarihimanshu7772@gmail.com';
      $email_subject = "New Form Submission";
      $email_body = "Name: $User_name.\n" .
        "Phone Number: $phone.\n" .
        "Email Id: $user_email.\n" .
        "User Message: $user_message.\n";
      $to_email = "pra.hri13@gmail.com";
      // $headers = "From: $email_from\r\n";
      // $headers = "Reply-To: $user_email\r\n";

      $secretKey = "6LdweSYmAAAAALJ2cIvxZanB7SiaTetML-KEnp0e";
      $responseKey = $_POST['g-recaptcha-response'];
      $UserIP = $_SERVER['REMOTE_ADDR'];
      $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

      $response = file_get_contents($url);
      $response = json_decode($response);

      if ($response->success) {
        mail($to_email, $email_subject, $email_body, $headers);
        echo "Message Sent Successfully";
      } else {
        echo "<span>Invalid Captcha, Please Try Again</span>";
      }
    }
    ?>
  </div>
</body>

</html>