<?php require_once 'includes/head.inc.php'; ?>

<?php require_once 'includes/header.inc.php'; ?>
    
<?php require_once 'includes/navigation.inc.php'; ?>
    
<?php require_once 'includes/favorites.inc.php'; ?>
    
    <section class="movie-list">
      <h2>Hi, (username)</h2>
      
      <p class="welcome">Here are some movies you might like. Click the heart icon to add a movie to your list of favorites.</p>
      
      <ul>
        <li>
          <figure>
            <a href="#"><img src="img/thumbnail.png" class="thumbnail" alt="Thumbnail"></a>
            <figcaption>
              <h3><a href="#">Movie Title</a></h3>
              <div class="descripton">Movie Description</div>
              <div class="add-remove favorite"></div>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <a href="#"><img src="img/thumbnail.png" class="thumbnail" alt="Thumbnail"></a>
            <figcaption>
              <h3><a href="#">Movie Title</a></h3>
              <div class="descripton">Movie Description</div>
              <div class="add-remove favorite"></div>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <a href="#"><img src="img/thumbnail.png" class="thumbnail" alt="Thumbnail"></a>
            <figcaption>
              <h3><a href="#">Movie Title</a></h3>
              <div class="descripton">Movie Description</div>
              <div class="add-remove favorite"></div>
            </figcaption>
          </figure>
        </li>
      </ul>
    </section>
    
<?php require_once 'includes/footer.inc.php'; ?>