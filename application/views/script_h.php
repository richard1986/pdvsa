<script>
	var DateDiff = {

	    inDays: function(d1, d2) {
	        var t2 = d2.getTime();
	        var t1 = d1.getTime();

	        return parseInt((t2-t1)/(24*3600*1000));
	    },

	    inWeeks: function(d1, d2) {
	        var t2 = d2.getTime();
	        var t1 = d1.getTime();

	        return parseInt((t2-t1)/(24*3600*1000*7));
	    },

	    inMonths: function(d1, d2) {
	        var d1Y = d1.getFullYear();
	        var d2Y = d2.getFullYear();
	        var d1M = d1.getMonth();
	        var d2M = d2.getMonth();

	        return (d2M+12*d2Y)-(d1M+12*d1Y);
	    },

	    inYears: function(d1, d2) {
	        return d2.getFullYear()-d1.getFullYear();
	    }
	}
	
	$(document).ready(function(){
		
		$("#field-fecha_falla").change(function(){
			
			var fa = $("#field-fecha_arranque").val().split("/");
			var f1 = new Date(fa[2]+"-"+fa[1]+"-"+fa[0]);
			var ff = $("#field-fecha_falla").val().split("/");
			var f2 = new Date(ff[2]+"-"+ff[1]+"-"+ff[0]);
			var fi = $("#field-fecha_instalacionf").val().split("/");
			var f3 = new Date(fi[2]+"-"+fi[1]+"-"+fi[0]);
			
			$("#field-dias_operacion").val(DateDiff.inDays(f2,f1)*-1);
			$("#field-dias_instalacion").val(DateDiff.inDays(f2,f3)*-1);

			// MTBP = fecha_pullingi - fecha_instalacionf



		});
	});
</script>