$(document).ready(function() {
    $requestRunning = false;
    
    $(document).on('click', '.actions .add', function() {
        if ( $requestRunning ) {
            return;
        }
        
        $this = $(this);
        $id = $this.attr('id').split('-');
        $id = $id[1];
        $title = $('h3.title').text();
        $description = $('p.description').text();
        
        $.ajax({
            url: 'ajax/add-favorites.ajax.php',
            type: 'POST',
            data: {
                'user_id' : $userID,
                'movie_id' : $id
            },
            beforeSend: function() {
                $requestRunning = true;
                $('.loader-large').removeClass('hidden');
                $('body').not('loader-large').addClass('dim');
            },
            success: function() {
                $requestRunning = false;
                
                $title = $title.replace(/'/g, '&apos;');
                $description = $description.replace(/'/g, '&apos;');
                
                $output =  '<li title="' + $description + '" id="favorite-' + $id + '">';
                $output += '<a href="/?user_id=' + $userID +'"&amp;movie_id="' + $id + '">';
                $output += $title;
                $output += '</a></li>';
                
                $('ul.favorites').append($output);
                
                $('.favorites li#favorite-' + $id).draggable({
                   helper: 'clone'            
                });
                
                $added = $('li#favorite-' + $id);
                $added.addClass('highlight');
                
                $('.loader-large').addClass('hidden');
                $('body').not('loader-large').removeClass('dim');
                
                $('.favorites li').on('mouseover', function() {
                   $('.highlight').removeClass('highlight');
                });
                
                $this.html('<p>Remove from Favorites</p>').removeClass('add').addClass('remove');
                
                $('.trash, .favorites, .non-favorites').removeClass('hidden');
                $('.favorites-list h2').text('Favorites');
                
                if ( $('.favorites li').length === 0 ) {
                    $('.trash, .favorites, .non-favorites').addClass('hidden');
                    $('.favorites-list h2').text('You haven\'t chosen a movie as a Favorite yet.');
                    $('.non-favorites').removeClass('hidden');
                }
                
                if ( $('.non-favorites li').length === 0 ) {
                    $('.trash, .favorites').removeClass('hidden');
                    $('.non-favorites').addClass('hidden');
                    $('.favorites-list h2').text('Favorites');
                }
            }
        });
    });
});

