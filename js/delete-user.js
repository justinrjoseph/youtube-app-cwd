$(document).ready(function() {
   
   $(this).on('mouseover mouseout', '.delete-cell', function() {
      $('.delete', this).toggleClass('hidden');
   });
   
   $(this).on('click', '.delete', function() {
      $this = $(this);
      $id = $this.closest('tr').attr('id').split('-');
      $id = $id[1];
      
      $.ajax({
          url: 'ajax/delete-user.ajax.php',
          type: 'POST',
          data: { user_id: $id },
          beforeSend: function() {
              $this.removeClass('delete').addClass('loader-small');
          },
          success: function() {
              $('tr#user-' + $id).remove();
          }
      })
   });
    
});