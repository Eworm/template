This project uses open-source software to work more efficient. You'll need to install some software to start working with this project. I won't go into all details about how to use this software. This readme should be efficient to get going.

# Necessary global software

**1:** Nodejs: <http://nodejs.org/>

**2:** Gulp: <http://gulpjs.com/>

**3:** Yarn: <https://yarnpkg.com/lang/en/>

**4:** SASS: <http://sass-lang.com/install>

# After installing the above software you need to install some dependencies. These files aren't in the repo to keep it clean. These dependencies are installed in the project directory

**5:** Add dependencies: `yarn install`. This command adds a node_modules directory which you _really_ should gitignore.

**6:** Add these lines to your global gitignore:

```
node_modules
.sass-cache
```

**All done!**

# Editing javascript, stylesheet, and images

The easiest way to start is to navigate to the project dir and run `gulp` in a terminal window. This executes the standard gulp watch task. This task keeps an eye on the javascript and sass files and compiles svg sprite files. You should read the gulpfile to see what other tasks there are.

## The directories

**The _root dir** This is a placeholder dir for files you should put in the wordpress root.

**Fonts** Use this dir for webfonts.

**Images** The images-src dir is used for original files. `gulp sprite` generates an svg symbol sprite from svg's located in the sprite dir.

**Javascript** The js-src dir is used for your own javascript files. `gulp javascript` combines & minifies these files (and optional npm files) and puts the resulting file in the js dir.

**SASS** All sass files are conveniently located in the sass dir. Use `gulp css` to combine them. The structure of the subdirs is based on <https://smacss.com/>. There's a gulp task `gulp lint` which you can use to check your scss against the hidden yml file.

## Timber

Timber (<https://www.upstatement.com/timber/>) is an awesome way of making your html cleaner and easier to read. It uses the Twig template engine to write html seperate from the php files. Timber is included in the required plugins list, so you'll see a message asking you to install it.

## Final words

- Classes and id's necessary for javascript should start with js-. Don't remove or edit them in this html.
- Please use BEM for classnames: <http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/>

# The php side of things

All php functions are split in seperate files (with handy filenames) and are included in /includes.
