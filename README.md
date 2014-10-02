# Evolved for WordPress - v1.1.2

> Evolved is a simple pair of parent and child themes and a set of build tasks to help you start and manage your WordPress theme development process.

## Features

* Parent theme creates a unified base for all your projects without making too many design decisions.
* Child theme takes control of your project's specific design requirements utilizing [Bourbon][8] for Sass utilities, [Neat][9] for grid alignments and borrows from [Inuit CSS][10] for a solid base.
* Utilizes [Bower][6] for easy dependency management.
* Utilizes [Grunt][7] for asset building and LiveReload.


## Installation

* To auto install Evolved use our [Yeoman generator][1].
* To manually install Evolved either clone this repo or use the download button to save a zipped copy for yourself. Copy the contents of the root directory to your project's root directory and the two theme folders to your project's themes directory (you may want to copy the .gitignore and .editorconfig to your project's root as well). Open the Gruntfile.js and edit the `THEMES_DIR` constant to match the location of your project's themes directory.

### Node, NPM

The theme depends on multiple Node tools for installation. To get started install Node and NPM from [nodejs.org][4].


## [Bower][6] and [Grunt][7]

You'll need these Node tools installed *globally* to setup and build your project's files

```bash
npm install -g bower grunt-cli
```

### Install Dev Dependencies

To avoid version issues Node and Bower install project dependencies locally. But don't worry, they're only used for building your assets, you don't need to track them in git or include them in your production environment.

*Run the following from your project's root directory*

Install Grunt and all of the Grunt plugins needed for concatonation, minification, image compression, js and sass compilation, and the necessary components for live reload (these are declared in package.json).

```bash
npm install
```

Finally install your theme dependencies like js libraries, [Bourbon][9], and [Neat][10] (these are declared in bower.json).

```bash
bower install
```

### Install Sass

If you don't have Sass installed on your machine you'll need to install that next

```
sudo gem install sass
```


## Getting Started with Grunt

Grunt is a great build tool and we've set it up so that you can concentrate on building your theme instead of optimizing how it's delivered. 

### Main Tasks

At it's core Grunt is extremely powerful, but most of the time we're only going to be utilizing it for a few standard tasks.

To start your new project you'll need to run the `build:dev` task. When running a project locally you want to build and concatonate your assets but not minify them (for easier debugging). This task creates a `dev` directory and runs all the tasks required to build the assets.

*Since these unminified files are only used locally, you also want to be sure not to track these files in Git. This dev directory is listed in the included gitignore file.*

```
grunt build:dev
```

After your `dev` directory is created, run the `watch` task to set Grunt to automatically build the `dev` assets and reload the browser when necessary with LiveReload.

*After running `watch` refresh the browser once to connect to LiveReload.*

```
grunt watch
```

Run the `build` command to concatonate and minify all the necessary files. These are the files used in staging and production environments.

```
grunt build
```

### Available Grunt tasks

Although `watch`, `build`, and `build:dev` should get you through 90% of your workflow there are other tasks (and subtasks) you can run in the current Grunt setup.

```
grunt clean:dev   # Removes all files from the assets/dev dir
grunt clean:dist  # Removes all files from the assets/dist dir
grunt lint        # Lints all js files (including the Gruntfile) for errors
grunt concat      # Concatonates all the separate scripts into header, footer and single source files
grunt uglify      # Minifies the concatonated scripts in the assets/dist dir
grunt sass:dist   # Compiles sass files (in expanded mode) to the assets/dev dir
grunt sass:dev    # Compiles sass files (in compressed mode) to the assets/dist dir
grunt imagemin    # Compresses images from /img/src directory to the /img/min directory
grunt colorguard  # Compares your css files for colors that are too-similar and conflict with each other
```

### Further info

For further reading on Bower and Grunt, checkout these posts

* Get Up and Running with Grunt - http://coding.smashingmagazine.com/2013/10/29/get-up-running-grunt/
* Twitter Bower & Grunt - http://gpiot.com/blog/twitter-bower-grunt-get-started-with-assets-management/


## Working with the Parent theme

The goal of the parent theme is to give a structured base for your projects but not to assume any design decisions. Making decisions in the parent theme can lead to bloat and unnecessary overrides, and we want your project to be lean and fast.

### Functions

These are functions we've found we use across all of our projects. It's not everything, since that could lead to the mentioned overrides, but it includes what we think is necessary.

### Templates

All the default templates are included. To customize a template, copy it to the child theme and make your changes there. This will automatically override the parent templates and keep your parent theme clean.

### Styling

Trick heading, there is none. There is a `style.css` file but it's only for recognizing the parent theme. All styling should be done in the child theme to avoid duplicate http requests and cascade issues.


## Working with the Child theme

The goal of the child theme is to setup project specific elements. This is where we'll include the design specific decisions (and utilize Grunt). Feel free to edit, add and remove as necessary.

### Functions

This is where we set up project specific functions and global variables; enqueue the development and distribution assets; and require any outside functions.

### Templates

There are no initial templates in the child. You should add templates as you need them and let the parent theme act as the default. For organization purposes we put any non-default WP templates (the ones you have to manually set in a page's admin) in the `/templates` dir.

### Modules

Modules are small chunks of content used throughout your project. The goal is to reuse our code and abstract out small differences.

### Styling

#### Bourbon and Neat

We use Bourbon/Neat for special functions, css3 mixins, and our grid. Bourbon has many awesome functions and mixins not included in the Sass core that make working with scss even easier (such as tint/darken, px to em, modular scale, retina images, etc). Neat makes setting up and using a grid a breeze, especially when using the included `media` mixin. Instead of filling your markup with grid hooks, all of your grid layouts reside in your layout styles where it belongs.

#### Base, Generic and Objects

Based on Inuit CSS, this is where the styling for our resets, base styles, abstractions and custom objects we take from project to project reside. Feel free to include whatever you do or don't need in the style.scss to keep your final size down.

#### Modules and Layout

Rather than mix the custom styles with those we carry from project to project, we break them up into visual styles in the modules directory and layout styles in the layout directory. We often break up the layout files based on the modules we're using, but we still want to keep visual and layout styles separate to make finding and adjusting them easier.

### Scripting

To reduce http requests we limit our scripts to where they are needed and concatonate those that are used on the same pages. First we group them in directories based on where they will be called (header, footer, single posts, etc), then we break up and group the functions into single files based on their use (inits for libraries/plugins, custom page controls, etc). Grunt automatically goes through the directories and creates a corresponding file in dev/dist directories. We then enqueue those in functions.php.

### Images

The Imagemin task will automatically compress your images during the build process. Just drop in what you need in whatever folder structure you like and link to them as you normally would. No extra work needed.

### ColorGuard

The ColorGuard task will compare the colors used in your css and alert you when two colors are nearly indistiguishable to help reduce bloat.


## Version

This project is stable but continuously under development. Be sure to read [the changelog][2] before updating.


## License

[MIT License][3]


[1]: https://github.com/wp-evolved/generator-evolved
[2]: https://github.com/wp-evolved/evolved-theme/blob/master/CHANGELOG.md
[3]: http://en.wikipedia.org/wiki/MIT_License
[4]: http://nodejs.org/
[5]: http://yeoman.io/
[6]: http://bower.io/
[7]: http://gruntjs.com/
[8]: http://bourbon.io/
[9]: http://neat.bourbon.io/
[10]: https://github.com/csswizardry/inuit.css/
