$(document).ready(function() {
    
   $(this).on('focus', '.new-data-row', function() {
      $('.insert').removeClass('hidden');
   }).on('click', '.insert', function() {
       $this = $(this);
       
       $firstname = $('input.new-data[name=firstname]').val();
       $lastname = $('input.new-data[name=lastname]').val();
       
       if ( $firstname === '' && $lastname === '' ) {
           alert('Please enter at least a first name.');
           return;
       }
       
       $.ajax({
          url: 'ajax/add-user.ajax.php',
          type: 'POST',
          data: {
              firstname: $firstname,
              lastname: $lastname
          },
          beforeSend: function() {
              $this.removeClass('insert').addClass('loader-small');
              $('.delete').removeClass('success').addClass('hidden');
          },
          success: function() {
              $('input.new-data').val('');
              
              $output =  '<tr class="data-row">';
              $output += '<td><input class="data" type="text" name="firstname" value="' + $firstname + '"></td>';
              $output += '<td><input class="data" type="text" name="lastname" value="' + $lastname + '"></td>';
              $output += '<td class="delete-cell"><div class="delete hidden"></div></td>';
              $output += '</tr>';
              
              $('.admin-table tr:last').before($output);
              
              $output =  '<li>';
              $output += '<a href="/?user_id=' + $id + '">' + $firstname + ' ' + $lastname + '</a>';
              $output += '</li>';
              
              $('.users-menu').append($output);
              $('.users-menu li').tsort();
              
              $('.delete:last').removeClass('loader-small').addClass('success');
              $this.removeClass('loader-small').addClass('insert');
              
              $(document).on('mouseover', '.delete-cell', function() {
                 $('.delete', this).removeClass('hidden success');
              });
          }
       });
   });
    
});