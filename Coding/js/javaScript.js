			window.onload = function(){
			document.getElementById('rb_partially_approved').onchange = disablefield;
			document.getElementById('rb_approved').onchange = disablefield;
			document.getElementById('rb_rejected').onchange = disablefield;
			document.getElementById('tb_partial_approved').disabled= true;
		}
	function disablefield()
	{
		if((document.getElementById('rb_partially_approved').checked == true) && (document.getElementById('rb_rejected').checked==false) && (document.getElementById('rb_approved').checked==false))
		{
			document.getElementById('tb_partial_approved').value='';
			document.getElementById('tb_partial_approved').disabled = false;
		}
		else if(document.getElementById('rb_partially_approved').checked == false)
		{
			document.getElementById('tb_partial_approved').disabled = true;
		}
	}
	