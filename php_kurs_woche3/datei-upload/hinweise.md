# Direktiven für Datei-Uploads

## Allgemeine Direktiven zu POST-Anfragen

### enable_post_data_reading

Dieser Schalter ist eine Grundsatz-Einstellung. Er steht standardmäßig auf 1, und muss diesen Wert haben, damit PHP die $_POST und $_FILES Arrays überhaupt bestückt.

### post_max_size

Legt fest, wie groß eine POST-Anfrage sein darf und muss für Datei-Uploads so eingestellt werden, dass die erwarteten Dateigrößen hochgeladen werden können. Der Standardwert ist 8M (also 8MiB). Ist eine POST-Anfrage zu groß, bricht PHP die Verarbeitung ab und man erhält weder in $_POST noch in $_FILES irgendwelche Daten.

Beachten Sie bitte auch, dass Ihr Webserver ebenfalls ein Limit für die Größe von POST-Anfragen festlegt. Wenn eine POST-Anfrage mit dem HTTP Statuscode 413 Payload too large beantwortet wird, sollten Sie zuerst die Einstellungen des Webservers überprüfen. Beim Apache ist das die LimitRequestBody-Direktive, beim IIS die Featureeinstellungen der Anforderungsfilterung.

## Direktiven speziell für Uploads

### file_uploads

Diese Direktive muss auf 1 stehen, damit das Hochladen von Dateien grundsätzlich freigeschaltet ist. Ihr Standardwert ist bereits 1.

### upload_max_filesize

Mit dieser Direktive legen Sie serverseitig fest, wie groß eine einzelne hochgeladene Datei höchstens sein darf. Überschreitet eine Datei diese Größe, finden Sie im $_FILES-Array für diesen Upload den error-Wert UPLOAD_ERR_INI_SIZE. Der Standardwert für diese Direktive ist 2M (2MiB).

### upload_tmp_dir

Hiermit legen Sie das Verzeichnis fest, in dem PHP die hochgeladenen Dateien ablegt, während es die POST-Anfrage entgegennimmt. Es ist eine temporäre Ablage, Sie müssen die Dateien aktiv von hier abholen, sonst löscht PHP sie wieder. PHP überträgt zunächst sämtliche Upload-Dateien in diesen Ordner, bevor es Ihr Script startet.

Standardmäßig ist diese Direktive leer, und PHP verwendet dann den Temp-Ordner des Systems. Auf unixoiden Systemen ist das /tmp, unter Windows kann es C:\Windows\Temp sein oder auch ein Ordner im Benutzerprofil des Prozesses, in dem der Webserver läuft. Der Pfad ist Teil des ['name']-Eintrags zur Datei.

Bei Shared-Webhosting kann es vorkommen, dass sich alle Nutzer eine Instanz des PHP-Interpreters teilen und daher jeder Nutzer die hochgeladenen Dateien anderer Nutzer aus dem /tmp-Verzeichnis lesen und manipulieren kann. Gute Webhoster spendieren jedem Nutzer einen eigenen Unix-Nutzeraccount und einen eigenen PHP-Interpreter, der mit dessen Rechten läuft, sodass für die im /tmp-Verzeichnis abgelegten Dateien die Dateirechte passend gesetzt sind (Zugriff nur durch den Eigentümer) und das für das /tmp-Verzeichnis gesetzte Sticky-Bit dafür sorgt, dass nur der Ersteller der Datei diese löschen und verschieben darf. Betreiben Sie hingegen ihren eigenen Webserver, haben Sie volle Kontrolle über die passende Rechtevergabe.

Das PHP Handbuch enthält ebenfalls eine [Übersicht zu diesen Direktiven(https://www.php.net/manual/en/ini.core.php#ini.sect.file-uploads)].

Sie haben gesehen, dass es vier Stellen gibt, die die Größe eines Uploads limitieren. Jedes einzelne Limit muss eingehalten werden, damit der Upload gelingt. Werden das Webserver-Limit oder post_max_size überschritten, wird entweder Ihr Script gar nicht erst gestartet, oder Sie erhalten zumindest keinerlei Daten. Eine Verletzung von upload_max_filesize oder MAX_FILE_SIZE verhindert nur, dass Sie die betroffene Datei erhalten.