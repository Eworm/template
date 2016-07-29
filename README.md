# Volg onderstaande stappen voordat je met het project begint
Ik maak gebruik van open-source software om sneller en effici&euml;nter te werken. Om verder met het project te kunnen werken is het nodig dat je die software installeert. Ik leg niet in detail uit hoe je de verschillende software installeert, dat wordt op de verschillende sites duidelijker uitgelegd dan ik dat kan.

### Voordat je kunt beginnen moet je deze software installeren
**1:**
Nodejs: http://nodejs.org/

**2:**
Gulp: ```npm install -g gulp```

**3:**
Bower: http://bower.io/

**4:**
SASS: http://sass-lang.com/install

### Je hebt nu alle benodigde software ge&iuml;nstalleerd. Nu moeten de dependencies nog worden ge&iuml;nstalleerd. Deze staan niet in git zodat de repo schoon blijft.
**5:**
Ga in de terminal naar de projectdirectory

**6:**
Installeer de gulp modules met:
```npm install``` of ```sudo npm install```

**7:**
Installeer de bower dependencies met:
```bower install```

**8:**
Zet deze regels in je .gitignore, zodat de repo netjes blijft. Het is het handigst om dat globaal te doen:
```node_modules
bower_components
.sass-cache
```

**All done!**
Als alles goed is gegaan heb je nu alle software en dependencies ge&iuml;nstalleerd.

### Javascript, stylesheet, en afbeeldingen aanpassen
Als je in je terminal naar de projectdirectory gaat en ```gulp``` uitvoert wordt de default Gulp taak uitgevoerd, in dit geval de watch taak. Deze taak zorgt ervoor dat de javascript, .scss bestanden en afbeeldingen automatisch gecompileerd worden als je die wijzigt.

## De mappenstructuur
**De _put_in_root map**
Hier staan de bestanden die je in de root van de site zet als-ie online gaat.

**Fonts**
Hier staan de niet-standaard fonts die gebruikt worden.

**Afbeeldingen**
De 'images-src' map is bedoelt voor originele bestanden. Een svg sprite wordt automatisch gegenereerd met svg's in de sprite map.

**Javascript**
De 'js-src' map is bedoelt voor de bestanden waar je in werkt. D.m.v. een Gulp taak worden deze bestanden samengevoegd en geminified en in de 'js' map geplaatst. De uglify taak in gulpfile.js zorgt hiervoor. Hier geef je aan welke bestanden samengevoegd moeten worden.

**SASS**
In de 'sass' map staan alle .scss bestanden. Elk onderdeel heeft zijn eigen bestand, hierdoor is het gemakkelijker werken met deze bestanden. De structuur van deze bestanden is ge&iuml;nspireerd door https://smacss.com/

## Let op!
* Classed en id's die nodig zijn voor javascript beginnen met js-. Deze classes en id's dus niet zomaar weghalen of aanpassen.
* Classnamen volgens BEM schrijven: http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/

Voor vragen kun je contact met me opnemen: 06 - 4641 2770, of wout@woutmager.nl
