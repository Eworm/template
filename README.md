This project uses open-source software to work more efficient. You need to install some software to start working with this project. I won't go into all details about how to use this software, other sites are better at this than I am.

### Necessary global software
**1:**
Nodejs: http://nodejs.org/

**2:**
Gulp: ```npm install -g gulp```

**3:**
Bower: http://bower.io/

**4:**
SASS: http://sass-lang.com/install

### After installing the above software you need to install some dependencies. These files aren't in the repo to keep it clean. These dependencies are installed in the project directory

**5:**
Gulp modules
```npm install``` or ```sudo npm install```

**6:**
Bower dependencies:
```bower install```

**7:**
Add these lines to your global gitignore:
```
node_modules
bower_components
.sass-cache
```

**All done!**

### Editing javascript, stylesheet, and images
The easiest way to start is to navigate to the project dir and run ```gulp``` in a terminal window. This executes the standard gulp watch task. This task keeps an eye on the javascript and sass files and compiles svg sprite files. You should read the gulpfile to see what other tasks there are.

## The directories
**The _root dir**
This is a placeholder dir for files you should put in the wordpress root.

**Fonts**
Use this dir for webfonts.

**Images**
The images-src dir is used for original files. Gulp automatically generates an svg symbol sprite from svg's locates in the sprite dir.

**Javascript**
The js-src dir is used for your own javascript files. The javascript Gulp task combines & minifies these files (and optional bower files) and puts the resulting file in the js dir.

**SASS**
All sass files are conveniently located in the sass dir. The structure of the subdirs is based on https://smacss.com/

## Timber
Timber (https://www.upstatement.com/timber/) is an awesome way of making your html cleaner and easier to read. It uses the Twig template engine to write html seperate from the html files.


## Final words
* Classes and id's necessary for javascript should start with js-. So don't remove or edit them in this html.
* Please use BEM for classnames: http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/
