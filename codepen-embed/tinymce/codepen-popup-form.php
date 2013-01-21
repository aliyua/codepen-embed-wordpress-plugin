<!DOCTYPE html>
<html>
<head>
<title>Codepen Embed</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js"></script>
<script type="text/javascript" src="../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<!-- <link href="../../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"  media="screen"  rel="stylesheet" type="text/css" /> -->
<link href="../css/codepen-embed.css"  media="screen"  rel="stylesheet" type="text/css" />
<script>
var CodepenEmbed = {
	local_ed : 'ed',
	init : function(ed) {
		CodepenEmbed.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertShortcode(ed) {
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var href = jQuery('#codepen-form input#codepen-user').val();
		var user = jQuery('#codepen-form input#codepen-href').val();
		var show = jQuery('#codepen-form select#codepen-show').val();
		var height = jQuery('#codepen-form input#codepen-height').val();
		var output = '';
		output = '[codepen ';
		output += 'href=' + href + ' ';
		output += 'user=' + user + ' ';
		output += 'show=' + show + ' ';
		output += 'height=' + height + ' ';
		output += ']';
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(CodepenEmbed.init, CodepenEmbed);
</script>
</head>
<body>
<div id="codepen-form" class="codepen-embed">
	<form action="/" method="get" accept-charset="utf-8">
		<div class="form-element">
			<label for="codepen-user"><h3>Username</h3></label>
			<input type="text" id="codepen-user" name="user" value=""/>
			<div class="description"><strong>Your Codepen Username</strong></div>
		</div>
		<div class="clear"></div>
		<div class="form-element">
			<label for="href"><h3>Href</h3></label>
			<input type="text" id="codepen-href" name="href" value="aBcdE"/>
			<strong>The Last Part of the Codepen URL<br/>
			<div class="description">Example: http://codepen.io/username/pen/</strong><em>JustThis</em></div>
		</div>
		<div class="clear"></div>
		<div class="form-element">
			<label for="codepen-show"><h3>Display Onload</h3></label>
			<select name="show" id="codepen-show">
				<option value="html">HTML</option>
				<option value="css">CSS</option>
				<option value="js">JavaScript</option>
				<option value="result">Result</option>
			</select>
			<div class="description"><strong>Choose What Section to Display Onload</strong></div>
		</div>
		<div class="clear"></div>
		<div class="form-element">
			<label for="codepen-height"><h3>Height</h3></label>
			<input type="text" id="codepen-height" name="height" value="300"/>
			<div class="description"><strong>The Codepen Embed Height<br/>
			Example: '300' not '300px'</strong></div>
		</div>
		<div class="clear"></div>
		<div class="form-element">	
			<a href="javascript:CodepenEmbed.insert(CodepenEmbed.local_ed)" id="insert">				
				Insert
			</a>
		</div>
	</form>
</div>
</body>
</html>