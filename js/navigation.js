$(document).ready(function() {
   
   $('.select-users, .users-menu').on('mouseover', function() {
      $('.users-menu').removeClass('hidden');
      $('.admin-menu').addClass('hidden');
   });
   
   $('.users-menu, .admin-menu').on('mouseout', function() {
      $(this).addClass('hidden');
   });
   
   $('.admin-button, .admin-menu').on('mouseover', function() {
      $('.users-menu').addClass('hidden');
      $('.admin-menu').removeClass('hidden');
   });
    
});