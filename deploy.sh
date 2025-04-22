#!/bin/bash

# Percorso della directory del tuo progetto
SOURCE_DIR="$HOME/uni/basi/progetto/src"

# Percorso della directory del web server
TARGET_DIR="/srv/http/biblio/src/"

# Copia ricorsiva, sovrascrive i file esistenti
echo "Copia dei file da Progetto a Server..."
sudo cp -r "$SOURCE_DIR"/* "$TARGET_DIR"

echo "Deploy completato con successo!"

