CREATE TABLE IF NOT EXISTS currencies (
                                          id SERIAL PRIMARY KEY,
                                          symbol varchar(10) NOT NULL,
                                          currency varchar(3) NOT NULL
);

INSERT INTO currencies (id, symbol, currency) VALUES
(1, '$', 'USD')