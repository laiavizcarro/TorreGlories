# Torre Glories
*El projecte consisteix en una web de restauració on es poden consultar i filtrar els productes que hi ha a la carta, afegir-los a la cistella, modificar la cistella i executar la compra. A més, permet a l'usuari bàsic editar el seu perfil personal, inserir i visualitzar ressenyes de comandes realitzades propies o d'altres usuaris. L'usuari administrador a més, té permisos per poder administrar els productes i usuaris.*

## Autora ✒️
* Laia Vizcarro Viladiu

## Ressenyes
Per a la creació de ressenyes s'ha creat una API amb PHP que conté dues funcions:  
- `getReviews()` : Permet otenir les ressenyes, a més de filtrar-les i ordenar-les per puntuació. Quan les ressenyes es mostren per pantalla contenen el nom de l'usuari, la informació que hi ha afegit i la data de la comanda.  
- `addReview()` :  Permet a l'usuari inserir una ressenya nova de la comanda que seleccioni. Comprova si la comanda ja té una ressenya, de ser així, no podrà afegir-ne una altra. Cada comanda només pot tenir una ressenya. La ressenya que insereixi l'usuari conté el seu titol, text, puntuació i l'id de la comanda, aquesta ultima l'usuari no la pot visualitzar. 

Amb Javascript, utilitzant DOM es mostren amb la funció `showReviews()` les ressenyes a l'usuari, i segons el que seleccioni podrà visualitzar-les per ordre de puntuació o les podrà filtrar. Fent una petició fetch a la funció `getReviews()` de la API en PHP amb el mètode POST. Dins d'aquesta funció ho ha una altra funció `getStarsHtml`que permet mostrar les estrelles de la puntuació a cadascuna de les capses de les ressenyes. La funció `showReviews()` agafa el div de la vista i hi afegeix les classes i informació corresponent per a que es mostri la ressenya dins d'un requadre amb la seva informació corresponent. 

En quant a la vista, està feta principalment amb JS però té una base de html on hi ha a l'esquerra un filtre de puntuació, i un altre filtre per a poder ordenar de manera ascendent, descendent o per defecte les ressenyes. A la banda dreta es mostraran les ressenyes dins de les seves capses corresponents. 

Es fa referència al fitxer de javascript al final del fitxer de la vista, després del `<body>`.

## Programa de fidelitat
## QR
## Propines
## Filtre de productes
  
