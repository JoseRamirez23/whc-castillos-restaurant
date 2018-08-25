var gourmand_filters = [];

function gourmand_add_filter( id, callback )
{
	if( typeof callback == 'function' )
		gourmand_filters[ id ] = callback;
}

function gourmand_apply_filter( id, rett, args )
{
	if( typeof gourmand_filters[ id ] == 'function' ){
		var callback = gourmand_filters[ id ];
		rett = callback( rett, args );
	}

	return rett;
}
