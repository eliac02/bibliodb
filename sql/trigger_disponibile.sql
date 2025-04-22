-- aggiornare disponibilita' copia dopo prestito
create function biblioteca.check_copia_disponibile()
returns trigger
as $$
DECLARE
    disponibile BOOLEAN;
BEGIN
    SELECT disponibile INTO disponibile
    FROM biblioteca.copia
    WHERE id_copia = NEW.id_copia;

    IF NOT disponibile THEN
        RAISE EXCEPTION 'Prestito negato: la copia richiesta non è disponibile.';
    END IF;

    RETURN NEW;
END;
$$
language plpgsql
;

-- trigger per db
CREATE TRIGGER check_copia_disponibile
BEFORE INSERT ON biblioteca.prestito
FOR EACH ROW
EXECUTE FUNCTION check_copia_disponibile();
