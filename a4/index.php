
<!DOCTYPE html>
<?php 
include('tools.php');
 include("validate.php");?>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 4</title>
    <link id='stylecss' type="text/css" rel="stylesheet" href="../style.css">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src='../wireframe.js'></script>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header>
        <div class="jumbotron text-center header-bg">
            <img class="logo" src="images/logo1.png">
            <h1 id='brand'>Cinemax</h1>
            <p>Welcome to our cinema</p>
        </div>

    </header>
    <nav id='nav-bar'>
        <ul class="nav justify-content-center secondary-bg">
            <li class="nav-item">
                <a class="nav-link nav-item-bg primary-txt" href="#about-us">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-item-bg primary-txt" href="#prices">Prices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-item-bg primary-txt" href="#now-showing">Now showing</a>
            </li>
        </ul>
    </nav>
    <main>
        <section id='about-us'>
            <div class="parallax">
                <div class="jumbotron primary-bg">
                    <h1>About us</h1>
                    <p>Cinemax is one of the largest cinema chain in Vietnam founded in 2019. The name 'Cinemax' originates from
                        our
                        goals to maximize our customers cinema experience. </p>
                    <p>For that reason, we are going to close our cinema for a major upgrade and expecting to have a grand
                        reopening
                        in 2020 Summer with these following changes: </p>
                </div>
                <div class="jumbotron secondary-bg">
                    <h2>Renovation in cinema lobby</h2>
                    <p>We believe that the experience before watching a movie is also important. Our lobby will have more seats,
                        more digital screens and posters. </p>
                </div>
                <div id="lobby" class="parallax">
                </div>
                <div class="jumbotron secondary-bg">
                    <h2>Reclinable first class seats</h2>
                    <p>Besides standard seats, we introduce first class seats for customer who want to be comfortable and immerse
                        themselves into the movies.</p>
                </div>
                <div id="seat" class="parallax">
                </div>
                <div class="jumbotron secondary-bg">
                    <h2>
                        3D Dolby Vision projection and Dolby Atmos sound
                    </h2>
                    <p>
                        Enhancing visual and audio effects, bringing you into another reality.
                    </p>
                </div>
                <div id="dolby" class="parallax"></div>
            </div>
        </section>
        <section id='prices'>
            <div class='parallax'>
                <div class='jumbotron primary-bg'>
                    <h1>Prices</h1>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                Seat Type</th>
                            <th>
                                Seat Code</th>
                            <th>All day Monday and Wednesday AND 12pm on Weekdays</th>
                            <th>All other times</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Standard Adult</td>
                            <td>STA</td>
                            <td>14.00</td>
                            <td>
                                19.80</td>
                        </tr>
                        <tr>
                            <td>Standard Concession</td>
                            <td>STP</td>
                            <td>12.50</td>
                            <td>17.50</td>
                        </tr>
                        <tr>
                            <td>Standard Child</td>
                            <td>STC</td>
                            <td>11.00</td>
                            <td>15.30</td>
                        </tr>
                        <tr>
                            <td>First Class Adult</td>
                            <td>FCA</td>
                            <td>24.00</td>
                            <td>30.00</td>
                        </tr>
                        <tr>
                            <td>First Class Concession</td>
                            <td>FCP</td>
                            <td>22.50</td>
                            <td>27.00</td>
                        </tr>
                        <tr>
                            <td>First Class Child</td>
                            <td>FCC</td>
                            <td>21.00</td>
                            <td>24.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section id='now-showing'>
            <div class='parallax'>
                <div class='jumbotron pink-bg'>
                    <h1>Now showing</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id='ACT' class="card movie-panel secondary-bg">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="card-img-top movie-poster" src="images/avengers.jpg" alt="Avengers: Endgame">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p class="primary-txt movie-title"><b>Avengers: Endgame</b></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p>PG-13</p>
                                            </div>
                                        </div>
                                        <div class="indent-2">
                                            <p class="card-text secondary-txt">Mon - </p>
                                            <p class="card-text secondary-txt">Tue - </p>
                                            <p class="card-text secondary-txt">Wed - 9pm</p>
                                            <p class="card-text secondary-txt">Thu - 9pm</p>
                                            <p class="card-text secondary-txt">Fri - 9pm</p>
                                            <p class="card-text secondary-txt">Sat - 6pm</p>
                                            <p class="card-text secondary-txt">Sun - 6pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id='RMC' class="card movie-panel secondary-bg">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="card-img-top movie-poster" src="images/top-end-wedding.jpg" alt="Top End Wedding">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p class="primary-txt movie-title"><b>Top End Wedding</b></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p>M</p>
                                            </div>
                                        </div>
                                        <div class="indent-2">
                                            <p class="card-text secondary-txt">Mon - 6pm</p>
                                            <p class="card-text secondary-txt">Tue - 6pm</p>
                                            <p class="card-text secondary-txt">Wed - </p>
                                            <p class="card-text secondary-txt">Thu - </p>
                                            <p class="card-text secondary-txt">Fri - </p>
                                            <p class="card-text secondary-txt">Sat - 3pm</p>
                                            <p class="card-text secondary-txt">Sun - 3pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id='ANM' class="card movie-panel secondary-bg">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="card-img-top movie-poster" src="images/dumbo.jpg" alt="Dumbo">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p class="primary-txt movie-title"><b>Dumbo</b></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p>PG</p>
                                            </div>
                                        </div>
                                        <div class="indent-2">
                                            <p class="card-text secondary-txt">Mon - 12pm</p>
                                            <p class="card-text secondary-txt">Tue - 12pm</p>
                                            <p class="card-text secondary-txt">Wed - 6pm</p>
                                            <p class="card-text secondary-txt">Thu - 6pm</p>
                                            <p class="card-text secondary-txt">Fri - 6pm</p>
                                            <p class="card-text secondary-txt">Sat - 12pm</p>
                                            <p class="card-text secondary-txt">Sun - 12pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id='AHF' class="card movie-panel secondary-bg">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="card-img-top movie-poster" src="images/the-happy-prince.jpg" alt="The Happy Prince">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p class="primary-txt movie-title"><b>The Happy Prince</b></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p>R</p>
                                            </div>
                                        </div>
                                        <div class="indent-2">
                                            <p class="card-text secondary-txt">Mon - </p>
                                            <p class="card-text secondary-txt">Tue - </p>
                                            <p class="card-text secondary-txt">Wed - 12pm</p>
                                            <p class="card-text secondary-txt">Thu - 12pm</p>
                                            <p class="card-text secondary-txt">Fri - 12pm</p>
                                            <p class="card-text secondary-txt">Sat - 9pm</p>
                                            <p class="card-text secondary-txt">Sun - 9pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='synopsis-area' class="primary-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-9 mg-auto">
                                    <h1 id='synopsis-title'>Avengers: Endgame</h1>
                                </div>
                                <div class="col-lg-3 mg-auto">
                                    <h2 id='age-rating' class='secondary-txt'>PG-13</h2>
                                </div>
                                <div class='mg-vertical'>
                                    <h2>Plot description</h2>
                                    <p id='plot-description'>
                                        After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to the
                                        efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once
                                        more in order to undo Thanos's actions and undo the chaos to the universe, no matter what
                                        consequences
                                        may be in store, and no matter who they face...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <iframe id='trailer' src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Make a Booking:</h2>
                        </div>
                        <div class="col-sm-8">
                            <button class='time-booking' value='MON'>MON - </button>
                            <button class='time-booking' value='TUE'>TUE - </button>
                            <button class='time-booking' value='WED'>WED - 9pm</button>
                            <button class='time-booking' value='THU'>THU - 9pm</button>
                            <button class='time-booking' value='FRI'>FRI - 9pm</button>
                            <button class='time-booking' value='SAT'>SAT - 6pm</button>
                            <button class='time-booking' value='SUN'>SUN - 6pm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id='booking-area' class='secondary-bg'>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label id='movie-info' class='primary-txt'></label>
                    <input id='movie-id' name='movie[id]' hidden>
                    <input id='movie-day' name='movie[day]' hidden>
                    <input id='movie-hour' name='movie[hour]' hidden>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='seat-booking'>
                                <label class='bigger-text'>Standard</label>
                                <div class="form-group">
                                    <label for='STA'>Adults</label>
                                    <select name='seats[STA]' id='STA' class='seat-option'>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for='STP'>Concession</label>
                                    <select name='seats[STP]' id='STP' class='seat-option'>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for='STC'>Children</label>
                                    <select name='seats[STC]' id='STC' class='seat-option'>
                                    </select>
                                </div>
                            </div>
                            <div class='seat-booking'>
                                <label class='bigger-text'>First class</label>
                                <div class="form-group">
                                    <label for='FCA'>Adults</label>
                                    <select name='seats[FCA]' id='FCA' class='seat-option'>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for='FCP'>Concession</label>
                                    <select name='seats[FCP]' id='FCP' class='seat-option'>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for='FCC'>Children</label>
                                    <select name='seats[FCC]' id='FCC' class='seat-option'>
                                    </select>
                                </div>
                            </div>
                            <?php displayError($warning)?>
                        </div>
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <label for="cust[name]">Name</label>
                                <input title='Please enter a valid name.' type="text" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" id="cust-name" name="cust[name]" required>
                                <?php displayError($nameErr)?>
                            </div>
                            <div class="form-group">
                                <label for="cust[email]">Email</label>
                                <input type="email" id="cust-email" name="cust[email]" required>
                                <?php displayError($emailErr)?>
                            </div>
                            <div class="form-group">
                                <label type='tel' for="cust[mobile]">Mobile</label>
                                <input title='Please enter a valid Australian mobile phone number' type="text" pattern="^(\(04\)|04|\+614)( ?\d){8}$" id="cust-mobile" name="cust[mobile]" required>
                                <?php displayError($phoneErr)?>
                            </div>
                            <div class="form-group">
                                <label for="cust[card]">Credit Card</label>
                                <input title='Credit card number must have 14-19 digits.' type="text" pattern="^(\d\s?){14,19}$" id="cust-card" name="cust[card]" required>
                                <?php displayError($cardErr)?>
                            </div>
                            <div class="form-group">
                                <label for="cust[expiry]">Expiry</label>
                                <input type='month' id='cust-expiry' name='cust[expiry]' min='2020-01' required>
                                <?php displayError($expiryErr)?>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-10'>
                            <label id='price-display' class='primary-txt bigger-text'>Price: </label>
                            <?php displayError($priceErr)?>
                        </div>
                        <div class='col-sm-2'>
                            <input id='order' name='order' type="submit" value="Order" class="secondary-txt primary-bg btn pull-right">
                        </div>
                    </div>
                </form>
            </div>
            <div class='superglobal'>
                <h3>$_GET contains:</h3>
                <pre><?php print_r($_GET); ?></pre>
                <h3>$_POST contains:</h3>
                <pre><?php print_r($_POST) ?></pre>
                <h3>$_SESSION contains:</h3>
                <pre><?php print_r($_SESSION) ?></pre>
                <h3>This page code: </h3>
                <?php printMyCode() ?>
            </div>
        </section>
    </main>
    <footer class='secondary-txt'>
        <div>&copy;
            <script>
                document.write(new Date().getFullYear());
            </script> Truong Duc Khai, s3818074. Last modified
            <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
            Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>