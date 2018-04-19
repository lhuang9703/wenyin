	//这段代码可以检查上传的文件是否为图片
	function checkfile()
	{
		var f = document.getElementById('file-upload');
		var filename = f.value;
		if (!filename && !(filename.endsWith('.pdf') && filename.endsWith('.doc') && filename.endsWith('.pptx'))) {
		    alert('文件格式不正确!');
		    return false;
		}
	}