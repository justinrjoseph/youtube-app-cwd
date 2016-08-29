$(document).ready(function() {
    $requestRunning = false;
    
    $(document).on('click', '.actions .remove', function() {
        if ( $requestRunning ) {
            return;
        }
        
        $this = $(this);
        $id = $this.attr('id').split('-');
        $id = $id[1];
        
        $.ajax({
            url: 'ajax/remove-favorites.ajax.php',
            type: 'POST',
            data: {
                'user_id' : $userID,
                'movie_id' : $id
            },
            beforeSend: function() {
                $requestRunning = true;
                $('.trash').addClass('trash_hover');
            },
            success: function() {
                $requestRunning = false;
                $('.trash').removeClass('trash_hover');
                
                $this.html('<p>Add to Favorites</p>').removeClass('remove').addClass('add');
                
                $('li#favorite-' + $id).remove();
            }
        });
    });
});

