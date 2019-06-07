<?php
/**********************************************************
 * File: dbConnect.php
 * Author: Br. Burton
 *
 * Description: Shows how to connect using either local
 * OR Heroku credentials, depending on whether the code
 * is executing at heroku.
 ***********************************************************/
function get_db() {
    $db = NULL;
    try {
        // default Heroku Postgres configuration URL
        $dbUrl = getenv('DATABASE_URL');
        if (!isset($dbUrl) || empty($dbUrl)) {
            // example localhost configuration URL with user: "ta_user", password: "ta_pass"
            // and a database called "scripture_ta"
            $dbUrl = "postgres://ta_user:ta_pass@localhost:5432/login_test";
            // NOTE: It is not great to put this sensitive information right
            // here in a file that gets committed to version control. It's not
            // as bad as putting your Heroku user and password here, but still
            // not ideal.

            // It would be better to put your local connection information
            // into an environment variable on your local computer. That way
            // it would work consistently regardless of whether the application
            // were running locally or at heroku.
        }
        // Get the various parts of the DB Connection from the URL
        $dbopts = parse_url($dbUrl);
        $dbHost = $dbopts["ec2-54-235-167-210.compute-1.amazonaws.com"];
        $dbPort = $dbopts["5432"];
        $dbUser = $dbopts["bgioyeuxgspzay"];
        $dbPassword = $dbopts["2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa"];
        $dbName = ltrim($dbopts["dedc617q6k4b6s"],'/');
        // Create the PDO connection
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex) {
        // If this were in production, you would not want to echo
        // the details of the exception.
        echo "Error connecting to DB. Details: $ex";
        die();
    }
    return $db;
}