$(function(){

            var bondObjs = {};
            var bondNames = [];
            var ultimoElementoValidado;

            $(".typeahead").typeahead({
                source: function ( query, process ) {

                    //get the data to populate the typeahead (plus an id value)
                    $.ajax({
                        url: 'http://localhost/laravel/public/utilitario/listUbigeo/'+query  
                        /*url: 'bonds.json'*/
                       /* ,cache: true*/ // VALIDAR CACHE
                        ,success: function(data){
                            //reset these containers every time the user searches
                            //because we're potentially getting entirely different results from the api

                            var json_data = JSON.parse(data);

                            bondObjs = {};
                            bondNames = [];

                            $.each(json_data, function(index,item,list){

                                 bondNames.push(item.value);
                                 bondObjs[item.value] = item.id;

                            });

                            process( bondNames );

                        },
                        error: function(data){
                            console.log(data.getResponseHeader());
                        }
                    });
                },
                updater: function ( selectedName ) {
                    //save the id value into the hidden field
                    $("#ubigeo").val(bondObjs[selectedName]);
                    /*debugger;*/
                    //return the string you want to go into the textbox (the name)
                    return selectedName;
                },
                minLength: 3
            });


            //tabla de publicaciones

            /*$("#example1").dataTable();*/
            $('#publicacionesTable').dataTable({
              "bPaginate": true,
              "bLengthChange": true,
              "bFilter": true,
              "bSort": true,
              "bInfo": true,
              "bAutoWidth": false
            });

            //Modalidad No selecionable
            $('#modalidad_id').css('pointer-events','none');

            //Validacion de Formularios
            $("#formPublicacion").validate({
                ignore: "",
                rules: {
                    cobro_hora  : "required",
                    distrito    : "required",
                    ubigeo      : { distritoValid:"" , publicacionValid:""},
                    materia_id  : {
                        valueNotEquals: ""
                    },
                    modalidad_id  : {
                        valueNotEquals: ""
                    },
                    nivel_ensenanza_id  : {
                        valueNotEquals: ""
                    },
                    tipo_moneda_id  : {
                        valueNotEquals: ""
                    }
                },
                messages: {
                    cobro_hora          : "Por favor ingresé un Precio",
                    distrito            : "Por favor ingresé un Distrito",
                    ubigeo              : { 
                                                distritoValid: "Por favor ingresé un Distrito valido",
                                                publicacionValid : "El Curso con el Distrito seleccionados ya se registro anteriormente."
                                          }, 
                    materia_id          : { valueNotEquals: "Por favor selecione un Curso" },
                    modalidad_id        : { valueNotEquals: "Por favor selecione una Modalidad" },
                    nivel_ensenanza_id  : { valueNotEquals: "Por favor selecione un Nivel de Enseñanza" },
                    tipo_moneda_id      : { valueNotEquals: "Por favor selecione una Moneda" }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.appendTo("div#errorContainer");
                    $("#errorContainer").show();
                },                
                invalidHandler: function(form, validator) {
                    /*debugger;*/
                    var errors = validator.numberOfInvalids();
                    ultimoElementoValidado = validator.findLastActive();

                   /* if (errors==1) {                    
                        validator.errorList[0].element.focus();

                       $("#errorContainer").hide();

                    } else {
                      $("errorContainer").show();
                    }*/
                }

            });

            
            
            /*$('#errorContainer').bind('DOMNodeRemoved', function() {
                
                debugger;
                if(ultimoElementoValidado){

                }

                $("errorContainer").hide();
            });*/
            
            //Formulario-Validate - Regla para valores no iguales a ""
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
              return arg != value;
            }, "  ");

             //Formulario-Validate - Regla para validar un distrito valido
            $.validator.addMethod("distritoValid", function(value, element, arg){

               var distritoNombre = $( "#distrito" ).val();
               var ubigeo = $( "#ubigeo" ).val();

               if (distritoNombre =="") return true;
               if ( ubigeo =="") return false;
               else return true;
               
            }, " ");


            //Formulario-Validate - Regla para validar duplicado de publicaciones
            $.validator.addMethod("publicacionValid", function(value, element, arg){

                var materiaNombre   = $("#materia_id option:selected").text();
                var distritoNombre  = $("#distrito").val();

                var validador=true;

               $("#publicacionesTable tbody tr").each(function (index) 
                {
                    var campo1, campo2, campo3, campo4, campo5, campo6 ;

                    $(this).children("td").each(function (index2) 
                    {
                        switch (index2) 
                        {
                            case 0: campo1 = $(this).text();
                                    break;
                            case 1: campo2 = $(this).text();
                                    break;
                            case 2: campo3 = $(this).text();
                                    break;
                            case 3: campo4 = $(this).text();
                                    break;
                            case 4: campo5 = $(this).text();
                                    break;
                            case 5: campo6 = $(this).text();
                                    break;        
                        }
                    })

                    if (materiaNombre==campo1 && distritoNombre == campo6){
                        validador=false;
                        return;
                    }
                    
                });

                return validador;
               
            }, " ");


            //Desaparecer Div de mensaje exitoso
            $(".alert-success").fadeOut(5000,'linear');

            //Desaparecer Div de mensaje error - no funciona a un
            $("#errorContainer").fadeOut(2000,'linear');

            $(".alert-error").fadeOut(7000,'linear');
            
            $('#formPublicacion').submit(function() {
                /*debugger;
                var secces = $("#successContainer");
                secces.fadeOut(1500);
                alert("aaa");*/
            });
           /* $( "#successContainer" ).change(function() {
              alert( "Handler for .change() called." );
            });*/

});

/*$(document).ready(function() {
    setTimeout(function() {
        $("#successContainer").fadeOut(1500);
    },3000);
});*/