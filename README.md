# WebServicesLibri

SVILUPPATORI: Leonardo Matteoni, Giacomo Ravaglia

LINGUAGGI: PHP, JSON, C#

COMPITI:
  - Leonardo Matteoni: client, interfaccia grafica e documentazione
  - Giacomo Ravaglia: server e database


COMPONENTI SOFTWARE: 
    Lato server:
        - index.php: file che distingue fra le varie query e manda in esecuzione quella corretta
        - function.php: file contenente l'elaborazione di tutte le query

    Database:
        - dbLibri.json: database dei libri
        - dbUses.json: database degli utenti
      
        Vantaggi nell'utilizzo di solo 2 file JSON: 
            - minore spazio occupato sul disco del computer
            - maggior velocità nell'accesso ai dati
            - maggior velocità di elaborazione dei dati
            - semplificazione della realizzazione delle query 
            - eliminazione di file poco utilizzati o del tutto inutilizzati

        Svantaggi nell'utilizzo di solo 2 file JSON:
            - gestione dei database leggermente più complessa
      
     Lato client:
        - ClientWebServices_Ravaglia-Matteoni: applicativo client


