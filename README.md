# Volg onderstaande stappen voordat je met het project begint
Ik maak gebruik van verschillende open-source software om sneller en effici&euml;nter te werken. Om verder met het project te kunnen werken is het nodig dat je die software installeert. Ik leg niet in detail uit hoe je de verschillende software installeert, dat wordt op de verschillende sites duidelijker uitgelegd dan ik dat kan.

### Voordat je kunt beginnen moet je deze software installeren
**Stap 1**
Nodejs: http://nodejs.org/

**Stap 2**
Grunt: http://gruntjs.com/getting-started

**Stap 3**
Bower: http://bower.io/

**Stap 4**
SASS: http://sass-lang.com/install

**Stap 5**
Compass: http://compass-style.org/install/

### Je hebt nu alle benodigde software ge&iuml;nstalleerd. Nu moeten de dependencies nog worden ge&iuml;nstalleerd. Deze staan niet in git zodat de repo schoon blijft.
**Stap 6**
Ga in de terminal naar de projectdirectory

**Stap 7**
Installeer de grunt modules met:
```npm install``` of ```sudo npm install```
*De grunt modules staan straks in de map 'node_modules'*

**Stap 8**
Installeer de bower dependencies met:
```bower install```
*De bower dependencies staan straks in de map 'bower_components'*

**Stap 9**
Zet deze regels in je .gitignore, zodat de repo netjes blijft. Het is het handigst om dat globaal te doen:
```node_modules
bower_components
.sass-cache```

**All done!**
Als alles goed is gegaan heb je nu alle software en dependencies ge&iuml;nstalleerd.

### Zelf javascript en stylesheet aanpassen
Als je in je terminal naar de projectdirectory gaat en ```grunt``` uitvoert wordt de default Grunt taak uitgevoerd, in dit geval de watch taak. Deze taak zorgt ervoor dat de javascript en scss bestanden automatisch gecompileerd worden als je die wijzigt.

## De mappenstructuur
**Afbeeldingen**
De 'img-src' map is bedoelt voor photoshop of illustratorbestanden. De 'img' map is bedoelt voor afbeeldingen die in de site worden gebruikt. Van .svg bestanden wordt via Grunt automatisch een .png kopie gemaakt.

**Javascript**
De 'js-src' map is bedoelt voor de bestanden waar je in werkt. D.m.v. een Grunt taak worden deze bestanden samengevoegd en geminified en in de 'js' map geplaatst. De uglify taak in Gruntfile.js zorgt hiervoor. Hier geef je aan welke bestanden samengevoegd moeten worden.

**SASS**
In de 'sass' map staan alle .scss bestanden. Elk onderdeel heeft zijn eigen bestand, hierdoor is het gemakkelijker werken met deze bestanden. De structuur van deze bestanden is ge&iuml;nspireerd door https://smacss.com/

Voor vragen kun je contact met me opnemen: 06 - 4641 2770, of wout@woutmager.nl