This project uses open-source software to work more efficient. You'll need to install some software to start working with this project. I won't go into all details about how to use this software. This readme should be efficient to get going.

# Necessary global software

**1:** Nodejs: <https://nodejs.org/en/>

**2:** NPM: <https://www.npmjs.com/>

**3:** SASS: <https://sass-lang.com/>

# After installing the above software you need to install some dependencies. These files aren't in the repo to keep it clean. These dependencies are installed in the project directory

**4:** Add dependencies: `npm install`. This command adds a node_modules directory which you _really_ should gitignore.

**5:** Add these lines to your global gitignore:

```
node_modules
```

**All done!**

# Editing javascript, stylesheet, and images

The easiest way to start is to navigate to the project dir and run `npm run watch:all` in a terminal window. This executes the standard npm watch task. This task keeps an eye on the javascript and sass files and compiles svg sprite files. Please check the package.json file to see what other tasks there are.

## The directories

**The _root dir** This is a placeholder dir for files you should put in the wordpress root.

**Fonts** Use this dir for webfonts.

**Images** The images-src dir is used for original files. `npm run build:sprite` generates an svg symbol sprite from svg's located in the sprite dir.

**Javascript** The js-src dir is used for your own javascript files. `npm run build:js` combines & minifies these files (and optional npm files) and puts the resulting file in the js dir.

**SASS** All sass files are located in the sass dir. Use `npm run build:css` to combine them. The structure of the subdirs is based on <https://smacss.com/>.

## Timber

Timber (<https://www.upstatement.com/timber/>) is an awesome way of making your html cleaner and easier to read. It uses the Twig template engine to write html seperate from the php files. Timber is included in the required plugins list, so you'll see a message asking you to install it.

## Final words

- Classes and id's necessary for javascript should start with js-. Don't remove or edit them in this html.
- Please use BEM for classnames: <http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/>

# The php side of things

All php functions are split in seperate files (with handy filenames) and are included in /functions.
