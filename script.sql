DROP TABLE IF EXISTS articles;

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO articles (title, description)
VALUES 
    ('First Article', 'This is the description for the first article.'),
    ('Second Article', 'This is the description for the second article.'),
    ('Third Article', 'This is the description for the third article.');
