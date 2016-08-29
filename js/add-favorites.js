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
        console.log($userID);
        console.log($id);
        
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
            },
            success: function() {
                $requestRunning = false;
                
                $output =  '<li title="' + $description + '" id="favorite-' + $id + '">';
                $output += '<a href="/?user_id=' + $userID +'"&amp;movie_id="' + $id + '">';
                $output += $title;
                $output += '</a></li>';
                
                $('ul.favorites').append($output);
                
                $(".favorites li#favorite-" + $id).draggable({
                   helper: 'clone'            
                });                
            }
        });
    });
});

