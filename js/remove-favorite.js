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
                $('.loader-large').removeClass('hidden');
                $('body').not('loader-large').addClass('dim');
            },
            success: function() {
                $requestRunning = false;
                $('.trash').removeClass('trash_hover');
                
                $this.html('<p>Add to Favorites</p>').removeClass('remove').addClass('add');
                
                $('li#favorite-' + $id).remove();
                
                $('.trash, .favorites, .non-favorites').removeClass('hidden');
                $('.favorites-list h2').text('Favorites');
                
                if ( $('.favorites li').length === 0 ) {
                    $('.trash, .favorites, .non-favorites').addClass('hidden');
                    $('.favorites-list h2').text('You haven\'t chosen a movie as a Favorite yet.');
                    $('.non-favorites').removeClass('hidden');
                }
                
                $('.loader-large').addClass('hidden');
                $('body').not('loader-large').removeClass('dim');
            }
        });
    });
});

