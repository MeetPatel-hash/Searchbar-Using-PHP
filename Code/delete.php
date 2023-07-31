<?php
include 'layout/function.php';

$id = $_GET['id'];

$user = new user();

$img_query = $user->deleteUserimg($id);

$img_fetch = $img_query->fetch_assoc();
$image = $img_fetch['image'];

if ($img_query) {
    unlink("image/".$image);
    $user->deleteUser($id);
    header("location:view.php");
} else {
  echo "Error deleting record: " . $user->error;
}

?>
