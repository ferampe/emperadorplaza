 var validTabs = false;
 $(document).ready( function(){
 
 	var token = $("#formDestination > input[name='_token']").val(); 
 	
 	
    $("#tab_name").rules('add', {required:true});   

    formDefaultTabs();

    // Agregar subDestination Item
    $("#btnAddTabs").on('click', function(event){
        event.preventDefault();

        if(rulesValidationTabs())
        {
            var l = Ladda.create(this);
            var order = $("#itemListTab > li").length + 1;
            l.start();
            $.ajax({
                type: "post",
                /*url: path+"/admin/tabDestination/store",*/
                url : pathTabStore,
                data: {
                	tab_name: $("#tab_name").val(),
                	tab_content: CKEDITOR.instances['tab_content'].getData(),
                	tab_image: $('#tab_image').val(),
                    tab_image_alt: $('#tab_image_alt').val(),
                    tab_image_title: $('#tab_image_title').val(),
					destination_id: $('#destination_id').val(),
					order:order,
					_token:token
				},
                success: function(datos){
                    $.bootstrapGrowl("The element was added.", { type: 'success' });
                    $("#itemListTab").append('<li id="item-tab-'+datos.tab_id+'"><i class="fa fa-fw fa-unsorted"></i><a href="'+path+'/admin/tabDestination/edit/'+datos.tab_id+'" class="editItemsTab" ><span id="item-text-tab-'+datos.tab_id+'">'+datos.name+'</span></a></li>');
                    formDefaultTabs();
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
    $("#btnUpdateTabs").on('click', function(event){
        event.preventDefault();
        if(rulesValidationTabs())
        {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                type: "post",
                url: path+"/admin/tabDestination/update",
                /*url: "{{ url('admin/tabDestination/update') }}",*/
                data: {
                	tab_name: $("#tab_name").val(),
                	tab_content: CKEDITOR.instances['tab_content'].getData(),
                	tab_image: $('#tab_image').val(),
                    tab_image_alt: $('#tab_image_alt').val(),
                    tab_image_title: $('#tab_image_title').val(),
					destination_id: $('#destination_id').val(),
					tab_id:$('#tab_id').val(),
					_token:token},
                success: function(datos){
                    $("#item-text-tab-"+$('#tab_id').val()).text($("#tab_name").val());
                    formDefaultTabs();
                    l.stop();
                }
            });
        }
    });
    //-- Fin Editar subDestination Item

    // unPublish subDestination Item
    $("#btnUnpublishTabs").on('click', function(event){
        event.preventDefault();
        var l = Ladda.create(this);
        l.start();
        $.ajax({
            type: "post",
            url: path+"/admin/tabDestination/unpublish",
            /*url: "{{ url('admin/tabDestination/unpublish') }}",*/
            data: {
            	tab_id:$('#tab_id').val(),
            	_token:token
            },
            success: function(datos){
                $.bootstrapGrowl("The element was Unpublish.", { type: 'success' });
                $("#item-text-tab-"+$('#tab_id').val()).addClass( "tachado" );
                formDefaultTabs();
                l.stop();
            }
        });
    });
    //-- Fin Remove subDestination Item

    // Recover subDestination Item
    $("#btnPublishTabs").on('click', function(event){
        event.preventDefault();
        var l = Ladda.create(this);
        l.start();
        $.ajax({
            type: "post",
            url: path+"/admin/tabDestination/publish",
            /*url: "{{ url('admin/tabDestination/publish') }}",*/
            data: {
            	tab_id:$('#tab_id').val(),
            	_token:token
            },
            success: function(datos){
                $.bootstrapGrowl("The element was publish.", { type: 'success' });
                $("#item-text-tab-"+$('#tab_id').val()).removeClass( "tachado" );
                formDefaultTabs();
                l.stop();
            }
        });
    });
    //-- Fin Recover subDestination Item

    // Destroy subDestination Item
    $("#btnDestroyTabs").on('click', function(event){
        event.preventDefault();
        confirmRemove = confirm('Removing the Item.');
        if(confirmRemove){
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                type: "post",
                url: path+"/admin/tabDestination/destroy",
                /*url: "{{ url('admin/tabDestination/destroy') }}",*/
                data: {
                	tab_id:$('#tab_id').val(),
                	_token:token
            	},
                success: function(datos){
                    $.bootstrapGrowl("The element was deleted.", { type: 'success' });
                    $("#item-tab-"+$('#tab_id').val()).remove( );
                    formDefaultTabs();
                    l.stop();
                }
            });
        }else{
            formDefaultTabs();
        }
    });
    //-- Fin Destroy subDestination Item

    // Obtener subDestination Item
    $( "body" ).on( "click", "a.editItemsTab", function( event ) {
        event.preventDefault();
        $.ajax({
            type: "get",
            url: $(this).attr('href'),
            success: function(datos){
                if(datos.publish == 0)
                {
                    $("#btnDestroyTabs").show();
                    $("#btnPublishTabs").show();
                    $("#btnUnpublishTabs").hide();
                }else{
                    $("#btnDestroyTabs").show()
                    $("#btnPublishTabs").hide();
                    $("#btnUnpublishTabs").show();
                }
                
                $('#tab_name').val(datos.name);
                CKEDITOR.instances['tab_content'].setData(datos.content);
                $('#tab_image').val(datos.image);
                $('#tab_image_alt').val(datos.image_alt);
                $('#tab_image_title').val(datos.image_title);
                $('#tab_id').val(datos.tab_id);
                $("#btnUpdateTabs").show();
                $("#btnAddTabs").hide();
            }
        });
    });
    //-- Fin Obtener subDestination Item

    // Lista subDestination
    $("ol.sort_tabs").sortable({
        group: 'no-drop',
        handle: 'i.fa-unsorted',
        update: function( event, ui ) {
            var data = $(this).sortable('serialize');
            $.ajax({
                type: "POST",
                data: data,
                url: path+"/admin/tabDestination/sort",
                /*url: "{{ url('admin/tabDestination/sort') }}",*/
                success: function(){
                    $.bootstrapGrowl("The items were ordered.", { type: 'success' });
                }
            });
        }
    });
    //-- Lista subDestination


 });



function formDefaultTabs()
{
	$('#tab_id').val("");
    $('#tab_name').val("");
    CKEDITOR.instances['tab_content'].setData('');
    $('#tab_image').val("");
    $('#tab_image_alt').val("");
    $('#tab_image_title').val("");
    
    $("#btnUpdateTabs").hide();
    $("#btnPublishTabs").hide();
    $("#btnUnpublishTabs").hide();
    $("#btnDestroyTabs").hide();
    $("#btnAddTabs").show();
}

function rulesValidationTabs()
{
    if($("#tab_name").valid() )
    {
        validTabs = true;
    }

    return validTabs;
}
