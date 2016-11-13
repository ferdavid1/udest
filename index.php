<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('db_connect.php');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['submit'])){
    //get the text data
    $body = $_POST['body'];
    $body = $db->real_escape_string($body);
    $body = htmlentities($body);
    $count = str_word_count($body); 

    
    if($body){
        if($count < 25){
            echo "Error, under 25 word minimum...";
            echo "$count words used";
        }
        else {
            $query = $db->query("INSERT INTO free_response(travel_opinion) VALUES ('$body')");
                if ($query){
                    echo "Submitted";
                    
                } else {
                    echo "Error";
                }
        }
    }else {
        echo "Missing information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/loginstyle.css" rel='stylesheet' type='text/css' />
    <link href="../css/blog-post.css" rel='stylesheet' type='text/css' />
    <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />

    <title>Udest - Boostrap</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Udest</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">How-to</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Try it</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Udest!</div>
                <div class="intro-heading">Your personal paradise</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">The Steps</h2>
                    <h3 class="section-subheading text-muted">Write a short paragraph on how you feel about traveling, and we'll tell you where you should go, and the best deals on how to get there!</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Tell us about yourself</h4>
                    <p class="text-muted">How do you feel about traveling?</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Let us Learn</h4>
                    <p class="text-muted">The predictive algorithm will interpret your statement, and give you suggestions on the perfect travel destination!</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-dollar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Deals</h4>
                    <p class="text-muted">We'll tell you the cheapest and quickest way to arrive in style</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Try it</h2>
                    <h3 class="section-subheading text-muted">Write a short statement on how you feel about traveling; your travel aspirations, your favorite environments (beach, woods, mountains, etc.), or vacation activities, and we'll tell you your ideal destination!</h3>
                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                   <!-- Text Post -->
                    <p> 
                    <label for="body">Your Travel Story: (25 word minimum)</label>
                    </p>
                    <textarea name="body" cols=50 rows=10></textarea>
                    <hr>
                    <input type="submit" name="submit" value="Submit" />
                    <hr> 
                    </form> 
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Udest analyses the user's text for emotive keywords and signals using IBM's Watson Alchemy API, and matches the user with a suggested travel destination- and the most economic way to get there. </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016</h4>
                                    <h4 class="subheading">Our History</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Udest was started in November 2016, by University of California - Davis students </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                    <img src="img/team/fernando.jpg" class="img-responsive img-circle" alt=""> 
                        <h4>Fernando Espinosa</h4>
                        <p class="text-muted">Front-end design, databases, machine learning</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://github.com/ferdavid1"><i class="fa fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/abha.jpg" class="img-responsive img-circle" alt=""> 
                        <h4>Abha Pandey</h4>
                        <p class="text-muted">Amadeus Travel API manipulation</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://github.com/pabha9"><i class="fa fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/josh.jpg" class="img-responsive img-circle" alt="" > 
                        <h4>Josh Munic</h4>
                        <p class="text-muted">IBM Watson implementation</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://github.com/jpmunic"><i class="fa fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">See our source code! Visit <a href = "https://github.com/jpmunic/udest"> Github</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">We'll get back to you before you know it</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p>General Inquiries:</p>
                        <p>fespinosa@ucdavis.edu</p>

                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="copyright">Copyright &copy; Udest 2016</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
