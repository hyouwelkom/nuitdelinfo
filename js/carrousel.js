$(document).ready(function() {
	var $carrousel = $('#carrousel'),
		$img = $('#carrousel img'),
		indexImg = $img.length - 1,
		i = 0,
		$currentImg = $img.eq(i);

	$img.hide();
	$currentImg.fadeIn();

	function slideImg(){
		setTimeout(function(){			
			if(i < indexImg){
			i++;
		}
		else{
			i = 0;
		}

		$img.hide();

		$currentImg = $img.eq(i);
		$currentImg.fadeIn();

		slideImg();

		}, 5000);
	}

	slideImg();
});