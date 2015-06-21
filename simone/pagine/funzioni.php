<?php
function reindirizza($paginainterna=0) {
  $location="Location: ../index.php";
  if($paginainterna) $location.="?$paginainterna";
  header($location);
  exit;
}

?>