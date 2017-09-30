Skrupel-Erweiterung Cronjob
===========================

Autoren: Jonu + Till Affeldt (@taffeldt) alias PseudoPsycho

Forum: http://board.skrupel.de/viewtopic.php?p=28607#p28607


Installation
------------

Zur Installation die Datei `cronjob.php` im Verzeichnis `inhalt/` platzieren und als Cronjob ausführen lassen.
Falls Ihr Server dies nicht unterstützt, so wird empfehlen einen Dienst wie https://www.cronjob.de zu nutzen.

**WARNUNG:** Sollte es passieren, dass aufgrund der PHP-Laufzeit-Begrenzung das Script unterbrochen wird,
kann dies schwerwiegende Konsequenzen haben. Platzieren Sie deshalb die beigelegte `.htaccess` ebenfalls
im `inhalt/`-Ordner, um die maximale Laufzeit zu erhöhen und solchen Problemen vorzubeugen.
