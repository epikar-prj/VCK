<?

function setSession($user_id, $user_nm, $user_email, $user_hp) {
    session_start();
    
    $id = session_id();

    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_nm'] = $user_nm;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_hp'] = $user_hp;

}

function removeSession() {
    session_start();
    session_destroy();
}

?>

