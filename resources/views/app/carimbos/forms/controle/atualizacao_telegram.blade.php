<div class="row">
	<div class="col-md-5">
		<select name="from[]" id="lista_equipamentos" class="form-control" size="8" multiple="multiple">
			<option value="1">Item 1</option>
			<option value="3">Item 3</option>
			<option value="2">Item 2</option>
		</select>
	</div>
	
	<div class="col-md-2">
		<button type="button" id="lista_equipamentos_rightAll" class="btn btn-block"><i class="fas fa-angle-double-right"></i></button>
		<button type="button" id="lista_equipamentos_rightSelected" class="btn btn-block"><i class="fas fa-angle-right"></i></button>
		<button type="button" id="lista_equipamentos_leftSelected" class="btn btn-block"><i class="fas fa-angle-left"></i></button>
		<button type="button" id="lista_equipamentos_leftAll" class="btn btn-block"><i class="fas fa-angle-double-left"></i></button>
	</div>
	
	<div class="col-md-5">
		<select name="to[]" id="lista_equipamentos_to" class="form-control" size="8" multiple="multiple"></select>
	</div>
</div>

<script type="text/javascript" src="{{asset('js/multiselect.min.js')}}"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#lista_equipamentos').multiselect();
});
</script>