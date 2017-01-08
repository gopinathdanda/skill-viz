
	$(document).ready(function() {
		
		function convert_dash(str){
			return str.toLowerCase().replace(/ /g, '-');
		}
	
				$('.skillsPieChart').radarChart({
				size: [380, 300],
				step: 1,
				fixedMaxValue:5,
				showAxisLabels: true
				});
				
				
				
				$('#save-skill').on('submit', function(e){
					e.preventDefault();
					var data = $(this).serializeJSON();
					var arr = $.map(data, function(el) { return el });
					var skillset = $('.skillset:first').text();
					//console.log(skillset);
				$.ajax
				    ({
				        type: "POST",
				        url: 'save.php',
				        data: { data: JSON.stringify(arr), fname: convert_dash(skillset) },
				        success: function (data) { $('#saved').modal('show'); console.log(data)},
				        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
				    });
				})
				
	
    });





