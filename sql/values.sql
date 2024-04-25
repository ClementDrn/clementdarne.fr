-- Inserts values into the database tables.
-- Compatible with MariaDB

USE clementdarne_fr;

-- Projects
INSERT INTO Projects (title, directory, visible, released, github_path, summary, start_year, end_year) VALUES
    ('Project1', 'project1', TRUE, TRUE, '#', 'Lorem ipsum', 2021, 2022),
    ('Project2', 'project2', TRUE, TRUE, '#', 'Dolor sit', 2022, 2023),
    ('Project3', 'project3', TRUE, FALSE, '#', 'Amet consectetur', 2023, NULL),
    ('Project4', 'project4', FALSE, FALSE, '#', 'Adipiscing elit', 2024, 2025),
    ('Project5', 'project5', TRUE, TRUE, '#', 'Sed do', 2025, 2026),
    ('Project6', 'project6', TRUE, TRUE, '#', 'Eiusmod tempor', 2026, NULL),
    ('Project7', 'project7', TRUE, FALSE, '#', 'Incididunt ut', 2027, NULL),
    ('Project8', 'project8', TRUE, FALSE, '#', 'Labore et', 2028, 2029),
    ('Project9', 'project9', FALSE, TRUE, '#', 'Dolore magna', 2029, 2030),
    ('Project10', 'project10', FALSE, TRUE, '#', 'Aliqua ut', 2030, 2031);
