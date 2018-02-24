$(document).ready(function()
{
	$('.game-left-bottom img').click(function()
	{
		var source = $(this).attr('src');
		$('.game-left-top img').attr('src', source);
	});
});