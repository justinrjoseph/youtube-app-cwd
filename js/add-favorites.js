$(document).ready(function() {
    $(this).on('mouseover mouseout', '.non-favorites li', function() {
        $('.add', this).toggleClass('favorite');
    });
    
    $requestRunning = false;
    
    $(document).on('click', '.non-favorites .add', function() {
        if ( $requestRunning ) {
            return;
        }
        
        $this = $(this);
        $movie = $this.closest('li');
        $id = $movie.attr('id').split('-');
        $id = $id[1];
        $title = $this.siblings('h3').text();
        $description = $this.siblings('.description').text();
        
        $.ajax({
            url: 'ajax/add-favorites.ajax.php',
            type: 'POST',
            data: {
                'user_id' : $userID,
                'movie_id' : $id
            },
            beforeSend: function() {
                $requestRunning = true;
                $movie.remove();
                $('.highlight').removeClass('highlight');
                $('.loader-large').removeClass('hidden');
                $('body').not('loader-large').addClass('dim');
            },
            success: function() {
                $requestRunning = false;
                
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
                
                $('p.welcome').text('').removeClass('like-all like-none no-border-bottom').addClass('like-some');
                $('.trash, .favorites, .non-favorites').removeClass('hidden');
                $('.favorites-list h2').text('Favorites');
                
                if ( $('.favorites li').length === 0 ) {
                    $('p.welcome').text('').removeClass('like-some').addClass('like-none');
                    $('.trash, .favorites, .non-favorites').addClass('hidden');
                    $('.favorites-list h2').text('You haven\'t chosen a movie as a Favorite yet.');
                    $('.non-favorites').removeClass('hidden');
                }
                
                if ( $('.non-favorites li').length === 0 ) {
                    $('p.welcome').text('').removeClass('like-some').addClass('like-all no-border-bottom');
                    $('.trash, .favorites').removeClass('hidden');
                    $('.non-favorites').addClass('hidden');
                    $('.favorites-list h2').text('Favorites');
                }
            }
        });
    });
});

