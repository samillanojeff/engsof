window.onload = function(){
            var btnSave = document.getElementById('btnSave');
			var btnEdit = document.getElementById('btnEdit');
            btnSave.style.display = 'none';
       }
	function EditRecord(){
		btnSave.style.display = "";
		btnEdit.style.display = "none";
		var col = document.getElementsByClassName("editable");
		for (var i=0;i<col.length;i++){
			col[i].contentEditable = true;
		}
	}
	function SaveRecord(){
		btnSave.style.display = 'none';
		btnEdit.style.display = '';
		var col = document.getElementsByClassName("editable");
		for (var i=0;i<col.length;i++){
			col[i].contentEditable = false;
		}
}