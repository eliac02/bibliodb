-- bloccare inserimento prestito se limite massimo prestiti raggiunto
create or replace function biblioteca.check_prestiti_attivi()
returns trigger
as
    $$
DECLARE
    max_prestiti INTEGER;
    prestiti_attivi INTEGER;
    cat VARCHAR(10);
BEGIN
    -- ottieni categoria lettore
    SELECT categoria INTO cat
    FROM biblioteca.lettore
    WHERE codice_fiscale = NEW.codice_fiscale;

-- limite max prestiti
    IF cat = 'base' THEN
        max_prestiti := 3;
    ELSIF cat = 'premium' THEN
        max_prestiti := 5;
    ELSE
        RAISE EXCEPTION 'Categoria % non valida per il lettore %', cat, NEW.codice_fiscale;
    END IF;

-- prestiti attivi per lettore
    SELECT COUNT(*) INTO prestiti_attivi
    FROM biblioteca.prestito p
    WHERE p.codice_fiscale = NEW.codice_fiscale
      AND p.data_scadenza >= CURRENT_DATE;

    -- se limite superato blocca inserimento
    IF prestiti_attivi >= max_prestiti THEN
        RAISE EXCEPTION 'Prestiti attivi massimi raggiunti';
    END IF;

    RETURN NEW;
END;
$$
language plpgsql
;

-- trigger in db
CREATE TRIGGER check_prestiti_attivi
BEFORE INSERT ON biblioteca.prestito
FOR EACH ROW
EXECUTE FUNCTION biblioteca.check_prestiti_attivi();
