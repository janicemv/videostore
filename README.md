# Extra opdracht PHP MVC – De videotheek 

### Notities

_Ik heb deze oefening gemaakt zoals ik het systeem zou willen gebruiken. Dus zijn er minder keuzelijsts en meer links om de informatie gemakkelijker te krijgen en veranderen._


### Taken

Een videotheek beschikt over een aanzienlijke hoeveelheid DVD’s. Op elke DVD staat één film. Elke afzonderlijke DVD werd van een uniek nummer voorzien. Het spreekt vanzelf dat er verschillende exemplaren van een film kunnen zijn. 

Als webontwikkelaar wordt jou gevraagd een webapplicatie te schrijven die de medewerkers in staat stelt deze filmcollectie te beheren. De applicatie voorziet in de volgende mogelijkheden: 

**[X] Een overzicht van alle films weergeven, alfabetisch gerangschikt per titel**

[X] titel
[X] nummers van DVDs (ids)
[X] hoeveel in de videotheek

De eerste kolom bevat de titel van de film. 
De tweede kolom bevat de nummers van alle DVD’s die deze titel dragen. 
De derde kolom toont aan hoeveel exemplaren van deze titel er op het moment aanwezig zijn in de videotheek. 
De nummers die aanwezig zijn worden in het vet getoond in de tweede kolom.

**[X] Zoeken op nummer**

Resultaat: Titel | Nummer(s) | Exemplaren aanwezig

**[X] Invoeren van een nieuwe titel.**

Er wordt gevraagd naar een titel. 
Zorg voor een foutmelding als de titel reeds bestaat. 
Er zijn na aanmaak nog geen exemplaren beschikbaar van deze titel. 

**[X] Invoeren van een nieuw exemplaar van een titel.**

_Er wordt een keuzelijst getoond van alle titels, en er dient een exemplaarnummer ingegeven te worden. 
Zorg voor een foutmelding als het exemplaarnummer reeds bestaat. 
Er moet zowel een titel uit de lijst geselecteerd als een nummer ingegeven worden. 
Een nieuw exemplaar is in eerste instantie aanwezig in de videotheek._

Ik heb een optie in de filmlijst gezet want de DVDnummer is automatisch regenereerd in de DB.

**[X] Verwijderen van een titel.**

Er moet een titel gekozen worden uit een keuzelijst. 
Alle exemplaren van deze titel worden tegelijk mee verwijderd. 

**[X] Verwijderen van een exemplaar.**

Er moet een nummer gekozen worden uit een keuzelijst van de nummers van alle exemplaren. 

**[X] Een film huren.**

Het nummer van het exemplaar wordt ingegeven, waarna dit exemplaar niet meer aanwezig is in de videotheek. 

**[X] Een film terugbrengen.**

Het nummer van het teruggebrachte exemplaar wordt ingegeven, waarna het opnieuw aanwezig is in de videotheek. 
 
[X] Al deze mogelijkheden moeten kunnen gekozen worden uit een hoofdmenu, dat wordt getoond op het moment dat de applicatie opgeroepen wordt.
 
**Uitbreiding**

[X] Zorg ervoor dat in de databank een lijst van gebruikers en hun wachtwoorden wordt bijgehouden. 

[X] Breid de applicatie uit zodat, vooraleer het hoofdmenu verschijnt en er een taak kan uitgevoerd worden, de bediende zich moet aanmelden met zijn persoonlijke gebruikersnaam en wachtwoord. 