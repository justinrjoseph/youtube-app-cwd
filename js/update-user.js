$(document).ready(function() {
   
   $(this).on('focus', '.data[name=firstname]', function() {
       $this = $(this);
       $id = $this.closest('tr').attr('id').split('-');
       $id = $id[1];
       
       $firstname = $this.val();
       $lastname = $('tr#user-' + $id + ' .data[name=lastname]').val();
       
       $this.on('focusout', function() {
           $updatedName = $this.val();
           
           if ( $firstname !== $updatedName ) {
               $.ajax({
                  url: 'ajax/update-user.ajax.php',
                  type: 'POST',
                  data: {
                      id: $id,
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
              $output += '<a href="/?user_id=' + $id + '">' + $updatedName + ' ' + $lastname + '</a>';
              $output += '</li>';
              
              $('li#user-list-' + $id).remove();
              $('.users-menu').append($output);
              $('.users-menu li').tsort();
              
           }
       })
   })
    
});