
CREATE TABLE Colors (
    Color  VARCHAR(255)  PRIMARY KEY
);

CREATE TABLE Votes (
    City   VARCHAR(255),
    Color  VARCHAR(255)  REFERENCES Colors(Color) ON DELETE CASCADE,
    Votes  INTEGER,

    PRIMARY KEY (City, Color)
);