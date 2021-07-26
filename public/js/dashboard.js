$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        let direction = document.getElementById('main').dir;
        if(direction === 'ltr'){
            $('#sidebar').toggleClass('active');
        }else{
            $('#sidebar').toggleClass('in_active');
        }
    });
});