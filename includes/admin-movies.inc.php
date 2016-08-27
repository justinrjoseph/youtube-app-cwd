        <section class="admin">
          <div class="admin-movies">
            <h2>Manage Movies</h2>
            <table class="admin-table">
              <tr>
                <th class="data-column">Title</th>
                <th class="data-column description">Description</th>
                <th class="admin-column">Insert/Delete</th>
              </tr>
              <tr class="data-row">
                <td><input class="data" type="text" name="title" value="Life of Pi"></td>
                <td><input class="data" type="text" name="description" value="A very silly pun."></td>
                <td class="delete-cell"><div class="delete"></div></td>
              </tr>
              <tr class="data-row">
                <td><input class="data" type="text" name="title" value="Life of Brian"></td>
                <td><input class="data" type="text" name="description" value="A biopic of Brian."></td>
                <td class="delete-cell"><div class="delete"></div></td>
              </tr>          
              <tr class='new-data-row'>
                <td><input class='new-data' type='text' name='title' value=''></td>
                <td><input class='new-data' type='text' name='description' value=''></td>
                <td class='insert-cell'><div></div></td>
              </tr>
            </table>
          </div>
        </section>