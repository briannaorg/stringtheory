/**
 *
 * Licensed under the MIT License
 */

'use strict';

// Basic template description
exports.description = 'Create a WordPress theme based on String Theory.';

// Template-specific notes to be displayed before question prompts.
exports.notes = 'Answer a few questions about the features you want in your theme and we\'ll do the rest!';

// Template-specific notes to be displayed after the question prompts.
exports.after = 'You\'re done! Make sure you run `npm install` then `grunt` so your style.css is built.';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';

// The actual init template
exports.template = function (grunt, init, done) {
	init.process({}, [
		// Prompt for these values.
		init.prompt('title', 'TechnoSiren Theme'),
		{
			name   : 'prefix',
			message: 'PHP function prefix (alpha and underscore characters only)',
			default: 'stringtheory'
		},
		init.prompt('description', 'A bespoke TechnoSiren theme'),
		init.prompt('homepage', 'http://www.technosiren.com'),
		init.prompt('author_name', 'Brianna Privett'),
		init.prompt('author_email', 'song@technosiren.com'),
		init.prompt('author_url', 'http://brianna.org'),
		init.prompt('repository', 'git@github.com:briannaorg/stringtheory.git'),
		{
			name   : 'four_oh_four_template',
			message: 'Do you want a 404.php? [Y/n]',
			default: 'y'
		},
		{
			name   : 'html_layout',
			message: 'Do you want an HTML layout? [Y/n]',
			default: 'y'
		},
		{
			name   : 'archive_template',
			message: 'Do you want an archive.php? [Y/n]',
			default: 'y'
		},
		{
			name   : 'comments_template',
			message: 'Do you want an comments.php? [Y/n]',
			default: 'y'
		},
		{
			name   : 'search_template',
			message: 'Do you want an search.php? [Y/n]',
			default: 'y'
		},
		{
			name   : 'search_form_template',
			message: 'Do you want an searchform.php? [Y/n]',
			default: 'y'
		},
		{
			name   : 'custom_header_include',
			message: 'Do you want a custom header? [Y/n]',
			default: 'y'
		},
		{
			name   : 'customizer_include',
			message: 'Will you use the theme customizer? [Y/n]',
			default: 'y'
		},
		{
			name   : 'jetpack_support',
			message: 'Will you use be using Jetpack? [Y/n]',
			default: 'y'
		}

	], function (err, props) {
		props.keywords = [];
		props.version = '0.1.0';
		props.devDependencies = {
			'grunt'                : '~0.4.1',
			'matchdep'             : '~0.1.2',
			'grunt-contrib-uglify' : '~0.1.1',
			'grunt-contrib-cssmin' : '~0.6.0',
			'grunt-contrib-jshint' : '~0.1.1',
			'grunt-contrib-watch'  : '~0.2.0',
			'grunt-contrib-sass'   : '~0.2.2',
			'grunt-contrib-compass': '~0.5.0',
			'grunt-cssjanus'       : "~0.1.1",
			"jpegtran-bin": "0.2.0",
    		"grunt-contrib-imagemin": "~0.5.0"
		};

		// Sanitize names where we need to for PHP/JS
		props.name = props.title.replace(/\s+/g, '-').toLowerCase();
		// Theme language
		props.language = props.title.replace('/[^a-z_]/i', '').replace(/ /g, '').toLowerCase();
		// Development prefix (i.e. to prefix PHP function names, variables)
		props.prefix = props.prefix.replace('/[^a-z_]/i', '').toLowerCase();
		// Development prefix in all caps (e.g. for constants)
		props.prefix_caps = props.prefix.toUpperCase();
		// An additional value, safe to use as a JavaScript identifier.
		props.js_safe_name = props.name.replace(/[\W_]+/g, '_').replace(/^(\d)/, '_$1');
		// An additional value that won't conflict with NodeUnit unit tests.
		props.js_test_safe_name = props.js_safe_name === 'test' ? 'myTest' : props.js_safe_name;
		props.js_safe_name_caps = props.js_safe_name.toUpperCase();

		// Files to copy and process
		var files = init.filesToCopy(props);
		// Did they want a 404 page?
		if (props.four_oh_four_template.toUpperCase()[0] == "N") {
			delete files[ '404.php'];
		}
		// Did they want an HTML Layout?
		if (props.html_layout.toUpperCase()[0] == "N") {
			delete files[ 'stlayout.html'];
		}		
		//Do they want an archive page?
		if (props.archive_template.toUpperCase()[0] == "N") {
			delete files[ 'archive.php'];
		}
		//Do they want an comments page?
		if (props.comments_template.toUpperCase()[0] == "N") {
			delete files[ 'comments.php'];
		}
		//Do they want an search page?a
		if (props.search_template.toUpperCase()[0] == "N") {
			delete files[ 'search.php'];
		}
		//Do they want an search form page?
		if (props.search_form_template.toUpperCase()[0] == "N") {
			delete files[ 'searchform.php'];
		}
		//Do they want a custom header?
		if (props.custom_header_include.toUpperCase()[0] == "N") {
			delete files[ 'inc/custom-header.php'];
		}
		//Will the use the customizer?
		if (props.customizer_include.toUpperCase()[0] == "N") {
			delete files[ 'inc/customizer.php'];
		}
		//Will they support Jetpack?
		if (props.jetpack_support.toUpperCase()[0] == "N") {
			delete files[ 'inc/jetpack.php'];
		}

		console.log(files);

		// Actually copy and process files
		init.copyAndProcess(files, props, {noProcess: 'screenshot.png'});

		// Generate package.json file
		init.writePackageJSON('package.json', props);

		// Done!
		done();
	});
};