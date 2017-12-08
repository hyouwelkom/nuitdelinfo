$('.flappy-bird').click(function() {
	$('#flappygame').show();
	$('#twogame').hide();
	$('#katanagame').hide();
	$('#bubblegame').hide();
	$('#doodlegame').hide();
});

$('.2048').click(function() {
	$('#flappygame').hide();
	$('#twogame').show();
	$('#katanagame').hide();
	$('#bubblegame').hide();
	$('#doodlegame').hide();
});

$('.katana-fruits').click(function() {
	$('#flappygame').hide();
	$('#twogame').hide();
	$('#katanagame').show();
	$('#bubblegame').hide();
	$('#doodlegame').hide();
});

$('.bubble-shooter').click(function() {
	$('#flappygame').hide();
	$('#twogame').hide();
	$('#katanagame').hide();
	$('#bubblegame').show();
	$('#doodlegame').hide();
});

$('.doodle-jump').click(function() {
	$('#flappygame').hide();
	$('#twogame').hide();
	$('#katanagame').hide();
	$('#bubblegame').hide();
	$('#doodlegame').show();
});