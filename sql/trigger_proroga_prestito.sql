-- prorogare prestito libro
CREATE FUNCTION biblioteca.check_proroga_in_ritardo() RETURNS TRIGGER AS $$
BEGIN
-- blocca proroga se prestito in ritardo
    IF NEW.data_scadenza < CURRENT_DATE THEN
        RAISE EXCEPTION 'Non è possibile prorogare un prestito in ritardo.';
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- trigger per db
CREATE TRIGGER check_proroga_in_ritardo
BEFORE UPDATE ON biblioteca.prestito
FOR EACH ROW
EXECUTE FUNCTION check_proroga_in_ritardo();

