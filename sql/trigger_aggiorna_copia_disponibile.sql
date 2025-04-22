-- aggiorna copia disponibile prima/dopo prestito
CREATE FUNCTION biblioteca.aggiorna_disponibilita_copia() RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        UPDATE biblioteca.copia
        SET disponibile = FALSE
        WHERE id_copia = NEW.id_copia;
    ELSIF TG_OP = 'DELETE' THEN
        UPDATE biblioteca.copia
        SET disponibile = TRUE
        WHERE id_copia = OLD.id_copia;
    END IF;
    RETURN NULL; -- AFTER trigger, non ha bisogno di restituire una riga
END;
$$ LANGUAGE plpgsql;

-- trigger per db
CREATE TRIGGER copia_non_disponibile
AFTER INSERT ON prestito
FOR EACH ROW
EXECUTE FUNCTION aggiorna_disponibilita_copia();

CREATE TRIGGER copia_disponibile
AFTER DELETE ON biblioteca.prestito
FOR EACH ROW
EXECUTE FUNCTION aggiorna_disponibilita_copia();

