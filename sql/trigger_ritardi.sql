-- bloccare inserimento prestito se lettore ha troppi ritardi
create function biblioteca.check_ritardi_lettore()
returns trigger
as
    $$
DECLARE
    num_ritardi INTEGER;
BEGIN
    SELECT ritardi INTO num_ritardi
    FROM biblioteca.lettore
    WHERE codice_fiscale = NEW.codice_fiscale;

    IF num_ritardi >= 5 THEN
        RAISE EXCEPTION 'Prestito negato: il lettore ha troppi ritardi ';
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- trigger in db
CREATE TRIGGER check_ritardi_lettore
BEFORE INSERT ON biblioteca.prestito
FOR EACH ROW
EXECUTE FUNCTION check_ritardi_lettore();
