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
                
                $this.html('<p>Remove from Favorites</p>').removeClass('add').addClass('remove');
            }
        });
    });
});

