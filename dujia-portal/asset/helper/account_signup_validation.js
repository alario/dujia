function show_success( jobj ) {
	jobj.data("validated", true);
	var div = jobj.parent('div');
	div.attr('class', 'field-group field-group-ok');
	div.find('.inline-tip').css('display', '');
	div.find('.inline-tip').html('');
};

function show_error( jobj, msg ) {
	jobj.data("validated", false);
	var div = jobj.parent('div');
	div.attr('class', 'field-group field-group-error');
	div.find('.inline-tip').css('display', '');
	div.find('.inline-tip').html( msg );
};

function show_remoting( jobj, msg ) {
	jobj.data("validated", false);
	var div = jobj.parent('div');
	div.attr('class', 'field-group field-group-type');
	div.find('.inline-tip').css('display', '');
	div.find('.inline-tip').html( msg );
};

function register_validation( the_form, inputs )
{
	var input_prompt = function( obj ) {
		$(obj).parent("div").attr('class', 'field-group field-group-type');
		var prompt = $(obj).data('prompt');
		if ( typeof( prompt ) == 'undefined' || prompt == '' )
		{
			$(obj).parent("div").find('.inline-tip').css('display', 'none');
		}
		else
		{
			$(obj).parent("div").find('.inline-tip').css('display', '');
			$(obj).parent("div").find('.inline-tip').text( prompt );
		}
		$(obj).data('validated', false);
	};


		
	var input_validate = function( obj, method ) {

		if ( method == 'ontrigger' && 'none' == $(obj).parent("div").find('.inline-tip').css('display') )
			return true;
		if ( method == 'onsubmit' )
		{
			var validated = $(obj).data('validated');
			if ( typeof( validated ) != 'undefined' && validated )
				return true;
		}
		var validation = $(obj).data("validation");
		var result = validation();
		var ret = false;
		if ( result == 'error' )
		{
			show_error( $(obj), $(obj).data('error') );
		}
		else if ( result == 'remoting' )
		{
			show_remoting( $(obj), '检查中...' );
		}
		else if ( result == "success" )
		{
			show_success( $(obj) );
			ret = true;
		}
		else
		{
			show_error( $(obj), result );
		}
		if ( method == 'input' && typeof $(obj).data("trigger-validation") != 'undefined' )
		{
			input_validate( $(obj).data("trigger-validation"), 'ontrigger' );
		}
		return ret;
	};
	
	inputs.focus( function() { input_prompt( this ); } );
	inputs.blur( function() { input_validate( this, 'onblur' ); } );
	the_form.submit( function( e ) {
		var passed = true;
		inputs.each( function(){ passed &= input_validate( this, 'onsubmit' ); } );
		if ( !passed )
			e.preventDefault();
	} );	
}