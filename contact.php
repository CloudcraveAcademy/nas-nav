<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<?php require_once ('head.php'); ?>
</head>

<body class="theme-1">
<?php require_once ('header.php'); ?>

<?php require_once ('mobile_menu.php'); ?>

    <div class="breadcrumb-div">
        <div class="container">
            <h1 class="page-title mb-0">Contact Us</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Contact Us</li>
            </ol>
        </div>
    </div>

    <div class="div-padding contact-info-div">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact-info text-center">
                        <img src="assets/images/icon/contact_info.webp" alt="icon">
                        <h4>Address</h4>
                        <p>Address : 294 Leventis Close, Central Business District, FCT Abuja, Nigeria.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact-info text-center">
                        <img src="assets/images/icon/contact_info-2.webp" alt="icon">
                        <h4>Phone number</h4>
                        <p>Phone : +234 803 205 6154</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-0 col-sm-6 offset-sm-3">
                    <div class="single-contact-info text-center">
                        <img src="assets/images/icon/contact_info-3.webp" alt="icon">
                        <h4>E-mail</h4>
                        <p>Email : info@nasnavigation.com.ng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-padding contact-form-div p-t-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                    <form action="/contact.php" class="mb-4" method="post" id="contact-form">
                        <h2>
                        Send us an Email
                        </h2>
                        <h5 style="color: blue;">
                        <?php

$errors = [];
$errorMessage = '';

$secret = '6LcSA-4pAAAAAMBtXk5VJqANsaBk4xBuoN8XHwGl';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptchaResponse}";
    $verify = json_decode(file_get_contents($recaptchaUrl));

    if (!$verify->success) {
      $errors[] = 'Recaptcha failed';
    }

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($subject)) {
        $errors[] = 'Subject is empty';
    }

    if (empty($phone)) {
        $errors[] = 'Mobile Phone is empty';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $toEmail = 'info@nasnavigation.com.ng';
        $emailSubject = "New Contact Message -  $subject"; 
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];

        $bodyParagraphs = ["Name: {$name}", '<br/>', "Email: {$email}", '<br/>', "Subject: {$subject}", '<br/>', "Mobile: {$phone}", '<br/>', "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            $errorMessage = "<br><p style='color: green;'><b> Message Sent Successfully.</b></p>";
        } else {
            $errorMessage = "<br><p style='color: red;'>Oops, something went wrong. Please try again later</p>";
        }
    }
}

?>
 <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                    </h5>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="floatingName" placeholder="name">
                            <label for="floatingName">Name</label>
                          </div>
                        <div class="form-floating">
                          <input type="email"  name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                          <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                          <input type="text"  name="phone" class="form-control" id="floatingPhone" placeholder="Phone">
                          <label for="floatingPhone">Phone</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="subject" class="form-control" id="floatingSubject" placeholder="Subject">
                            <label for="floatingSubject">Subject</label>
                          </div>
                        <div class="form-floating">
                            <textarea class="form-control"  name="message"  id="floatingText" placeholder="Text Content" rows="6"></textarea>
                            <label for="floatingText">Your Content</label>
                        </div>
                        
  <button class="g-recaptcha btn w-100 btn btn-lg btn-dark" type="submit" data-sitekey="6LcSA-4pAAAAAHrsU-Cos8MOO_m0f0r2z2E0jBtg"  data-callback='onRecaptchaSuccess'>
                        
                        Send</button>
                        
                    </form>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: {allowEmpty: false}
          },
          email: {
              presence: {allowEmpty: false},
              email: true
          },
          subject: {
              presence: {allowEmpty: false}
          },
          phone: {
              presence: {allowEmpty: false},
                      },
          message: {
              presence: {allowEmpty: false}
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              subject: form.elements.subject.value,
              phone: form.elements.phone.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);

      function onRecaptchaSuccess () {
          document.getElementById('contact-form').submit()
      }
  </script>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-map">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                              <iframe id="gmap_canvas" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=294%20Leventis%20Close,%20Central%20Business%20District,%20Abuja%C2%A0900103,%C2%A0FCT+(Nas%20Navigation%20Limited)&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once ('footer.php'); ?>

    <!-- jQuery -->
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/OwlCarousel/owl.carousel.min.js"></script>
    <script src="assets/plugins/counterup/waypoints.min.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB16sGmIekuGIvYOfNoW9T44377IU2d2Es&sensor=true"></script> -->
    <script src="assets/plugins/gmap3/gmap3.min.js"></script>
    <!-- custom scripts -->
    <script src="main/js/scripts.js"></script>


</body>

</html>