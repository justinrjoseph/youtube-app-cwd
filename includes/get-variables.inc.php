<?php

if ( isset($_GET['user_id']) ) {
  $user_id = $_GET['user_id'];
}

if ( isset($_GET['movie_id']) ) {
  $movie_id = $_GET['movie_id'];
}

if ( isset($_GET['page']) ) {
  $page = $_GET['page'];
} else {
  $page = 'error';
}

?>