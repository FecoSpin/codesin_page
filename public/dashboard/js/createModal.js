(function ($) {
    "use strict";
    // imagenes
    
    
    // Modal para crear noticias
    if(window.location.hash == '#create-noticias')
    {
        $('#noticias').modal('show');
    }
    $('#noticias').on('hide.bs.modal',function(){
        window.location.hash = '#';
    });
    $('#noticias').on('shown.bs.modal',function(){
        $('#title').focus();
        window.location.hash = '#create-noticias';
    });

    // Modal para crar projectos
    if(window.location.hash == '#create-proyectos')
        {
            $('#proyectos').modal('show');
        }
        $('#proyectos').on('hide.bs.modal',function(){
            window.location.hash = '#';
        });
        $('#proyectos').on('shown.bs.modal',function(){
            $('#title').focus();
            window.location.hash = '#create-proyectos';
        });
    
    // Modal para crear Politicas

    if(window.location.hash == '#create-politicas')
    {
        $('#politicas').modal('show');
    }
    $('#politicas').on('hide.bs.modal',function(){
        window.location.hash = '#';
    });
    $('#politicas').on('shown.bs.modal',function(){
        $('#title').focus();
        window.location.hash = '#create-politicas';
    });
    // Modal para crar projectos
    if(window.location.hash == '#create-projects')
        {
            $('#projects').modal('show');
        }
        $('#projects').on('hide.bs.modal',function(){
            window.location.hash = '#';
        });
        $('#projects').on('shown.bs.modal',function(){
            $('#title').focus();
            window.location.hash = '#create-projects';
        });
})(jQuery);