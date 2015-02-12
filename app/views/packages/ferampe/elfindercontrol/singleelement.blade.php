
@if(isset($parameter['label']))
	{{ Form::label($parameter['input_name'], $parameter['label']) }}
@endif

<div class='input-group'>
    <span class='input-group-btn'>
    	<button class="btn btn-info" type="button" onclick="window.open('{{ route('elFinderSingle', $parameter['input_name']) }}', '', 'location=0,height=500,width=950').focus()">{{ $parameter['button_text'] }}</button>        
    </span>
    <input type='text' id="{{ $parameter['input_name'] }}" name="{{ $parameter['input_name'] }}" value="{{ $parameter['value'] }}" class="form-control" tabindex="104">
</div>


<script>
	function singleFile(file, obj)
	{		
	    document.getElementById(obj).value = file.path;	    
	}
</script>