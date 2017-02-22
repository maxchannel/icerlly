$('.pagination').hide();

$('#tuits').infinitescroll({
    navSelector     : ".pagination",
    nextSelector    : ".pagination a:last",
    itemSelector    : ".post",
    debug           : false,
    dataType        : 'html',
    path: function(index) {
        return "?page=" + index;
    },
    loading: {
        finishedMsg: '<p class="text-center"><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"> Final<p>',
        //msgText    : '<p class="text-center">Loading...</p>',
        speed: 'slowly',
    }
}, function(newElements, data, url){

    var $newElems = $( newElements );
    $('#tuits').masonry( 'appended', $newElems, true);

});