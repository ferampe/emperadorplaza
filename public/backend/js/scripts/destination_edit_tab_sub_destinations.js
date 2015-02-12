 $(document).ready( function(){

 	var token = $("#formDestination > input[name='_token']").val(); 

 	var validSubDestinations = false;
    $("#title_sub_destination").rules('add', {required:true});   

    formDefaultSubDestinations();

    // Agregar subDestination Item
    $("#btnAddSubDestination").on('click', function(event){
        event.preventDefault();

        if(rulesValidationSubDestination())
        {
            var l = Ladda.create(this);
            var order = $("#itemListSubDestinations > li").length + 1;
            l.start();
            $.ajax({
                type: "post",
                url: path+"/admin/subDestination/store",
                data: {
                	title:$("#title_sub_destination").val(),
					destination_id:$('#destination_id').val(),
					order:order,
					_token:token
				},
                success: function(datos){
                    $.bootstrapGrowl("The element was added.", { type: 'success' });
                    $("#itemListSubDestinations").append('<li id="item-'+datos.subDestinationId+'"><i class="fa fa-fw fa-unsorted"></i><a href="'+path+'/admin/subDestination/edit/'+datos.subDestinationId+'" class="editItems" ><span id="item-text-'+datos.subDestinationId+'">'+datos.title+'</span></a></li>');
                    formDefaultSubDestinations();
                    l.stop();
                },
                error: function(){
                    alert("error");
                    l.stop();
                }
            });
        }

    });
    //-- Fin Agregar subDestination Item

    // Editar subDestination Item
    $("#btnUpdateSubDestination").on('click', function(event){
        event.preventDefault();
        if(rulesValidationSubDestination())
        {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                type: "post",
                url: path+"/admin/subDestination/update",
                /*url: "{{ url('admin/subDestination/update') }}",*/
                data: {
                	title:$("#title_sub_destination").val(),
					content:$("#content_additional_item").val(),
					sub_destination_id:$('#sub_destination_id').val(),
					_token:token},
                success: function(datos){
                    $("#item-text-"+$('#sub_destination_id').val()).text($("#title_sub_destination").val());
                    formDefaultSubDestinations();
                    l.stop();
                }
            });
        }
    });
    //-- Fin Editar subDestination Item

    // unPublish subDestination Item
    $("#btnUnpublishSubDestination").on('click', function(event){
        event.preventDefault();
        var l = Ladda.create(this);
        l.start();
        $.ajax({
            type: "post",
            url: path+"/admin/subDestination/unpublish",
            /*url: "{{ url('admin/subDestination/unpublish') }}",*/
            data: {
            	sub_destination_id:$('#sub_destination_id').val(),
            	_token:token
            },
            success: function(datos){
                $.bootstrapGrowl("The element was Unpublish.", { type: 'success' });
                $("#item-text-"+$('#sub_destination_id').val()).addClass( "tachado" );
                formDefaultSubDestinations();
                l.stop();
            }
        });
    });
    //-- Fin Remove subDestination Item

    // Recover subDestination Item
    $("#btnPublishSubDestination").on('click', function(event){
        event.preventDefault();
        var l = Ladda.create(this);
        l.start();
        $.ajax({
            type: "post",
            url: path+"/admin/subDestination/publish",
            /*url: "{{ url('admin/subDestination/publish') }}",*/
            data: {
            	sub_destination_id:$('#sub_destination_id').val(),
            	_token:token
            },
            success: function(datos){
                $.bootstrapGrowl("The element was publish.", { type: 'success' });
                $("#item-text-"+$('#sub_destination_id').val()).removeClass( "tachado" );
                formDefaultSubDestinations();
                l.stop();
            }
        });
    });
    //-- Fin Recover subDestination Item

    // Destroy subDestination Item
    $("#btnDestroySubDestination").on('click', function(event){
        event.preventDefault();
        confirmRemove = confirm('Removing the Item.');
        if(confirmRemove){
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                type: "post",
                url: path+"/admin/subDestination/destroy",
                /*url: "{{ url('admin/subDestination/destroy') }}",*/
                data: {
                	sub_destination_id:$('#sub_destination_id').val(),
                	_token:token
            	},
                success: function(datos){
                    $.bootstrapGrowl("The element was deleted.", { type: 'success' });
                    $("#item-"+$('#sub_destination_id').val()).remove( );
                    formDefaultSubDestinations();
                    l.stop();
                }
            });
        }else{
            formDefaultSubDestinations();
        }
    });
    //-- Fin Destroy subDestination Item

    // Obtener subDestination Item
    $( "body" ).on( "click", "a.editItems", function( event ) {
        event.preventDefault();
        $.ajax({
            type: "get",
            url: $(this).attr('href'),
            success: function(datos){
                if(datos.publish == 0)
                {
                    $("#btnDestroySubDestination").show();
                    $("#btnPublishSubDestination").show();
                    $("#btnUnpublishSubDestination").hide();
                }else{
                    $("#btnDestroySubDestination").show()
                    $("#btnPublishSubDestination").hide();
                    $("#btnUnpublishSubDestination").show();
                }
                $('#title_sub_destination').val(datos.title);                
                $('#sub_destination_id').val(datos.sub_destination_id);
                $("#btnUpdateSubDestination").show();
                $("#btnAddSubDestination").hide();
            }
        });
    });
    //-- Fin Obtener subDestination Item

    // Lista subDestination
    $("ol.sort_subdestinations").sortable({
        group: 'no-drop',
        handle: 'i.fa-unsorted',
        update: function( event, ui ) {
            var data = $(this).sortable('serialize');
            $.ajax({
                type: "POST",
                data: data,
                url: path+"/admin/subDestination/sort",
                /*url: "{{ url('admin/subDestination/sort') }}",*/
                success: function(){
                    $.bootstrapGrowl("The items were ordered.", { type: 'success' });
                }
            });
        }
    });
    //-- Lista subDestination


 });



function formDefaultSubDestinations()
{
    $('#title_sub_destination').val("");
    $('#sub_destination_id').val("");

     $("#btnUpdateSubDestination").hide();
    $("#btnPublishSubDestination").hide();
    $("#btnUnpublishSubDestination").hide();
    $("#btnDestroySubDestination").hide();
    $("#btnAddSubDestination").show();
}

function rulesValidationSubDestination()
{
    if($("#title_sub_destination").valid() )
    {
        validSubDestinations = true;
    }

    return validSubDestinations;
}
