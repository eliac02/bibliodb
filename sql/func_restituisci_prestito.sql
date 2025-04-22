-- aggiornare counter prestiti per lettore quando restituisce prestito
create function bibliteca.restituisci_prestito(p_id_prestito integer)
returns void
as $$
DECLARE
    v_data_scadenza DATE;
    v_codice_fiscale VARCHAR(16);
    v_id_copia INTEGER;
BEGIN
-- ottieni dati prestito
    SELECT data_scadenza, codice_fiscale, id_copia
    INTO v_data_scadenza, v_codice_fiscale, v_id_copia
    FROM biblioteca.prestito
    WHERE id_prestito = p_id_prestito;

-- se ritardo
    IF v_data_scadenza < CURRENT_DATE THEN
        UPDATE biblioteca.lettore
        SET ritardi = ritardi + 1
        WHERE codice_fiscale = v_codice_fiscale;
    END IF;

-- disponibile copia
    UPDATE biblioteca.copia
    SET disponibile = TRUE
    WHERE id_copia = v_id_copia;

-- elimina prestito
    DELETE FROM biblioteca.prestito
    WHERE id_prestito = p_id_prestito;
END;
$$
language plpgsql
;

-- in pagina web usare questo: SELECT restituisci_prestito(<id_prestito>);
