# Changelog

Releases are to be numbered in the semantic versioning format:

`<major>.<minor>.<patch>`

And constructed with these guidelines:

* Breaking backwards compatibility bumps the major
* New additions without breaking backwards compatibility bumps the minor
* Bug fixes and misc changes bump the patch

For more information on semantic versioning, please visit http://semver.org/.

## v1.1.4 - October 30, 2014
* Fixed an incorrect EJS template in the Gruntfile

## v1.1.3 - October 10, 2014
* Fixed the `display_post_thumbnail` function
* Corrected border property in \_block\_list.css
* Update `hidden-text` mixin in \_mixins.css
* Fixed the `pagination` function

## v1.1.2 - October 2, 2014

* Fixed the `display_post_thumbnail_src` function
* Fixed the `display_post_thumbnail` function

## v1.1.1 - September 26, 2014

* Add catch for both '...' and HTML entity hellip
* Fixed typo in clearfix.scss

## v1.1.0 - August 27, 2014

* Moved dependencies and Gruntfile back to root of project to reduce commands from multiple locations and ease installation

## v1.0.1 - August 19, 2014

* Added Sass import to Gruntfile for bower deps
* Fixed colorguard task for build task

## v1.0.0 - August 13, 2014

Initial Release of the Evolved Theme for WordPress

*Theme files are now separated from the Evolved Yeoman generator for users you prefer not to use Yeoman*

Features:

* Parent theme creates a unified base for all projects without making too many design decisions.
* Child theme takes control of your project's specific design requirements utilizing Bourbon for Sass utilities, Neat for grid alignments and borrows from Inuit CSS for a solid base.
* Utilizes Bower for easy dependency management.
* Utilizes Grunt for an integrated CLI task building.
