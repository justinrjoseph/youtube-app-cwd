<?php $movies = showMovies('admin'); ?>

        <section class="admin">
          <div class="admin-movies">
            <?php if ( !isset($test_movies) || $test_movies != 'no_data' ) : ?>
              <h2>Manage Movies</h2>
            <?php endif; ?>
            <table class="admin-table">
              <tr>
                <th class="data-column">Title</th>
                <th class="data-column description">Description</th>
                <th class="admin-column">Insert/Delete</th>
              </tr>
              <?php echo $movies; ?>
              <tr class='new-data-row'>
                <td><input class='new-data' type='text' name='title' value=''></td>
                <td><input class='new-data' type='text' name='description' value=''></td>
                <td class='insert-cell'><div class="insert hidden"></div></td>
              </tr>
            </table>
          </div>
        </section>