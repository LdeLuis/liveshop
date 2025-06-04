$(document).ready(function() {
    $(document).on('click', '.pagination-link', function(e) {
        e.preventDefault(); // Evita la recarga de la página
        let pageUrl = $(this).attr('href'); // Obtiene la URL de la nueva página

        $.ajax({
            url: pageUrl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.catalogoHtml && response.paginationHtml) {
                    $("#catalogo-section").html(response.catalogoHtml);
                    $(".custom-pagination").html(response.paginationHtml);

                    // Mover la pantalla a la sección del catálogo
                    $('html, body').animate({
                        scrollTop: $("#catalogo-section").offset().top
                    }, 500);
                }
            },
            error: function() {
                alert('Error al cargar la página. Inténtalo de nuevo.');
            }
        });
    });
});
