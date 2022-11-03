# triangle
PHP Project
Kreiran je novi projekt putem terminala
  → composer create-project symfony/skeleton Triangle
  
Za projekt je kreirana nova sqlite baza
  →php bin/console doctrine:database:create
  prethodno konfigurirana .env datoteka za kreiranje sqlite baze

U projektu je kreiran novi entity Triangle putem terminala
  →php bin/console make:entity
  entity sadržava 3 atributa sideA, sideB, sideC
 
Na temelju entity Triangle putem doctrine kreirana je sqlite baze
  →php bin/console doctrine:schema:update --force
  
U projektu je kreirana datoteka TriangleController
  →php bin/console make:controller TriangleController
  
U TriangleControlleru kreirana je funkcija koja putem rute /triangle/{a}/{b}/{c} sprema entity u bazu.
  setSideA($request->get('a'))
  setSideB($request->get('b'))
  setSideC($request->get('c'))
  
 U Triangle entity-u kreirane su dvije metode
  →getCircumferenceT
  →getAreaT
  navedene metode izračunavaju opseg i površinu na temelju spremljenih stranica trokuta
 
 Kreirani je novi servis GeometryCalculator → src/service
  Navedeni servis poziva se u TriangleController-u 
   →public function triangles() putem rute /triangles
 Servis izbacuje JSON prikaz sa podacima o:
  →Količina trokuta u bazi
  →Suma površina svih trokuta
  →Suma opsega svih trokuta
