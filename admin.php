<?php require_once 'includes/head.inc.php'; ?>

<?php require_once 'includes/header.inc.php'; ?>
    
<?php require_once 'includes/navigation.inc.php'; ?>
    
    <section class="admin">
      <div class="admin-users">
        <h2>Manage Users</h2>
        
        <table class="admin-table">
          <tr>
            <th class="data-column">First Name</th>
            <th class="data-column">Last Name</th>
            <th class="admin-column">Add/Delete</th>
          </tr>
          <tr class="data-row">
            <td><input class="data" type="text" name="firstname" value="John"></td>
            <td><input class="data" type="text" name="lastname" value="Adams"></td>
            <td class="delete-cell"><div class="delete"></div></td>
          </tr>
          <tr class="data-row">
            <td><input class="data" type="text" name="firstname" value="John"></td>
            <td><input class="data" type="text" name="lastname" value="Smith"></td>
            <td class="delete-cell"><div class="success"></div></td>
          </tr>
          <tr class="new-data-row">
            <td><input class="new-data" type="text" name="firstname" value=""></td>
            <td><input class="new-data" type="text" name="lastname" value=""></td>
            <td class="insert-cell"><div class="insert"></div></td>
          </tr>
        </table>
      </div>
    </section>
    
<?php require_once 'includes/footer.inc.php'; ?>