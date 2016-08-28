<?php $users = showUsers('admin'); ?>

        <section class="admin">
          <div class="admin-users">
            <?php if ( $test_users != 'no_data' ) : ?>
              <h2>Manage Users</h2>
            <?php endif; ?>
            <table class="admin-table">
              <tr>
                <th class="data-column">First Name</th>
                <th class="data-column">Last Name</th>
                <th class="admin-column">Insert/Delete</th>
              </tr>
              <?php echo $users; ?>
              <tr class="new-data-row">
                <td><input class="new-data" type="text" name="firstname" value=""></td>
                <td><input class="new-data" type="text" name="lastname" value=""></td>
                <td class="insert-cell"><div class="insert"></div></td>
              </tr>                
            </table>
          </div>
        </section>