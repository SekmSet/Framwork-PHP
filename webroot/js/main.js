$('#button_changes_profil').click(function() {
    $('#form_change_profil').show();
    $(this).hide();
});
console.log('kfe');

$('.button_option').click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    console.log('button', id);
    $('#list_option_'+id).toggle();
});
