
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>JSS INFOCENTER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }

      .jumbotron img
      {
        height:400px;
        width:800px;
        border-radius: 10px;
      }
      .jumbotron div
      {
        position: relative;
        left:-250px;
        top:-80px;

      }

    </style>
   


  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href=<?php echo base_url() ?>bootstrap.min.css rel="stylesheet" media="screen" />
  <script src= <?php echo base_url() ?>bootstrap.min.js></script>
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">JSS INFOCENTER</h3>
      </div>

      <hr>

      <div class="jumbotron">
          <img src='<?php echo base_url()."jss.jpg" ;?>'>
          <div><a href="<?php echo base_url().'index.php/news/main' ;?>"><input type="button" class="btn btn-small btn-inverse" value="Infocenter"></a>
          </div>
      </div>

      <hr>

      <div class="row-fluid marketing">
        
      </div>

     

  <footer>
  <hr>
  <div class="footer">&copy; Ankur rana-->JSS ACADEMY OF TECHNICAL EDUCATION </div>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href=<?php echo base_url() ?>bootstrap.min.css rel="stylesheet" media="screen" />
  <script src= <?php echo base_url() ?>bootstrap.min.js></script>
  </footer> 

  </body>
</html>
