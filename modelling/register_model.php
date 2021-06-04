<?php
require('getregistration.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Model Registration Form</title>

    <style>
        body {
            background-color: gray;
        }
    </style>
</head>

<body>

    <div class="container m-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header shadow">
                        <h2>Model Registration</h2>
                        <div class="float-right">
                            <a href="index.php" class="btn btn-outline-secondary">Home</a>
                        </div>
                        <p>Not a model? Click <a href="register_company.php">here</a> to <a href="register_company.php">register</a> as a company.</p>
                    </div>
                    <div class="card-body">
                        <form class="" method="POST" action="getregistration.php" enctype="multipart/form-data">
                            <input type="hidden" name="user_type" value="model">
                            <div class="row">
                                <div class="col-md-6  border-right border-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="">First Name:</label>
                                                <input class="form-control" type="text" name="firstname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="">Last Name:</label>
                                                <input class="form-control" type="text" name="lastname" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="">Date Of Birth:</label>
                                            <input class="form-control" type="date" name="dob" id="dob" required>

                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="">Phone Number:</label>
                                            <input class="form-control" type="tel" name="phoneNo" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="email">Email Address: </label>
                                            <input class="form-control" type="email" name="email" placeholder="email@gmail.com" required>

                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group">
                                        <label class="" for="uploadImage">Profile Image</label>
                                        <input class="form-control" type="file" name="uploadImage" id="image">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="text-center">Type of Model</div><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="runaway" type="checkbox">
                                            <label class="form-check-label">Runway</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="fashion" type="checkbox">
                                            <label class="form-check-label">Fashion</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="swimsuit_lingerie" type="checkbox">
                                            <label class="form-check-label">Swimsuit/Lingerie</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="commecial" type="checkbox">
                                            <label class="form-check-label">Commercial</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="fitness" type="checkbox">
                                            <label class="form-check-label">Fitness</label>
                                        </div><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="parts" type="checkbox">
                                            <label class="form-check-label">Parts</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="promotional" type="checkbox">
                                            <label class="form-check-label">Promotional</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="glamour" type="checkbox">
                                            <label class="form-check-label">Glamour</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="model_type[]" value="print" type="checkbox">
                                            <label class="form-check-label">Print</label>
                                        </div>
                                    </div><br>
                                    <div class="row g-3">
                                        <div class="col-sm form-group">
                                            <label for="inputState" class="">State</label>
                                            <input type="text" class="form-control" name="state" id="inputState">
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputCounty" class="">County</label>
                                            <input class="form-control" name="county" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." required>
                                            <datalist id="datalistOptions">
                                                <option value="">
                                                <option value="baringo">Baringo</option>
                                                <option value="bomet">
                                                <option value="bungoma">
                                                <option value="busia">
                                                <option value="elgeyo marakwet">
                                                <option value="embu">
                                                <option value="garissa">
                                                <option value="homa bay">
                                                <option value="isiolo">
                                                <option value="kajiado">
                                                <option value="kakamega">
                                                <option value="kericho">
                                                <option value="kiambu">
                                                <option value="kilifi">
                                                <option value="kirinyaga">
                                                <option value="kisii">
                                                <option value="kisumu">
                                                <option value="kitui">
                                                <option value="kwale">
                                                <option value="laikipia">
                                                <option value="lamu">
                                                <option value="machakos">
                                                <option value="makueni">
                                                <option value="mandera">
                                                <option value="meru">
                                                <option value="migori">
                                                <option value="marsabit">
                                                <option value="mombasa">
                                                <option value="muranga">
                                                <option value="nairobi">
                                                <option value="nakuru">
                                                <option value="nandi">
                                                <option value="narok">
                                                <option value="nyamira">
                                                <option value="nyandarua">
                                                <option value="nyeri">
                                                <option value="samburu">
                                                <option value="siaya">
                                                <option value="taita taveta">
                                                <option value="tana river">
                                                <option value="tharaka nithi">
                                                <option value="trans nzoia">
                                                <option value="turkana">
                                                <option value="uasin gishu">
                                                <option value="vihiga">
                                                <option value="wajir">
                                                <option value="pokot">
                                            </datalist>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputZip" class="">Zip</label>
                                            <input type="text" class="form-control" name="zip" id="inputZip">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Experience </label>
                                            <select name="experience" class="form-control">
                                                <option value="beginner">Beginner</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="expert">Expert</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Your Height</label>
                                            <select class="form-control" name="heigth" aria-label="Default select example" required>
                                                <option selected>Choose your height</option>
                                                <option value="4.5">4.5</option>
                                                <option value="4.5">4.6</option>
                                                <option value="4.5">4.7</option>
                                                <option value="4.5">4.8</option>
                                                <option value="4.5">4.9</option>
                                                <option value="4.5">5.0</option>
                                                <option value="4.5">5.1</option>
                                                <option value="4.5">5.2</option>
                                                <option value="4.5">5.3</option>
                                                <option value="4.5">5.4</option>
                                                <option value="4.5">5.5</option>
                                                <option value="4.5">5.6</option>
                                                <option value="4.5">5.7</option>
                                                <option value="4.5">5.8</option>
                                                <option value="4.5">5.9</option>
                                                <option value="4.5">6.0</option>
                                                <option value="4.5">6.1</option>
                                                <option value="4.5">6.2</option>
                                                <option value="4.5">6.3</option>
                                                <option value="4.5">6.4</option>
                                                <option value="4.5">6.5</option>
                                                <option value="4.5">6.6</option>
                                                <option value="4.5">6.7</option>
                                                <option value="4.5">6.8</option>
                                                <option value="4.5">6.9</option>
                                                <option value="4.5">7.0</option>
                                                <option value="4.5">7.1</option>
                                                <option value="4.5">7.2</option>
                                                <option value="4.5">7.3</option>
                                                <option value="4.5">7.4</option>
                                                <option value="4.5">7.5</option>
                                                <option value="4.5">7.6</option>
                                                <option value="4.5">7.7</option>
                                                <option value="4.5">7.8</option>
                                                <option value="4.5">7.9</option>
                                                <option value="4.5">8.0</option>
                                                <option value="4.5">8.1</option>
                                                <option value="4.5">8.2</option>
                                                <option value="4.5">8.3</option>
                                                <option value="4.5">8.4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="">Describe Yourself</label>
                                <textarea class="form-control" name="dy" id=""></textarea>

                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-8">Enter your Username:<br>
                                            <input class="form-control" type="text" name="username" placeholder="username" required>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-8">Enter your password:<br>
                                            <input class="form-control" type="password" name="password" placeholder="password" required>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-8">Confirm your password:<br>
                                            <input class="form-control" type="password" name="password" placeholder="confirm your password" required>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">I accept the terms of use & policy.</label>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-success" type="submit" name="submit">Register</button>
                                    </div>
                                    <div class="row">
                                        <p class="text-center">Already registered?<a style="color:gray; " href="login.php">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>