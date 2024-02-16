# Torre Glories
*El projecte consisteix en una web de restauració on es poden consultar i filtrar els productes que hi ha a la carta, afegir-los a la cistella, modificar la cistella i executar la compra. A més, permet a l'usuari bàsic editar el seu perfil personal, inserir i visualitzar ressenyes de comandes realitzades propies o d'altres usuaris. L'usuari administrador a més, té permisos per poder administrar els productes i usuaris.*

## Autora ✒️
* Laia Vizcarro Viladiu

## General
Per a realitzar el projecte amb s'ha creat un fitxer nou anomenat api_index que fa d'index de les peticions que es fan amb javascript, aquest index, a diferència del que respon a totes les peticions ja creades amb PHP, no conté cap estructura de HTML, només controla si existeixen o no els controladors als que es vol accedir.

A cadascuna de les vistes HTML que requerixen JS està referenciat el fitxer JS al que ha d'accedir al final del `<body>` pel seu correcte funcionament. 

### Plesk
Per a desplegar el projecte al servidor s'ha accedit al panell de control del Plesk i s'han fet el següents passos:
1. Creació d'un usuari per la base de dades
2. Creació de la base de dades 
3. Importar els scripts a la base de dades
4. Pujar el codi font i adaptar els arxius de configuració per entorns


## Ressenyes
Per a la creació de ressenyes s'ha creat una API amb PHP que conté dues funcions:  
- `getReviews()` : Permet otenir les ressenyes, a més de filtrar-les i ordenar-les per puntuació. Quan les ressenyes es mostren per pantalla contenen el nom de l'usuari, la informació que hi ha afegit i la data de la comanda.  
- `addReview()` :  Permet a l'usuari inserir una ressenya nova de la comanda que seleccioni. Comprova si la comanda ja té una ressenya, de ser així, no podrà afegir-ne una altra. Cada comanda només pot tenir una ressenya. La ressenya que insereixi l'usuari conté el seu titol, text, puntuació i l'id de la comanda, aquesta ultima l'usuari no la pot visualitzar. Un cop la ressenya s'ha inserit, posant les dades al modal, es mostra un missatge de confirmació a l'usuari amb l'API Notie per a que sàpiga que la ressenya s'ha inserit correctament.

Amb Javascript, utilitzant DOM es mostren amb la funció `showReviews()` les ressenyes a l'usuari, i segons el que seleccioni podrà visualitzar-les per ordre de puntuació o les podrà filtrar. Fent una petició fetch a la funció `getReviews()` de la API en PHP amb el mètode POST. Dins d'aquesta funció ho ha una altra funció `getStarsHtml()`que permet mostrar les estrelles de la puntuació a cadascuna de les capses de les ressenyes. La funció `showReviews()` agafa el div de la vista i hi afegeix les classes i informació corresponent per a que es mostri la ressenya dins d'un requadre amb la seva informació corresponent. 

En quant a la vista, està feta principalment amb JS però té una base de html on hi ha a l'esquerra un filtre de puntuació, i un altre filtre per a poder ordenar de manera ascendent, descendent o per defecte les ressenyes. A la banda dreta es mostraran les ressenyes dins de les seves capses corresponents. 


## Programa de fidelitat
Per a realitzar el programa de fidelitat s'ha fet a través de JS, on 1 euro són 5 punts. Aplicant la funció `calculatePoints()` s'agafa el preu total de la comanda a través de l'input, que ve del càlcul fet amb PHP i s'aplica la formula per transformar els euros en punts. A la vista s'indica amb JS, a la part superior del pagament, els punts que es generaran a la comanda actual.

## QR
La creació del QR es realitza dins de la funció `checkoutPayment()` feta amb PHP, i una API de google. Primer es crea la url de la comanda amb la seva id, i aquesta url es concatena al final de https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=', on chs i cht són la mida de la base i altura que tindrà el QR. Guardem la imatge a la carpeta corresponent i redirigim a l'usuari a la vista de confirmació on aparexierà el codi QR que si s'escaneja el portarà a la vista del detall de la comanda. 

En aquest punt entra la funció `showQrCode`que permet mostrar el codi QR a través de l'identificador order_id, que serà el que mostri la informació de la comanda realitzada. I, seguidament, si l'usuari vol escanejar el codi per veure la informació de la comanda, s'executa la funcio `view()` que portarà a la vista `order-detail-view.php`.  

Aquesta vista mostra a l'usuari la informació de la comanda: la data, el preu total, si s'ha donat propina, l'import de la propina, i cadascun dels productes comprats, amb el nom, quantitat i preu. 

## Propines
Per a realitzar la funcionalitat de les propines a l'usuari se li mostra a la pantalla de pagament un selector on pot escollir si deixar o no propina, i per defecte hi ha escollida la propina del 3%. Al costat del percentatge de propina hi ha el valor en euros de la propina seleccionada. 

Per a realitzar el càlcul s'utilitza la funció de JS `calculateTip()` on s'agafa el preu total de la comanda, agafant l'input del preu total calculat amb PHP i se li aplica el percentatge escollit de propina. Un cop escollida la propina es suma al preu total de la comanda amb JS. 

## Filtre de productes
Per a realitzar el filtre de productes, primer s'ha modificat la vista ja que abans es mostraven totes els productes amb PHP i ara amb JS per a poder filtrar de manera correcta. Per a poder filtrar els productes s'han afegit quatre checkbox per a que l'usuari pugui filtrar per una o més categories. 

S'ha creat una API per poder gestionar les peticions de JS que obté tots els productes de la base de dades. A cadascun dels checkboxes que hi ha a la vista on es mostren els productes se li ha assignat un id, el mateix que hi ha a la base de dades per poder filtrar per categoria.

Per a poder filtrar amb JS s'ha creat la funció `filterProducts()`, que obté els productes de la o les categories seleccionades, neteja els anteriors i torna a mostrar els filtrats al DOM. Si no es cap selecciona categoria es mostren tots els productes.

