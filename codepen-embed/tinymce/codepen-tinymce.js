(function() {
	tinymce.create('tinymce.plugins.codepenPlugin', {
		init : function(ed, url) {
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/codepen-popup-form.php',
					width : 400 + parseInt(ed.getLang('codepen.delta_width', 0)),
					height : 400 + parseInt(ed.getLang('codepen.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});
			ed.addButton('codepen_embed', {
				title : 'Insert Codepen',
				cmd : 'mcebutton',
				'class': "codepenIcon",
				image: url + '/images/codepen.png' 
				
			});
		},
		getInfo : function() {
			return {
				longname : 'CodePen Embed',
				author : 'Jason Witt',
				authorurl : 'http://jawittdesigns.com',
				infourl : 'http://jawittdesigns.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	tinymce.PluginManager.add('codepen_embed', tinymce.plugins.codepenPlugin);
})();