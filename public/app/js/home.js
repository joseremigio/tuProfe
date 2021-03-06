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



            

});

