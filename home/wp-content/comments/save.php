<?php
include 'db.php';
$name = $_POST["name"];
$oauth_provider = $_POST['oauth_provider']; 
$comment = $_POST['comment'];
$picture  = $_POST['picture'];
$book = $_POST['book'];
$email = $_POST['email'];

$db->query("ALTER TABLE $book DROP `id`");
$db->query("ALTER TABLE $book AUTO_INCREMENT = 1");
$db->query("ALTER TABLE $book ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
$sql = "INSERT INTO $book VALUES (0, '$oauth_provider','$name','$picture','$email','$comment','NOW()')";
if ($db->query($sql) === TRUE) {
    echo "Your data saved successfully";
} else {
   echo "Error: " . $sql . "<br>" . $db->error;
}
?>