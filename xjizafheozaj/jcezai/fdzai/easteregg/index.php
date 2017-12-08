<script src="konami.js"></script>
<script>


var easter_egg = new Konami(function() { 
	document.getElementById('iframe').src = "https://www.youtube.com/embed/rTdumjiCpZs?autoplay=1&showinfo=0&controls=0";
	document.getElementById('sneakydiv').removeAttribute("style");
});
</script>

<div id="sneakydiv" style="display: none;">

<iframe id="iframe" src="https://www.youtube.com/embed/rTdumjiCpZs" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen height="100%" width="100%"></iframe>


</div>
