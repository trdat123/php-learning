<?php
// include_once 'login.php';

// $username =$_GET['username'];
// $password = $_GET['password'];
// $sql = "select * from login where username = '".$username."' and password = '".$password."';";
// echo $sql;

// $records = mysqli_query($conn, $sql);

// $numRecords = mysqli_num_rows($records);

// if($numRecords > 0) {
//   echo "Succeed";
// } else {
//   echo "Failed";
// }
if (!isset($_POST['submit'])) {

    header("Location: index.php?SignupError");
} else {

    include_once 'login.php';

    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT) ;
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($user) || empty($pass) || empty($first) || empty($last) || empty($email)) {
        header("Location: index.php?SignupEmpty");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: index.php?SignUpCharError");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: index.php?SignUpEmailError&first=$first&last=$last&user=$user");
                exit();
            } else {
                //success
                $sql = "Insert into login (username, password, Firstname, Lastname, Email) 
                values (?, ?, ?, ?, ?);";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL error";
                } else {
                    mysqli_stmt_bind_param($stmt, "sssss", $user, $pass, $first, $last, $email);
                    mysqli_stmt_execute($stmt);
                }
                header("Location: index.php?SignupSuccess&password=$pass");
            }
        }
    }
}
