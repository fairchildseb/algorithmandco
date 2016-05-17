<?php

    echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "design@algorithmandco.com";

    $email_subject = "Web design request";


     function died($error) {

     ?>

<div class = "form-error">

    <p class = "error-message">

        <?php

            echo $error."<br /><br />";
        ?>
    </p>
    <?php
            echo  '<a href="about.html"><img class = "button" id = "star-php" src = "images/star.png"></a>';
            echo "Please go back and try again.<br />";

     ?>
</div>

    <?php
            die();

        }

    ?>


<div class = "form-problem">

       <?php

    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['telephone']) ||

        !isset($_POST['comments'])) {

        died("Sorry - there appears to be a problem with the form you submitted. <br/> <br/> Please contact us directly at design@algorithmandco.com.");

    } ?>

</div>

<?php

    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $comments = $_POST['comments']; // required


    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The email address you entered does not appear to be valid.<br /><br />';

  }

  if(strlen($name) < 2) {

    $error_message .= 'The name you entered does not appear to be valid.<br /><br />';

  }

  if(strlen($comments) < 2) {

    $error_message .= 'The message you entered does not appear to be valid.<br /><br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Message: ".clean_string($comments)."\n";




// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>

<div class = "form-success">

<p>Thank you for contacting us.</p>
 <p>We will be in touch shortly.</p>

</div>

<?php

}

?>
