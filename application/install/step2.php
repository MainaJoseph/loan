<!DOCTYPE html>
<html lang="en">
<head>
    <title>Advanced LMS Installer</title>
	<link rel="shortcut icon" type="image/x-icon" href="../../img/ass.png"> 
    <style type="text/css">

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


</head>
<body style='background-color: #deead3;'>
<div class='main-container'>
    <div class='header'>
        <div class="header-box wrapper">
            <div class="hd-logo"><a href="#"><img src="../../img/ass.png" width="50" height="50" alt="LMS"/></a></div>
        </div>

    </div>
    <!--  contents area start  -->
    <div class="col-lg-12">
        <h4>Advanced LMS Auto Installer </h4>
        <?php
        $passed = '';
        $ltext = '';
        if (version_compare(PHP_VERSION, '5.3.9') >= 0) {
            $ltext .= 'To Run Advanced LMS You need at least PHP version 5.3.9, Your PHP Version is: ' . PHP_VERSION . " Tested <strong>---PASSED---</strong><br/>";
            $passed .= '1';

        } else {
            $ltext .= 'To Run Advanced LMS You need at least PHP version 5.3.9, Your PHP Version is: ' . PHP_VERSION . " Tested <strong>---FAILED---</strong><br/>";
            $passed .= '0';

        }

        if (extension_loaded('PDO')) {
            $ltext .= 'PDO is installed on your server: ' . "Tested <strong>---PASSED---</strong><br/>";
            $passed .= '1';
        } else {
            $ltext = 'PDO is installed on your server: ' . "Tested <strong>---FAILED---</strong><br/>";
            $passed .= '0';

        }

        if (extension_loaded('pdo_mysql')) {
            $ltext .= 'PDO MySQL driver is enabled on your server: ' . "Tested <strong>---PASSED---</strong><br/>";
            $passed .= '1';
        } else {
            $ltext .= 'PDO MySQL driver is not enabled on your server: ' . "Tested <strong>---FAILED---</strong><br/>";
            $passed .= '0';

        }

        if (extension_loaded('fileinfo')) {
            $ltext .= 'php_fileinfo.dll extension is enabled on your server: ' . "Tested <strong>---PASSED---</strong><br/>";
            $passed .= '1';
        } else {
            $ltext .= 'php_fileinfo.dll extension is not enabled on your server: ' . "Tested <strong>---FAILED---</strong><br/>";
            $passed .= '0';

        }

        if (extension_loaded('curl')) {
            $ltext .= 'php-curl extension is enabled on your server: ' . "Tested <strong>---PASSED---</strong><br/>";
            $passed .= '1';
        } else {
            $ltext .= 'php-curl extension is not enabled on your server: ' . "Tested <strong>---FAILED---</strong><br/>";
            $passed .= '0';

        }

        if ($passed == '11111') {
            echo("<br/> $ltext <br/> Great! System Test Completed. You can run Advanced LMS on your server. Click Continue For Next Step.
 <br><br>
 <a href=\"step3.php\" class=\"btn btn-primary\">Continue</a> 
 ");
        } else {
            echo("<br/> $ltext <br/> Sorry. The requirements of Advanced LMS is not available on your server.
 Please contact with us- critech.getresponse@gmail.com with this code- $passed Or contact your server administrator
  <br><br>
 <a href=\"#\" class=\"btn btn-primary disabled\">Correct The Problem To Continue</a> 
 ");
        }


        ?>
    </div>


    <!--  contents area end  -->
</div>
<div class="footer">Copyright &copy; CriTechglobal <?php echo date("Y"); ?> All Rights Reserved<br/>
    <br/>
</div>
</body>
</html>

