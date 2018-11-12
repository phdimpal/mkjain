<table id="main_tb" class="table table-striped table-responsive" style="text-align:center">
    <tr>
		<td width="20%">Week</td>
		<td width="20%">Subject</td>
		<td width="20%">Teacher</td>
		<td width="15%">Time of Starting</td>
		<td width="15%">Time of Ending</td>
		<td width="15%">MIN</td>
		<td width="20%">&nbsp;</td>
	</tr>
	<tbody >	
	
	<tr class="tr1">
	
	<td align="center">
		<?php 
			$options=[];
		$options=[['text'=>'Monday','value'=>'Monday'],['text'=>'Tuesday','value'=>'Tuesday'],['text'=>'Wednesday','value'=>'Wednesday'],['text'=>'Thursday','value'=>'Thursday'],['text'=>'Friday','value'=>'Friday'],['text'=>'Saturday','value'=>'Saturday'],['text'=>'Sunday','value'=>'Sunday']]; ?>
		<?php
			echo $this->Form->input('q', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 weeks','options'=>$options,'style'=>'width:100%;','required']);
		?>
	</td>
	<td align="center">
		<?php
			echo $this->Form->input('q', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 subjects','options'=>$optionsSubject,'style'=>'width:100%;','required']);
		?>
	</td>
	<td align="right">
		<?php
			echo $this->Form->input('q', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 teachers','options'=>$optionsTeacher,'style'=>'width:100%;','required']);
		?>
	</td>
	
	<td align="right">
	<div class="row">
		<div class="col-md-6">
			<?php
			echo $this->Form->input('q', ['type'=> 'text','label' => false,'class'=>'form-control start_time','required']);
		?>
		</div>
		<div class="col-md-6">
			<?php
			$ampm=[];
			$ampm = [['text'=>'AM','value'=>'AM'],['text'=>'PM','value'=>'PM']];
			echo $this->Form->input('q', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 ampm','options'=>$ampm,'required']);
		?>
		</div>
	</div>
		
		
	</td>
 	<td align="right">
	<div class="row">
		<div class="col-md-6">
		<?php
			echo $this->Form->input('q', ['type'=> 'text','label' => false,'class'=>'form-control end_time','required']);
		?>
		</div>
		<div class="col-md-6">
		<?php
			$ampms=[];
			$ampms = [['text'=>'AM','value'=>'AM'],['text'=>'PM','value'=>'PM']];
			echo $this->Form->input('q', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 ampms','options'=>$ampms,'required']);
		?>
		</div>
	</div>
	</td>
	<td align="right">
		<?php
			echo $this->Form->input('q', ['type'=> 'text','label' => false,'class'=>'form-control noofminute','required']);
		?>
	</td>
	<td>
		<input type='button' class='AddNew btn btn-success' value='+'>
	</td>
		 
	</tr>
	 </tbody>
</table>
<script>

$('.AddNew').click(function(){ 	
   var row = $(this).closest('tr').clone();
   row.find('input').val('');
   $(this).closest('tr').after(row);
   
	$('input[type="button"]', row).removeClass('AddNew').addClass('RemoveRow').val('-');
   
   rename_rows();
});

$('table').on('click', '.RemoveRow', function(){ 
  $(this).closest('tr').remove();
});	
rename_rows();
function rename_rows(){
	var list = new Array();
		var p=0;
		var i=0;
		$("#main_tb tbody tr.tr1").each(function(){  
			
				i++;
				$(this).find('td:nth-child(1) select.weeks').attr("name","time_table["+i+"][week_name]").attr("id","time_table-"+i+"-week_name");
				$(this).find('td:nth-child(2) select.subjects').attr("name","time_table["+i+"][subject_id]").attr("id","time_table-"+i+"-subject_id").rules("add", "required");
				$(this).find("td:nth-child(3) select.teachers").attr({name:"time_table["+i+"][teacher_id]", id:"time_table-"+i+"-teacher_id"});
				
				$(this).find('td:nth-child(4) input.start_time').attr("name","time_table["+i+"][start_time]").attr("id","time_table-"+i+"-start_time").rules("add", "required");
				$(this).find('td:nth-child(4) select.ampm').attr("name","time_table["+i+"][ampm]").attr("id","time_table-"+i+"-ampm").rules("add", "required");
				
				$(this).find('td:nth-child(5) input.end_time').attr("name","time_table["+i+"][end_time]").attr("id","time_table-"+i+"-end_time").rules("add", "required");
				$(this).find('td:nth-child(5) select.ampms').attr("name","time_table["+i+"][ampms]").attr("id","time_table-"+i+"-ampms").rules("add", "required");
				$(this).find('td:nth-child(6) input.noofminute').attr("name","time_table["+i+"][noofminute]").attr("id","time_table-"+i+"-noofminute");
				
			});
}

$(document).ready(function(){
	$('.alert').fadeOut(5000);
});
	</script>