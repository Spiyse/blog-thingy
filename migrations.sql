CREATE TABLE posts(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content VARCHAR(5200) NOT NULL,
	category_id INT,
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO posts
(content,category_id)
VALUES
("Lieldienas nāk",1),
("Otrais bloga ieraksts",2);

CREATE TABLE categories(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	category_name VARCHAR(25) NOT NULL
);
INSERT INTO categories
(category_name)
VALUES 
("Svētki"),
("Mūzika"),
("Sports");

SELECT posts.*,categories.category_name FROM posts
LEFT JOIN categories
ON posts.category_id = categories.id
WHERE posts.id = 1;