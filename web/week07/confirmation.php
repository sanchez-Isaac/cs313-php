<?PHP
session_start();


if (isset($_POST['Submit'])) {
    $_SESSION['first_name'] = test_input($_POST['first_name']);
    $_SESSION['middle_name'] = test_input($_POST['middle_name']);
    $_SESSION['last_name'] = test_input($_POST['last_name']);
    $_SESSION['email'] = test_input($_POST['email']);
    $_SESSION['street'] = test_input($_POST['street']);
    $_SESSION['ext_home_number'] = test_input($_POST['ext_home_number']);
    $_SESSION['city']  = test_input($_POST['city']);
    $_SESSION['country'] = test_input($_POST['country']);
    $_SESSION['state'] = test_input($_POST['state']);
    $_SESSION['zip'] = test_input($_POST['zip']);
    $_SESSION['telephone'] = test_input($_POST['telephone']);

    header("Location:thankyou.php");


}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
pre_r($_SESSION);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

*/
?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title>Confirmation Page</title>
    <link href="03ProveStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="CustomStyles.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">
    <div style="clear:both"></div>
    <br/>
    <div>
        <h1 class="mb-3">Billing address</h1><br>
        <form  method="post" action="">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    </div>
                </div>
                 <div class="col-md-6 mb-3">
                    <label for="firstName">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="" value="" >
                    <div class="invalid-feedback">
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="" required>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>
            <br>


            <div class="mb-3">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="you@example.com">
                <div class="invalid-feedback">

                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="telephone">Telephone </label>
                <input type="tel" class="form-control" id="telephone" name="telephone"  placeholder="9784274489">
                <div class="invalid-feedback">

                </div>
            </div>
            <br>

            <div class="mb-3">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" placeholder="Main St" required>
                <div class="invalid-feedback">

                </div>
            </div>
            <br>

            <div class="mb-3">
                <label for="ext_home_number">Street #</label>
                <input type="text" class="form-control" id="ext_home_number" name="ext_home_number" placeholder="567">
            </div>
            <br>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select class="custom-select d-block w-100" id="country" name="country" required>
                        <option value="">Choose...</option>
                        <option>United States</option>
                        <option>United States</option>
                        <option>United States</option>
                        <option>United States</option>
                        <option>United States</option>
                        <option>United States</option>
                        <option>United States</option>
                    </select>
                </div>

                <div class="col-md-5 mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Los Angeles" required>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="city" name="state" placeholder="California" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                <br>
                <div class="col-md-4 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder=""  name="zip" required>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <br>
            <br>

            <button class="btn btn-primary btn-lg" value="submit" name="Submit" type="submit"> Confirm </button>



            <br>
            <br>

            <div>
                <button class="btn-warning btn btn-lg">
                    <a href="viewcart.php">
                        Back to Shopping cart
                    </a>
                </button>
            </div>
        </form>

    </div>




















</body>
</html>
