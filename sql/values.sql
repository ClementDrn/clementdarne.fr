-- Inserts values into the database tables.
-- Compatible with MariaDB

USE clementdarne_fr;

-- Projects
INSERT INTO Projects (visible, title, released, link, thumbnail, summary, start_year, end_year) VALUES
    (TRUE, 'Project1', TRUE, '#', '', 'Lorem ipsum **dolor sit** amet _consectur_', 2021, 2022),
    (TRUE, 'Project2', TRUE, '#', 'dummy-4x3.png', 'Dolor sit', 2022, 2023),
    (TRUE, 'Project3', FALSE, '', 'dummy-4x3.png', 'Amet consectetur', 2023, NULL),
    (FALSE, 'Project4', FALSE, '#', 'dummy-4x3.png', 'Adipiscing elit', 2024, 2025),
    (TRUE, 'Project5', TRUE, '#', '', 'Sed do', 2025, 2026),
    (TRUE, 'Project6', TRUE, '#', '', 'Eiusmod tempor', 2026, NULL),
    (TRUE, 'Project7', FALSE, '#', '', 'Incididunt ut', 2027, NULL),
    (TRUE, 'Project8', FALSE, '', 'dummy-4x3.png', 'Labore et', 2028, 2029),
    (FALSE, 'Project9', TRUE, '#', '', 'Dolore magna', 2029, 2030),
    (FALSE, 'Project10', TRUE, '#', 'dummy-4x3.png', 'Aliqua ut', 2030, 2031);
