$(document).ready(function() {
   
   $(this).on('focus', '.data', function() {
       $this = $(this);
       $id = $this.closest('tr').attr('id').split('-');
       $id = $id[1];
       
       $thisTitle = $this.val();
       $thisField = $this.attr('name');
       
       if ( $thisField === 'title' ) {
           $otherField = 'description';
       } else {
           $otherField = 'title';
       }
       
       $otherName = $('tr#movie-' + $id + ' .data[name=' + $otherField + ']').val();
       
       $this.on('focusout', function() {
           $updatedTitle = $this.val();
           
           if ( $thisTitle !== $updatedTitle ) {
               $.ajax({
                  url: 'ajax/update-movie.ajax.php',
                  type: 'POST',
                  data: {
                      id: $id,
                      thisField: $thisField,
                      updatedTitle: $updatedTitle
                  },
                  beforeSend: function() {
                      $('.success').removeClass('success').addClass('delete hidden');
                      $('#movie-' + $id + ' .delete-cell div').removeClass('delete hidden').addClass('loader-small');
                  },
                  success: function() {
                      $('.loader-small').removeClass('loader-small').addClass('success');
                      
                      $(document).on('mouseover', '.delete-cell', function() {
                         $('.success', this).addClass('delete').removeClass('hidden success');
                      });
                  }
               });
               
              $output =  '<li id="movie-list-' + $id + '">';
              
              if ( $thisField === 'title' ) {
                $output += '<a href="/?movie_id=' + $id + '">' + $updatedTitle + ' ' + $otherName + '</a>';    
              } else {
                $output += '<a href="/?movie_id=' + $id + '">' + $otherName + ' ' + $updatedTitle + '</a>';
              }
              
              $output += '</li>';
              
              $('li#movie-list-' + $id).remove();
              $('.movies-menu').append($output);
              $('.movies-menu li').tsort();
              
           }
       });
   });
    
});