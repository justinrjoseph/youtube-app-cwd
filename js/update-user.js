$(document).ready(function() {
   
   $(this).on('focus', '.data', function() {
       $this = $(this);
       $id = $this.closest('tr').attr('id').split('-');
       $id = $id[1];
       
       $thisName = $this.val();
       $thisField = $this.attr('name');
       
       if ( $thisField === 'firstname' ) {
           $otherField = 'lastname';
       } else {
           $otherField = 'firstname';
       }
       
       $otherName = $('tr#user-' + $id + ' .data[name=' + $otherField + ']').val();
       
       $this.on('focusout', function() {
           $updatedName = $this.val();
           
           if ( $thisName !== $updatedName ) {
               $.ajax({
                  url: 'ajax/update-user.ajax.php',
                  type: 'POST',
                  data: {
                      id: $id,
                      thisField: $thisField,
                      updatedFirstName: $updatedName
                  },
                  beforeSend: function() {
                      $('.success').removeClass('success').addClass('delete hidden');
                      $('#user-' + $id + ' .delete-cell div').removeClass('delete hidden').addClass('loader-small');
                  },
                  success: function() {
                      $('.loader-small').removeClass('loader-small').addClass('success');
                      
                      $(document).on('mouseover', '.delete-cell', function() {
                         $('.success', this).addClass('delete').removeClass('hidden success');
                      });
                  }
               });
               
              $output =  '<li id="user-list-' + $id + '">';
              
              if ( $thisField === 'firstname' ) {
                $output += '<a href="/?user_id=' + $id + '">' + $updatedName + ' ' + $otherName + '</a>';    
              } else {
                $output += '<a href="/?user_id=' + $id + '">' + $otherName + ' ' + $updatedName + '</a>';
              }
              
              $output += '</li>';
              
              $('li#user-list-' + $id).remove();
              $('.users-menu').append($output);
              $('.users-menu li').tsort();
              
           }
       });
   });
    
});