<?PHP
session_start();
if (isset($_POST['Submit'])) {
    $_SESSION['firstName'] = test_input($_POST['firstName']);
    $_SESSION['lastName'] = test_input($_POST['lastName']);
    $_SESSION['email'] = test_input($_POST['email']);
    $_SESSION['address'] = test_input($_POST['address']);
    $_SESSION['address2'] = test_input($_POST['address2']);
    $_SESSION['country'] = test_input($_POST['country']);
    $_SESSION['state'] = test_input($_POST['state']);
    $_SESSION['zip'] = test_input($_POST['zip']);
}
function test_input($data) {
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
**/
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Checkout</title>
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
        <form class="needs-validation" novalidate="" method="post" action="thankyou.php">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>
            <br>


            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <br>

            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>
            <br>

            <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
            </div>
            <br>

            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select class="custom-select d-block w-100" id="country" name="country" required="">
                        <option value="">Choose...</option>
                        <option>United States</option>


                    </select>
                    <div class="invalid-feedback">
                        Please select a valid country.
                    </div>
                </div>


                <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <select class="custom-select d-block w-100" id="state" name="state" required="">
                        <option value="">Choose...</option>
                        <option>CA</option>
                        <option>MA</option>
                        <option>NH</option>
                        <option>NC</option>
                        <option>SC</option>
                        <option>NY</option>

                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder=""  name="zip"required="">
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-lg" name="Submit" type="submit">Purchase</button>
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
