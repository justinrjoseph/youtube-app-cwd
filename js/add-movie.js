$(document).ready(function() {
    
   $(this).on('focus', '.new-data-row', function() {
      $('.insert').removeClass('hidden');
   }).on('click', '.insert', function() {
       $this = $(this);
       
       $title = $('input.new-data[name=title]').val();
       $description = $('input.new-data[name=description]').val();
       
       if ( $title === '' && $description === '' ) {
           alert('Please enter at least a title.');
           return;
       }
       
       $.ajax({
          url: 'ajax/add-movie.ajax.php',
          type: 'POST',
          data: {
              title: $title,
              description: $description
          },
          beforeSend: function() {
              $this.removeClass('insert').addClass('loader-small');
              $('.delete').removeClass('success').addClass('hidden');
          },
          success: function(response) {
              $movieID = response;
              
              $('input.new-data').val('');
              
              $title = $title.replace(/'/g, '&apos;');
              $description = $description.replace(/'/g, '&apos;');
              
              $output =  '<tr id="movie-' + $movieID + '" class="data-row">';
              $output += '<td><input class="data" type="text" name="title" value="' + $title + '"></td>';
              $output += '<td><input class="data" type="text" name="description" value="' + $description + '"></td>';
              $output += '<td class="delete-cell"><div class="delete hidden"></div></td>';
              $output += '</tr>';
              
              $('.admin-table tr:last').before($output);
              
              $('.delete:last').removeClass('loader-small').addClass('success');
              $this.removeClass('loader-small').addClass('insert');
              
              $(document).on('mouseover', '.delete-cell', function() {
                 $('.delete', this).removeClass('hidden success');
              });
          }
       });
   });
    
});