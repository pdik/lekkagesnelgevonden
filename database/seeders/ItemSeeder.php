<?php

namespace Database\Seeders;

use App\Models\Items;
use App\Models\Types;
use Illuminate\Database\Seeder;
class ItemSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Types::create(
            ['name' => 'report', 'created_at' => now(), 'updated_at' => now()]
        );
         Types::create(
            ['name' => 'billable', 'created_at' => now(), 'updated_at' => now()]
        );


//        (6,'Endoscopie','Met de endoscoop (een dunnen slang met camera) krijgen we een beter beeld van lekkages op moeilijk bereikbare plaatsen. We bewegen de camera door de leiding heen en kunnen live meekijken. Barsten of andere openingen in de leiding komen duidelijk in beeld. Ook lekken in leidingen die weg zijn gewerkt kunnen zo gemakkelijk worden opgespoord.'),
//        7,'Kleurstofmethode','Door een kleurstof toe te voegen aan het leidingwater herkennen we aan de kleur waar het water weglekt. Deze methode kan ook worden gebruikt om gaten in isolatie aan te tonen. Voordeel van deze methode. is. dat het lek zichtbaar wordt zonder dat we breekwerk hoeven te verrichten.'),(8,'Uv-lamp/UV-luminaat','Uv-luminaat werkt op dezelfde manier als de kleurstofmethode. We lossen het UV-luminaat op in water en spoelen het door leidingen waarin een lek kan zitten. Uv-luminaat is kleurloos, maar zichtbaar onder UV-licht . Het voordeel van deze stof is dat het helder oplicht onder de UV-lamp en bruikbaar is in gevallen waar andere kleurstoffen niet genoeg contrast leveren.'),(9,'Leaktracking','Door een elektrisch veld te creeren kan worden gemeten waar het lek zicht bevindt; watergeleide immers goed. Lekt er ergens stroom weg, dan is dit een goede indicatie waar het lek zit. Dit kunnen. wij meten met onze apparatuur. Deze methode wordt vooral ingezet bij zwembaden. Leaktracking zorgt niet voor schade en kan grote oppervlakken controleren.'),(10,'Leiding lokalisator','Door een elektrisch veld te creÃ«ren kunnen we precies in kaart brengen waar de leidingen zich bevinden. Zit er een leiding in debuut van een lekkage dan is de kans groot dat er een lek in zit. Vervolgens kunnen we met. andere methoden de leiding controleren op lekken.'),(11,'Rioolcamera','Onze rioolcamera kan in leidingen worden gestoken om een beeld te maken van de binnenkant van leidingwerk. Dit werkt hetzelfde als endoscopie, alleen de rioolcamera beschikt over een langer snoer. De rioolcamera is hierdoor meer geschikt voor grotere lange leidingen. De sensor brengt de positie van de camera duidelijk in kaart.'),(12,'Rookproef','Onder druk wordt rook in een ruimte geblazen. De zal zal ontsnappen uit kieren en gaten waar water door kan lekken. Om dit proces te versnellen zorgen we voor voldoende druk op de rook. Dit is ook nuttig om na te gaan waar de isolatie van uw woning kan worden verbeterd'),(13,'Traceergas','We pompen een bepaald gas in de leiding. Plekken met een verhoogde concentratie van dit gas indiceren een lek. Deze concentraties meten we met onze apparatuur zodat het lek snel gevonden kan worden, zonder hak- of breekwerk. Deze methode kan zelfs de kleinste lekken opsporen.'),(14,'Warmtebeeldcamera','De warmtebeeldcamera geeft de temperatuur in een ruimte weer.\nHet thermogram toont vervolgens waar warmteverlies optreedt.\nDe warmtebeeldcamera zetten wij vooral in bij het analyseren van de isolatie van uw woning. Plekken met lage temperaturen zijn een indicatie voor warmteverlies, dit wordt duidelijk zichtbaar op de foto\'s'),(16,'Vochtmeting','Met deze methode meten het vocht gehalte in de wanden, vloer en de rest van uw woning.'),(17,'Drukmeting waterleiding ','Met deze drukmeting meten we het druk in uw waterleiding. Blijft de druk constant en loopt deze niet terug dan is er geen lekkage in de waterleiding. Blijft de druk niet constant, dan is er ergens een lekkage in de waterleiding. Verder onderzoek is dan noodzakelijk.'),(19,'Overige schade fotos','Extra bijgevoegde fotos'),(22,'Visuele inspectie badkamer ','De badkamer wordt geÃ¯nspecteerd op eventuele lekkages die ontstaan door middel van slechte voegen en kitnaden. Is er voldoende ventilatie aanwezig? Hoe oud is de badkamer en het leiding werk zelf. Eventuele constructie fouten en schade die ontstaan is door de lekkage zelf'),(23,'Leiding onderzoek','De leidingen controlleren'),(24,'Visuele inspectie dak.','Het dak wordt geÃ¯nspecteerd. We kijken naar type dak en ouderdom. Ook wordt er gekeken naar eventuele fouten die zijn aangebracht tijdens de werkzaamheden. '),(25,'Inspectie overig','Met deze inspectie hebben wij visueel in de woning gekeken zonder dat wij apparatuur hebben ingezet, dit kan komen doordat wij geen toegang tot de ruimte hebben kunnen krijgen of omdat de lekkage zonder apparatuur gevonden is. ');

         Items::create([
             'name'         => 'Thermografische infraroodcamera',
             'description'  => 'Met een speciale camera die gevoelig is voor infrarood licht meten we temperatuurverschillen in warmwaterleidingen waardoor het lek direct zichtbaar wordt. \r\nHet water wat uit de leiding lekt heeft een lagere temperatuur dan het water in de leiding. \r\nDit zorgt voor een duidelijk kleurverschil op de beelden van de thermografische infraroodcamera,\r\nwaardoor het lek gelokaliseerd kan worden.',
             'type_id'      =>  1,
             'created_at'   =>  now(),
             'updated_at'   =>  now()
         ]);
           Items::create([
             'name'         => 'Ultrasoon detectie',
             'description'  => 'Lekkages opsporen door middel van ultrasone geluidsgolven.\r\nHet lek produceert geluid van een andere frequentie dan het water wat door de leiding stroomt. \r\nDoor dit afwijkende geluid op te sporen bepalen we waar het lek zit. \r\nDeze methode wordt vooral ingezet bij koudwater leidingen, hierbij kan immers geen thermografie worden ingezet',
             'type_id'      =>  1,
             'created_at'   =>  now(),
             'updated_at'   =>  now()
         ]);

      //  (4,'Thermografische camera','Met de thermografische camera meten we temperatuurverschillen voor het traceren van warmte- en waterlekken. Water wat uit de leidingen lekt heeft een lagere temperatuur dan het water in de leidingen. het lek kan met de warmtebeelden in beeld worden gebracht. Ook kunnen we gebreken in de isolatie van uw woning, zogenaamde warmtelekken, in beeld brengen.
             Items::create([
             'name'         => 'Akoestisch onderzoek',
             'description'  => 'Een lek produceert vaak een bepaald geluid.\nDit geluid kan worden versterkt zodat we het lek kunnen lokaliseren. Door in de buurt van de lekkage het geluid te meten bepalen we waar het lek zit.\nHet voordeel hiervan is dat het geluid meetbaar is door muren, plafonds of vloeren heen. hak - en breekwerk is dus niet nodig om het lek te vinden.',
             'type_id'      =>  1,
             'created_at'   =>  now(),
             'updated_at'   =>  now()
         ]);
               Items::create([
             'name'         => 'Drukproef',
             'description'  => 'We verhogen de luchtdruk in een afgesloten (gedeelte van een) leiding met onze drukpomp. Daalt de luchtdruk? Dan is er een lek in de leiding. Blijft de luchtdruk constant dan zit het lek elders, en zullen we de andere leidingen controleren. Ook lastig bereikbare leidingen kunnen zo worden gecontroleerd.',
             'type_id'      =>  1,
             'created_at'   =>  now(),
             'updated_at'   =>  now()
         ]);
//        Items::create([
//             'name'         => '',
//             'description'  => '',
//             'type_id'      =>  1,
//             'created_at'   =>  now(),
//             'updated_at'   =>  now()
//         ]);

    }
}
