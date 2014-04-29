<!DOCTYPE html>
<html lang="en">
  <head>
     <script src="http://code.jquery.com/jquery-latest.js"></script>
 <link href=<?php echo base_url() ?>bootstrap.min.css rel="stylesheet" media="screen" />
 <script src= <?php echo base_url() ?>bootstrap.min.js></script>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>  
  


<script>
</script>

</head>

<body>


    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>">JSS INFOCENTER</a>
          <div class="nav-collapse collapse">

            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">
              <?php

if(isset($_COOKIE['uploader_name']))
     {
       echo $_COOKIE['uploader_name'];
     }
else
    {
  echo "User";
    }

?> </a>
            </p>

            <ul class="nav">
              <li class="active"><a href="<?php echo base_url()."index.php/jss_admin/" ;?>">Profile</a></li>
              <li><a href="<?php echo base_url()."index.php/jss_admin/create" ;?>">Create News</a></li>
              
              <li><a href="<?php echo base_url()."index.php/jss_admin/logout" ;?>">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav" id="sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">QUICK LINKS</li>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url()."/index.php/news/search_by_uploader/" ?>">Search by uploader</a></li>
              <li class="nav-header">Sidebar</li>
              
              <li><a href="http://about.me/ankurrana" target="_blank">About Me</a></li>
              <li><a href="http://210.212.85.155/" target="_blank">Infocenter</a></li>
              <li><a href="http://www.jssaten.ac.in/" target="_blank">Jss website</a></li>
              <li><a href="http://teamimpetus.com/" target="_blank">Team impetus</a></li>
              <li><a href="http://nibble-jssaten.com" target="_blank">Nibble society</a></li>

              <li class="nav-header">Other Links</li>
              <li><a href="http://www.mtu.ac.in" target="_blank">MTU</a></li>
              <li><a href="http://www.mtuams.in/" target="_blank">MTU result portal</a></li>
           
          </div><!--/.well -->
        </div><!--/span-->